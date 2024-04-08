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
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
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
                        <a href="" class="dropdown-item dropdown-footer">See All Notifications</a>
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
                                        <h3 class="card-title">Ajouter module</h3>

                                    </div>
                                </div>


                                <!-- /.card-header -->

                                <form action="{{ route('modules.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom_module">Code module</label>
                                                    <input type="text" class="form-control @error('code_module') is-invalid @enderror" name="code_module" id="" style="width: 100%;">
                                                    <div class="invalid-feedback">{{ $errors->first('code_module') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="masse_horaire_distanciel">Masse horaire distanciel</label>
                                                    <input type="number" class="form-control @error('mh_distance') is-invalid @enderror" name="mh_distance" id="mh_distance" style="width: 100%;">
                                                    <div class="invalid-feedback">{{ $errors->first('mh_distance') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="masse_horaire">Nom Module</label>
                                                    <input type="ntext" class="form-control @error('nom_module') is-invalid @enderror" name="nom_module" id="nom_module">
                                                    <div class="invalid-feedback">{{ $errors->first('nom_module') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="masse_horaire_distanciel">total horaire distanciel</label>
                                                    <input type="number" class="form-control @error('nombre_total') is-invalid @enderror" name="nombre_total" id="nombre_total" style="width: 100%;">
                                                    <div class="invalid-feedback">{{ $errors->first('nombre_total') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="masse_horaire_presentiel">Masse horaire présentiel</label>
                                                    <input type="number" class="form-control @error('mh_presentiel') is-invalid @enderror" name="mh_presentiel" id="mh_presentiel" style="width: 100%;">
                                                    <div class="invalid-feedback">{{ $errors->first('mh_presentiel') }}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="regional">Régional</label>
                                                    <select class="form-control @error('regionale') is-invalid @enderror" name="regionale" id="regionale" style="width: 100%;">
                                                        <option value="NON">NON</option>
                                                        <option value="OUI">OUI</option>
                                                    </select>
                                                    <div class="invalid-feedback">{{ $errors->first('regionale') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <form action="{{ route('excel.module') }}" method="post" enctype="multipart/form-data">
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
