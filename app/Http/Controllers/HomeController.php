<?php

namespace App\Http\Controllers;
 
use App\Models\GroupProfesseurModule;
use Carbon\Carbon; 

class HomeController extends Controller
{
    public function index(){
        $notCompletedOnTime = $this->Alert();
        return view('home',compact('notCompletedOnTime'));
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
