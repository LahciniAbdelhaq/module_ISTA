<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $professeurs = Professeur::all();
        $groups = Group::all();
        dd($groups);
        return view('prof.list_prof' , compact('professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prof.ajoute_prof');
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
        // dd($formFields);
        return redirect()->route('professeurs.index');

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
