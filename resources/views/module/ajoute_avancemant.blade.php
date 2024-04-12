<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    @include('layouts.header_links')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
                width="60">
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
                  <span class="badge badge-warning navbar-badge">{{ count($notCompletedOnTime)}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">{{ count($notCompletedOnTime)}} Notifications</span>
                  @if ($notCompletedOnTime)
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> count($notCompletedOnTime) new reports 
                  </a>
                  @endif
                    
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('avancemant.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
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
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            @include('layouts.Sidebar')
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <!-- /.col -->
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item ">Dashboard </li>
                                <li class="breadcrumb-item"><a href="{{ route('modules.index') }}">modules</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('modules.create') }}">Ajouter
                                        module</a></li>
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
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Ajouter avancement module</h3>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <form action="{{ route('groupsProfesseursmodules.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Module</label>
                                                    <select class="form-control @error('module_code') is-invalid @enderror" style="width: 100%;" name="module_code">
                                                        @foreach ($modules as $module)
                                                        <option value="{{ $module->code_module }}">{{ $module->code_module }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">{{ $errors->first('module_code') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Professeur</label>
                                                    <select class="form-control @error('professeur_code') is-invalid @enderror" style="width: 100%;" name="professeur_code">
                                                        @foreach ($professeurs as $professeur)
                                                        <option value="{{ $professeur->code_professeur }}">{{ $professeur->nom_prenom }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">{{ $errors->first('professeur_code') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Group</label>
                                                    <select class="form-control @error('group_code') is-invalid @enderror" style="width: 100%;" name="group_code">
                                                        @foreach ($groups as $group)
                                                        <option value="{{ $group->code_group }}">{{ $group->code_group }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">{{ $errors->first('group_code') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre horaire par semaine</label>
                                                    <input type="number" class="form-control @error('nbr_h_semaine') is-invalid @enderror" name="nbr_h_semaine">
                                                    <div class="invalid-feedback">{{ $errors->first('nbr_h_semaine') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Affectée Globale distanciel S1</label>
                                                    <input type="number" class="form-control @error('nbr_dis_s_1') is-invalid @enderror" name="nbr_dis_s_1">
                                                    <div class="invalid-feedback">{{ $errors->first('nbr_dis_s_1') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Affectée Globale distanciel S2</label>
                                                    <input type="number" class="form-control @error('nbr_dis_s_2') is-invalid @enderror" name="nbr_dis_s_2">
                                                    <div class="invalid-feedback">{{ $errors->first('nbr_dis_s_2') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Affectée Globale présentiel S1</label>
                                                    <input type="number" class="form-control @error('nbr_pre_s_1') is-invalid @enderror" name="nbr_pre_s_1">
                                                    <div class="invalid-feedback">{{ $errors->first('nbr_pre_s_1') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Affectée Globale présentiel S2</label>
                                                    <input type="number" class="form-control @error('nbr_pre_s_2') is-invalid @enderror" name="nbr_pre_s_2">
                                                    <div class="invalid-feedback">{{ $errors->first('nbr_pre_s_2') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>




                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->

                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <form action="{{ route('excel.avance_module') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="excel_file">Select Excel file:</label>
                                        <input type="file"
                                            class="form-control @error('excel_file') is-invalid @enderror"
                                            id="excel_file" name="excel_file" accept=".xls,.xlsx">
                                        <div class="invalid-feedback">Please select an Excel file.</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload Excel</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
    @include('layouts.footerjs')
</body>

</html>
