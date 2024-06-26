<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Modules
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('modules.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>list modules</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('modules.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>ajouter module</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('groupsProfesseursmodules.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>ajoute l’avancement de programme  </p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fal fa-exclamation-triangle"></i>
          <p>
            alerts
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('avancemant.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>alert l’avancement  </p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa-duotone fa-user-tie"></i>
          <p>
            Prof
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('professeurs.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>list prof</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('professeurs.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>ajouter prof</p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
   <!-- Footer -->
   <footer class=" footer mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-12  ">
                <p class="text-light">&copy; {{ date('Y') }}  S.A .All rights reserved.<br/></p>
                <a href="https://github.com/LahciniAbdelhaq"> <i class="fab fa-github text-light mx-2"></i>abdelhaq lahcini</a><br>
                <a href="https://github.com/devloperSalim"><i class="fab fa-github text-light mx-2"></i>salim boulkhir</a> </p>
            </div>
        </div>
    </div>
</footer>
<!-- /.footer -->
