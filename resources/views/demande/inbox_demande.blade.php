<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
@include('layouts.header_links')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
          <a href="{{ route('demandes.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
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
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
          <div class="col-sm-6">
            <h1 class="m-0">Demandes list</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Demandes</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
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
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Inbox</h3>

                    <div class="card-tools">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Mail" id="searchinput">
                        <div class="input-group-append">
                          <div class="btn btn-primary">
                            <i class="fas fa-search"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-default btn-sm btn-delete">
                          <i class="far fa-trash-alt"></i> Delete
                      </button>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-default btn-sm" id="refreshButton">
                          <i class="fas fa-sync-alt"></i>
                      </button>
                      <button type="button" class="btn btn-success btn-sm" id="acceptButton">
                          <i class="fas fa-check"></i> Accept
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" id="refuseButton">
                          <i class="fas fa-times"></i> Refuse
                      </button>
                  </div>
                    <div class="table-responsive mailbox-messages">
                      <table class="table table-hover table-striped" id="example">
                        <thead>
                            <tr>
                              <th>
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"> <i class="far fa-square"></i>
                              </button>
                            </th>
                              <th>id</th>
                              <th>Nom et Prenom</th>
                              <th>Nom Group </th>
                              <th>type demande </th>
                              <th>description</th>
                              <th>status</th>
                              <th>time</th>
                            </tr>
                          </thead>
                        <tbody>
                      @foreach ($demandes as $demande )
                        @foreach ($stagiaires as $stagiaire )
                        @endforeach

                      <tr>
                        <td>
                          <div class="icheck-primary">
                            <input type="checkbox" value="{{ $demande->id }}" id="check{{ $demande->id }}">
                            <label for="check{{ $demande->id }}"></label>
                          </div>
                        </td>
                        <td class="mailbox-star"><a href="#"></a>{{ $demande->id }}</td>
                        <td class="mailbox-name"><a href="read-mail.html"><b>{{ $demande->stagiaire->prenom }} {{ $demande->stagiaire->nom }}</b></td>
                        <td class="mailbox-name"><a href="read-mail.html">{{ $stagiaire->group->code_group }}</a></td>
                        <td class="mailbox-name"><a href="read-mail.html">{{ $demande->type }}</a></td>
                        <td class="mailbox-subject"> {{ Str::limit($demande->description,3,'...ect') }}
                        </td>
                        <td class="mailbox-attachment"><span class="badge rounded-pill bg-primary">{{ $demande->status }}</span></td>
                        <td class="mailbox-date">{{ $demande->created_at }}</td>
                      </tr>
                      @endforeach

                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.card-body -->

                </div>
                <!-- /.card -->
              </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

@extends('layouts.footerjs') 
 

<script>
    document.addEventListener("DOMContentLoaded", function() {
      // Get references to the input element and the table
      var searchInput = document.getElementById("searchinput");
      var dataTable = document.getElementById("example");
      var tableRows = dataTable.getElementsByTagName("tr");

      // Add event listener for keyup event on the search input
      searchInput.addEventListener("keyup", function() {
        var searchText = searchInput.value.toLowerCase();

        // Loop through all table rows and hide those that do not match the search query
        for (var i = 1; i < tableRows.length; i++) { // Start from index 1 to skip header row
          var rowData = tableRows[i].getElementsByTagName("td");
          var rowMatch = false;

          for (var j = 0; j < rowData.length; j++) {
            var cellData = rowData[j].textContent.toLowerCase();
            if (cellData.indexOf(searchText) > -1) {
              rowMatch = true;
              break;
            }
          }

          if (rowMatch) {
            tableRows[i].style.display = "";
          } else {
            tableRows[i].style.display = "none";
          }
        }
      });
    });
 </script>
 <script> 
    $(document).ready(function() {
        // Handle checkbox toggle
            $('.checkbox-toggle').click(function() {
        var checkboxes = $('input[type="checkbox"]:visible');
        checkboxes.prop('checked', !checkboxes.prop('checked'));
    });
    
        // Handle delete button click
        $('.btn-delete').click(function() {
            var selectedCheckboxes = $('input[type="checkbox"]:checked');
            var selectedIds = [];
            selectedCheckboxes.each(function() {
                selectedIds.push(parseInt($(this).val().replace('check', ''), 10));
            });
         console.log(selectedIds);
        
            // Send AJAX request to delete the selected items
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   
          $.ajax({
              url: '{{ route('demand.delete') }}',
              type: 'POST',  
              data:{
            selectedIds: selectedIds 
                  }
              ,  
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, 
              success: function(response) {
                  // Handle success response 
                  alert(response.message);
                  location.reload();
              },
              error: function(xhr, status, error) {
                  // Handle error response
                  console.error(error); 
              }
              }); 
         
        });
    });
    </script>
    <script>
        // Add event listener for the refresh button
        document.getElementById('refreshButton').addEventListener('click', function() {
            // Reload the page
            location.reload();
        });
    </script>
    <script>
      $(document).ready(function () {
          // Function to handle the Accept button click

          $("#acceptButton").click(function () {
            var selectedCheckboxes = $('input[type="checkbox"]:checked');
            var selectedIds = [];
            selectedCheckboxes.each(function() {
                selectedIds.push(parseInt($(this).val().replace('check', ''), 10));
            }); 
              // Perform action for accepting selected items
               // Send an AJAX request to the Laravel route
                // Add the CSRF token to the request headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   
          $.ajax({
              url: '{{ route('demand.accepte') }}',
              type: 'POST',  
              data:{
            selectedIds: selectedIds 
                  }
              ,  
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, 
              success: function(response) {
                  // Handle success response 
                  alert(response.message);
                  location.reload();
              },
              error: function(xhr, status, error) {
                  // Handle error response
                  console.error(error); 
              }
              }); 
          });

          // Function to handle the Refuse button click
          $("#refuseButton").click(function () {
            var selectedCheckboxes = $('input[type="checkbox"]:checked');
            var selectedIds = [];
            selectedCheckboxes.each(function() {
                selectedIds.push($(this).val().replace('check', ''));
            });
            console.log(selectedIds);
              // Perform action for refusing selected items
              alert("Refusing selected items...");
          });
      });
  </script>
</body>
</html>
