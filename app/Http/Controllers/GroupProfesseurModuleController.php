<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupProfesseurModule;
use App\Models\Module;
use App\Models\Professeur;
use Illuminate\Http\Request;

class GroupProfesseurModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
        $professeurs = Professeur::all();
        $groups = Group::all();

        return view('module.ajoute_avancemant', compact('modules', 'professeurs', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_code' => 'required|exists:groups,code_group',
            'professeur_code' => 'required|exists:professeurs,code_professeur',
            'module_code' => 'required|exists:modules,code_module',
            'nbr_h_semaine' => 'nullable|integer',
            'nbr_pre_s_1' => 'nullable|integer',
            'nbr_pre_s_2' => 'nullable|integer',
            'nbr_dis_s_1' => 'nullable|integer',
            'nbr_dis_s_2' => 'nullable|integer',
        ]);

        // Create a new instance of GroupProfesseurModule with validated data
        $groupProfesseurModule = new GroupProfesseurModule();
        $groupProfesseurModule->group_code = $validatedData['group_code'];
        $groupProfesseurModule->professeur_code = $validatedData['professeur_code'];
        $groupProfesseurModule->module_code = $validatedData['module_code'];

        // Check if 'nbr_h_semaine' is provided and assign it to the model
        if (isset($validatedData['nbr_h_semaine'])) {
            $groupProfesseurModule->nbr_h_semaine = $validatedData['nbr_h_semaine'];
        }

        if (isset($validatedData['nbr_pre_s_1'])) {
            $groupProfesseurModule->nbr_pre_s_1 = $validatedData['nbr_pre_s_1'];
        }

        if (isset($validatedData['nbr_pre_s_2'])) {
            $groupProfesseurModule->nbr_pre_s_2 = $validatedData['nbr_pre_s_2'];
        }

        if (isset($validatedData['nbr_dis_s_1'])) {
            $groupProfesseurModule->nbr_dis_s_1 = $validatedData['nbr_dis_s_1'];
        }

        if (isset($validatedData['nbr_dis_s_2'])) {
            $groupProfesseurModule->nbr_dis_s_2 = $validatedData['nbr_dis_s_2'];
        }


        // Save the model
        $groupProfesseurModule->save();

        return redirect()->route('modules.index');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
