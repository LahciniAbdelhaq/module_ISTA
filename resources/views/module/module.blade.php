<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Absence Stagiaire</title>
@include('layouts.header_links')  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"> 
 
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('avancement') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
       
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Maryem</a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      @include('layouts.SidebarMenu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2"> 
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right"> 
              <li class="breadcrumb-item   "><a href="{{ route('info_module') }}">avancement</a></li> 
              <li class="breadcrumb-item">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row"> 
        <div class="info-box col-12"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                         <!-- Date and time range -->
                <div class="form-group">
                    <label>Date debut module</label>
  
                    <div class="input-group">  
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="startDate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  
                    </div> 
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Date EFM module</label>
    
                      <div class="input-group">  
                          <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" id="endDate"/>
                              <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    </div>
                  </div>
                  <div class="row">
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                          <label>nombre séance  par semaine</label> 
                          <input class="form-control" type="number" value="3" name="" id="nbrSeance" style="width: 100%;">
                    </div>  
                  </div> 
                  
                  <!-- /.col -->
                  </div> 
                  <button type="submit" class="btn btn-primary" id="saveBtn">save</button>
                </div>
                
                <!-- /.row -->
              </div>
            <!-- /.card-body -->
              
        <!-- /.card-body -->
      </div> 
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Completion Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="completionMessage">
        <!-- Message will be dynamically inserted here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Bootstrap Modal -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">ISTA CITY DE L'AIR</a>.</strong>
    All rights reserved.
     
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
@include('layouts.footerjs') 
 
<script>
     $(function () {   
        $('#reservationdate').datetimepicker({
          format: 'D/M/YYYY'
    }); 
    $('#reservationdate1').datetimepicker({
      format: 'D/M/YYYY'
    }); 
        });
</script>
 

{{-- <script>
  function calculateEndDate(startDate, weeklyStudyHours, totalHoursRequired, hoursRealisee) {
    // Split the start date into day, month, and year components
    const [startDay, startMonth, startYear] = startDate.split('/');
    
    // Create a Date object for the start date
    const startDateObj = new Date(startYear, startMonth - 1, startDay); // Months are 0-indexed in JavaScript
    
    // Calculate the total number of weeks required
    const totalRemainingHours = totalHoursRequired - hoursRealisee;
    const weeksRequired = Math.ceil(totalRemainingHours / weeklyStudyHours);
    
    // Calculate the end date
    const endDateObj = new Date(startDateObj.getTime() + weeksRequired * 7 * 24 * 60 * 60 * 1000);
    
    // Format the end date as DD/MM/YYYY
    const endDate = `${endDateObj.getDate()}/${endDateObj.getMonth() + 1}/${endDateObj.getFullYear()}`;
    
    return endDate;
  }

  // Example usage:
  const startDate = '20/03/2024';
  const weeklyStudyHours = 5;
  const totalHoursRequired = 40;
  const hoursRealisee = 20;

  const endDate = calculateEndDate(startDate, weeklyStudyHours, totalHoursRequired, hoursRealisee);
  console.log(`End date: ${endDate}`);
</script> --}}
{{-- <script>
  function calculateEndDate(startDate, weeklyStudyHours, totalHoursRequired, hoursRealisee) {
    // Convert start date to a Date object
    const [startDay, startMonth, startYear] = startDate.split('/');
    const startDateObj = new Date(`${startYear}-${startMonth}-${startDay}`);
    
    // Calculate the total number of weeks required
    const totalRemainingHours = totalHoursRequired - hoursRealisee;
    const totalWeeksRequired = Math.ceil(totalRemainingHours / weeklyStudyHours);
    
    // Calculate the end date based on the total number of weeks required
    const endDateObj = new Date(startDateObj.getTime() + totalWeeksRequired * 7 * 24 * 60 * 60 * 1000);
    
    // Format the end date as DD/MM/YYYY
    const endDate = `${endDateObj.getDate()}/${endDateObj.getMonth() + 1}/${endDateObj.getFullYear()}`;
    
    return endDate;
  }

  function willCompleteOnTime(startDate, endDate, weeklyStudyHours, totalHoursRequired, hoursRealisee) {
    // Calculate end date if it's not provided
    if (!endDate) {
      endDate = calculateEndDate(startDate, weeklyStudyHours, totalHoursRequired, hoursRealisee);
    }
    
    // Convert start and end dates to Date objects
    const [startDay, startMonth, startYear] = startDate.split('/');
    const [endDay, endMonth, endYear] = endDate.split('/');
    const startDateObj = new Date(`${startYear}-${startMonth}-${startDay}`);
    const endDateObj = new Date(`${endYear}-${endMonth}-${endDay}`);
    
    // Calculate the total number of days between start and end dates
    const totalDays = Math.ceil((endDateObj - startDateObj) / (1000 * 60 * 60 * 24));
    
    // Calculate total remaining hours required to complete the program
    const totalRemainingHours = totalHoursRequired - hoursRealisee;
    
    // Calculate the total number of weeks required based on the weekly study hours
    const totalWeeksRequired = Math.ceil(totalRemainingHours / weeklyStudyHours);
    
    // Calculate the total number of days required
    const totalDaysRequired = totalWeeksRequired * 7;
    
    // Determine if the program will be completed on time
    const willCompleteOnTime = totalDays <= totalDaysRequired;
    
    // Output message
    let message;
    if (willCompleteOnTime) {
      message = `Will complete on time. End date: ${endDate}`;
    } else {
      message = `Will not complete on time. End date: ${endDate}`;
    }
    
    return message;
  }

  // Example usage:
  const startDate = '20/03/2024';
  const endDate = ''; // Empty endDate
  const weeklyStudyHours = 5;
  const totalHoursRequired = 40;
  const hoursRealisee = 10;

  const completionStatus = willCompleteOnTime(startDate, endDate, weeklyStudyHours, totalHoursRequired, hoursRealisee);
  
  console.log(completionStatus);
</script> --}}
<script>
  function showCompletionMessage(message) {
    // Set the message in the modal body
    document.getElementById('completionMessage').innerHTML = message;
    
    // Show the modal
    $('#myModal').modal('show');
  }
  function calculateEndDate(startDate, weeklyStudyHours, totalHoursRequired, hoursRealisee) {
    // Split the start date into day, month, and year components
    const [startDay, startMonth, startYear] = startDate.split('/');
    
    // Create a Date object for the start date
    const startDateObj = new Date(startYear, startMonth - 1, startDay); // Months are 0-indexed in JavaScript
    
    // Calculate the total number of weeks required
    const totalRemainingHours = totalHoursRequired - hoursRealisee;
    const weeksRequired = Math.ceil(totalRemainingHours / weeklyStudyHours);
    
    // Calculate the end date
    const endDateObj = new Date(startDateObj.getTime() + weeksRequired * 7 * 24 * 60 * 60 * 1000);
    
    // Format the end date as DD/MM/YYYY
    const endDate = `${endDateObj.getDate()}/${endDateObj.getMonth() + 1}/${endDateObj.getFullYear()}`;
    
    return endDate;
  }


  function willCompleteOnTime(startDate, endDate, weeklyStudyHours, totalHoursRequired, hoursRealisee) {
     
    // Convert start and end dates to Date objects
    const [ startDay,startMonth, startYear] = startDate.split('/');
    const [ endDay,endMonth, endYear] = endDate.split('/'); 

    const startDateObj = new Date(`${startYear}-${startMonth}-${startDay}`);
    const endDateObj = new Date(`${endYear}-${endMonth}-${endDay}`);  
    // Calculate the total number of days between start and end dates
    const totalDays = Math.ceil((endDateObj - startDateObj) / (1000 * 60 * 60 * 24)); 
    // Calculate total remaining hours required to complete the program
    const totalRemainingHours = totalHoursRequired - hoursRealisee;
    // Calculate the total number of weeks required based on the weekly study hours
    const totalWeeksRequired = Math.ceil(totalRemainingHours / weeklyStudyHours);  
    
    // Calculate the total number of days required
    const totalDaysRequired = totalWeeksRequired * 7;
    
    // Determine if the program will be completed on time
    const willCompleteOnTime = totalDays >= totalDaysRequired;  
    // Output message
    let message;
    if (willCompleteOnTime) {
      message = `Will complete on time. End date: ${endDate}`;
    } else {
      message = `Will not complete on time. End date: ${endDate}`;
    }
    
    // Show the completion message in the modal
    showCompletionMessage(message);
  }

  function handleSaveButtonClick() {
    // Get the value of the date input field
    const startDate = document.getElementById('startDate').value;
    const entDate = document.getElementById('endDate').value;
    const weeklyStudyHours = document.getElementById('nbrSeance').value; 
    // Check if weeklyStudyHours has a value
    if (weeklyStudyHours && startDate) { 
        // Other parameters needed for the calculation
        const totalHoursRequired = 40;
        const hoursRealisee = 20;

        // Check if endDate is empty
        if (endDate.value === '') { 

            // Calculate endDate if it's empty
            const calculatedEndDate = calculateEndDate(startDate, weeklyStudyHours, totalHoursRequired, hoursRealisee);
             
            // Call the willCompleteOnTime function with the calculated endDate
            willCompleteOnTime(startDate, calculatedEndDate, weeklyStudyHours, totalHoursRequired, hoursRealisee);
        } else { 

            // Call the willCompleteOnTime function with the retrieved endDate
            willCompleteOnTime(startDate, endDate.value, weeklyStudyHours, totalHoursRequired, hoursRealisee);
        }
    } else {
        // Handle the case where weeklyStudyHours is empty (e.g., display an error message)
        console.log("Please provide the number of weekly study hours.");
    }
  }

   // Bind click event listener to the "Save" button
   document.getElementById('saveBtn').addEventListener('click', handleSaveButtonClick);
</script>

</body>
</html>
