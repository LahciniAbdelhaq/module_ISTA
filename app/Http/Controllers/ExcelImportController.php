<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupProfesseurModule;
use App\Models\Module;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ExcelImportController extends Controller
{
     


    public function importModule(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('excel_file');

        // Load the Excel file
        $spreadsheet = IOFactory::load($file);

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest column and row numbers
        $highestRow = $worksheet->getHighestDataRow(); // e.g., 10

        // Iterate through rows and columns to read data
        $data = [];


        // Iterate through rows and columns to read data
        $uniqueCodeModules = [];

    // Iterate through rows and columns to read data
    for ($row = 2; $row <= $highestRow; $row++) {
        $code_module = $worksheet->getCell('Q' . $row)->getValue();
        
        // Check if the code_module is already encountered
        if (!in_array($code_module, $uniqueCodeModules)) {
            // If not encountered, add it to the temporary array and process the row
            $uniqueCodeModules[] = $code_module;

            $mh_presentiel = $worksheet->getCell('X' . $row)->getValue() + $worksheet->getCell('Y' . $row)->getValue();
            $mh_distance = $worksheet->getCell('AB' . $row)->getValue() + $worksheet->getCell('AC' . $row)->getValue();
            
            // Calculate nombre_total as the sum of mh_presentiel and mh_distance
            $nombre_total = intval($mh_presentiel + $mh_distance);

            $rowData = [
                'code_module' => $code_module,
                'nom_module' => $worksheet->getCell('B' . $row)->getValue(),
                'regionale' => $worksheet->getCell('S' . $row)->getValue(),
                'mh_presentiel' => $mh_presentiel,
                'mh_distance' => $mh_distance,
                'nombre_total' => $nombre_total,
            ];

            // Add row data to the array
            $data[] = $rowData;
        }
    }
         // Insert or update the data into the database
    foreach ($data as $row) {
        Module::updateOrCreate(
            ['code_module' => $row['code_module']], // Unique identifier
            $row // Data to insert or update
        );
    }

        // Optionally, you can return the data or process it further
        return to_route('modules.index');
    }

    public function importProf(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('excel_file');

        // Load the Excel file
        $spreadsheet = IOFactory::load($file);

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest column and row numbers
        $highestRow = $worksheet->getHighestDataRow(); // e.g., 10

        // Iterate through rows and columns to read data
        $data = [];


        // Iterate through rows and columns to read data
        $uniqueCode_Prof = [];

    // Iterate through rows and columns to read data
    for ($row = 2; $row <= $highestRow; $row++) {
        $code_Prof = $worksheet->getCell('T' . $row)->getValue();
        
        // Check if the code_module is already encountered
        if (!in_array($code_Prof, $uniqueCode_Prof) && $code_Prof !== null && $code_Prof !== '') {
            // If not encountered, add it to the temporary array and process the row
            $uniqueCodeModules[] = $code_Prof;  

            $rowData = [
                'code_professeur' => $code_Prof,
                'nom_prenom' => $worksheet->getCell('U' . $row)->getValue(), 
            ];

            // Add row data to the array
            $data[] = $rowData;
        } 
    }
         // Insert or update the data into the database
    foreach ($data as $row) {
        Professeur::updateOrCreate(
            ['code_professeur' => $row['code_professeur']], // Unique identifier
            $row // Data to insert or update
        );
    }

        // Optionally, you can return the data or process it further
        return to_route('professeurs.index');
    }



    public function avancement(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls',
    ]);

    // Get the uploaded file
    $file = $request->file('excel_file');

    // Load the Excel file
    $spreadsheet = IOFactory::load($file);

    // Get the first worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Get the highest row number
    $highestRow = $worksheet->getHighestDataRow();

    // Initialize data array
    $data = [];

    // Iterate through rows and columns to read data
    for ($row = 2; $row <= $highestRow; $row++) {
        // Get the value of 'professeur_code'
        $professeurCode = $worksheet->getCell('T' . $row)->getValue();

        // Check if 'professeur_code' is null or an empty string
        if ($professeurCode !== null && $professeurCode !== '') {
            // Add row data to the array
            $data[] = [
                'group_code' => $worksheet->getCell('I' . $row)->getValue(),
                'professeur_code' => $professeurCode,
                'module_code' => $worksheet->getCell('Q' . $row)->getValue(),
                'nbr_pre_s_1' => $worksheet->getCell('X' . $row)->getValue(),
                'nbr_pre_s_2' => $worksheet->getCell('Y' . $row)->getValue(),
                'nbr_dis_s_1' => $worksheet->getCell('AB' . $row)->getValue(),
                'nbr_dis_s_2' => $worksheet->getCell('AC' . $row)->getValue(),
            ];
        }
    }

    // Perform database operations within a transaction
    DB::beginTransaction();

    try {
        foreach ($data as $row) {
            // Check if the referenced data exists in the respective tables
            $groupExists = Group::where('code_group', $row['group_code'])->exists();
            $professeurExists = Professeur::where('code_professeur', $row['professeur_code'])->exists();
            $moduleExists = Module::where('code_module', $row['module_code'])->exists();

            if ($groupExists && $professeurExists && $moduleExists) {
                // Insert or update the data into the database
                GroupProfesseurModule::updateOrCreate(
                    ['group_code' => $row['group_code'], 'professeur_code' => $row['professeur_code'], 'module_code' => $row['module_code']],
                    ['nbr_pre_s_1' => $row['nbr_pre_s_1'], 'nbr_pre_s_2' => $row['nbr_pre_s_2'], 'nbr_dis_s_1' => $row['nbr_dis_s_1'], 'nbr_dis_s_2' => $row['nbr_dis_s_2']]
                );
            } else {
                dump($moduleExists);
                dump($professeurExists);
                dump($groupExists,$row['group_code']);
            }
        }

        // Commit the transaction if everything succeeds
        DB::commit();
    } catch (\Exception $e) {
        // Rollback the transaction if an error occurs
        DB::rollBack();
        // Handle the exception (e.g., log the error message)
        dd($e->getMessage());
    }

    // Optionally, you can return the data or process it further
    return response()->json($data);
}
}
