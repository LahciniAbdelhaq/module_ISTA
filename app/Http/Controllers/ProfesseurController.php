<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupProfesseurModule;
use App\Models\Professeur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $professeurs = Professeur::all();
        $notCompletedOnTime = $this->Alert();
        return view('prof.list_prof' , compact('professeurs','notCompletedOnTime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notCompletedOnTime = $this->Alert();
        return view('prof.ajoute_prof',compact('notCompletedOnTime'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'code_professeur' => 'required|unique:professeurs,code_professeur,code_professeur,code_professeur',
            'nom_prenom' => 'required',
        ]);

        Professeur::create($formFields);
        $notCompletedOnTime = $this->Alert();
        return redirect()->route('professeurs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Professeur $professeur )
    {
        $groupProfesseurModules = GroupProfesseurModule::all();
        $notCompletedOnTime = $this->Alert();
        return view('module.avencemen' , compact('groupProfesseurModules','notCompletedOnTime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function willCompleteOnTime($startDate, $endDate, $weeklyStudyHours, $totalHoursRequired, $hoursRealised)
    {
        // Convert start and end dates to Carbon instances
        if (empty($startDate) || empty($endDate) || $startDate === "" || $endDate === "") {
            return false;
        }
        $startDateObj = Carbon::createFromFormat('d/m/Y', $startDate);
        $endDateObj = Carbon::createFromFormat('d/m/Y', $endDate);
    
        // Calculate the total number of days between start and end dates
        $totalDays = $startDateObj->diffInDays($endDateObj, false);
    
        // Calculate total remaining hours required to complete the program
        $totalRemainingHours = $totalHoursRequired - $hoursRealised;
    
        // Calculate the total number of weeks required based on the weekly study hours
        $totalWeeksRequired = ceil($totalRemainingHours / $weeklyStudyHours);
    
        // Calculate the total number of days required
        $totalDaysRequired = $totalWeeksRequired * 7;
        $willCompleteOnTime = $totalDays >= $totalDaysRequired;
    
        // Determine if the program will be completed on time 
         
        return !$willCompleteOnTime; 
        
    }

    public function Alert (){
        $GroupProfesseurModules = GroupProfesseurModule::with('group', 'professeur', 'module')
        ->whereHas('module', function ($query) {
            $query->where('regionale', 'O');
        }) 
        ->get();
        $notCompletedOnTime = [];
          // Iterate through each module
    foreach ($GroupProfesseurModules as $GroupProfesseurModule) {
        // Calculate if the module will be completed on time
        $hours_realised=$GroupProfesseurModule->nbr_pre_s_1 + $GroupProfesseurModule->nbr_pre_s_2 +$GroupProfesseurModule->nbr_dis_s_1 +$GroupProfesseurModule->nbr_dis_s_2;
        $completedOnTime = $this->willCompleteOnTime(
            $GroupProfesseurModule->date_debut,
            $GroupProfesseurModule->date_Efm,
            $GroupProfesseurModule->nbr_h_semaine,
            $GroupProfesseurModule->module->nombre_total,
            $hours_realised
        );

        // If not completed on time, add it to the list
        if ($completedOnTime) {
            $notCompletedOnTime[] = $GroupProfesseurModule;
        }
    }
       return $notCompletedOnTime;
    }
}
