<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="PacientesEnSala">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="">Buttons</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?php echo $active_grafico; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>ESTADISTICAS</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php echo $show_grafico; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">GRAFICOS Y ESTADOS:</h6>
                <a class="collapse-item <?php echo ($ruta == 'Graficos') ? "active" : ""; ?>" href="Graficos">Graficos</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Acciones
    </div>

    <!-- PAGINAS DE MENU 
    <li class="nav-item <?php echo $active_evento; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class='bx bx-link-alt'></i>
            <span>Enlaces</span>
        </a>
        <div id="collapsePages" class="collapse <?php echo $show_evento; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Metodos:</h6>
                <a class="collapse-item <?php echo ($ruta == 'registrarEvento') ? "active" : ""; ?>" href="registrarEvento">Registrar Operacion</a>

            </div>
        </div>
    </li>-->

    <!-- ACTUALIZAR MI USUARIO -->
    <li class="nav-item <?php echo ($ruta == 'PacientesEnSala') ? "active" : ""; ?>">
        <a class="nav-link " href="PacientesEnSala">
            <i class='bx bxs-user-pin'></i>
            <span>Pacientes En Sala</span></a>
    </li>

    <!-- ACTUALIZAR MI USUARIO -->
    <li class="nav-item <?php echo ($ruta == 'Profile') ? "active" : ""; ?>">
        <a class="nav-link " href="Profile">
            <i class='bx bxs-user-pin'></i>
            <span>Profile</span></a>
    </li>

    <!-- CERRAR SESSION -->
    <li class="nav-item <?php echo ($ruta == 'Close') ? "active" : ""; ?>">
        <a class="nav-link" href="Close">
            <i class='bx bx-log-out bx-tada'></i>
            <span> Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>