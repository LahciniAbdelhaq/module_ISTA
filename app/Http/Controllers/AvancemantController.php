<?php

namespace App\Http\Controllers;

use App\Models\GroupProfesseurModule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AvancemantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

    
    foreach ($notCompletedOnTime as $notComplete ) {
        $realizationRate = $this->calculateRealizationRate($notComplete);
        $notComplete['realization_rate'] = $realizationRate;
    } 
    return view('module.alert_avancement', compact('notCompletedOnTime'));
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

    // Calculate the realization rate based on the given GroupProfesseurModule instance
private function calculateRealizationRate($groupProfesseurModule)
{
    // Retrieve the associated module
    $module = $groupProfesseurModule->module;  
    
    if ($module) { 
        $totalPlannedHours = $module->nombre_total;
    } else {
        // Default to 0 if the module does not exist
        $totalPlannedHours = 0;
    }

    // Calculate the total actual hours
    $totalActualHours = $groupProfesseurModule->nbr_pre_s_1 + $groupProfesseurModule->nbr_pre_s_2 +$groupProfesseurModule->nbr_dis_s_1 + $groupProfesseurModule->nbr_dis_s_2;

    // Calculate the realization rate
    if ($totalPlannedHours > 0) {
        $realizationRate = ($totalActualHours / $totalPlannedHours) * 100;
    } else {
        $realizationRate = 0;  
    } 
    return $realizationRate;
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupProfesseurModules = GroupProfesseurModule::with('group', 'professeur', 'module')
                        ->where('id', $id)
                        ->first();


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
        // dd($groupProfesseurModules);
        return view('module.module',compact('groupProfesseurModules','notCompletedOnTime'));
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
        $request->validate([
            'date_debut' => 'required ',
            'date_Efm' => 'nullable ',
            'nbr_h_semaine' => 'required|numeric|min:1', // Adjust min value as needed
        ]);
        if($request->date_Efm == null){
            $request["date_Efm"] = '';
        } 
        $groupProfesseurModule = GroupProfesseurModule::findOrFail($id); 
        $groupProfesseurModule->update([
            'date_debut' => $request->input('date_debut'),
            'date_Efm' => $request->input('date_Efm'),
            'nbr_h_semaine' => $request->input('nbr_h_semaine') 
        ]);  
        return to_route('modules.show',['module'=>$groupProfesseurModule->module_code]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
