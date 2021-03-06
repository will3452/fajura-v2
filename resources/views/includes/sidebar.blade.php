<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-crown"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ \App\Models\AppSetting::first()->brand_name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        General
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Accounts</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.account.list_of_all_new_patients') }}">New Patient Accounts</a>
                <a class="collapse-item" href="{{ route('admin.account.patient_accounts') }}">Patient Accounts</a>
                <a class="collapse-item" href="{{ route('admin.account.dentist_accounts') }}">Dentist Accounts</a>
                <a class="collapse-item" href="{{ route('admin.account.staff_accounts') }}">Staff Accounts</a>
                <a class="collapse-item" href="{{ route('admin.account.create') }}">Create new Account</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-fire"></i>
            <span>Services</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.services.index') }}">List of Services</a>
                <a class="collapse-item" href="{{ route('admin.services.create') }}">Add new Service</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApp"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Appointments</span>
        </a>
        <div id="collapseApp" class="collapse" aria-labelledby="headingApp"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.appointments.all') }}">All</a>
                <a class="collapse-item" href="{{ route('admin.appointments.today') }}">Today</a>
                <a class="collapse-item" href="{{ route('admin.appointments.incomming') }}">Incoming</a>
                <a class="collapse-item" href="{{ route('admin.appointments.resolved') }}">Resolved</a>
                <a class="collapse-item" href="{{ route('admin.appointments.cancelled') }}">Cancelled</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepkg"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Promo</span>
        </a>
        <div id="collapsepkg" class="collapse" aria-labelledby="headingApp"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.packages') }}">List</a>
                <a class="collapse-item" href="{{ route('admin.create.package') }}">Add new</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.concerns.list') }}">
            <i class="fas fa-fw fa-comment-alt"></i>
            <span>Concerns</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemq"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-notes-medical"></i>
            <span>MQ</span>
        </a>
        <div id="collapsemq" class="collapse" aria-labelledby="headingApp"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.medical.questions.index') }}">List</a>
                <a class="collapse-item" href="{{ route('admin.medical.questions.create') }}">Add new</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.permissions.index') }}">
            <i class="fas fa-fw fa-fingerprint"></i>
            <span>Permissions</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.blocked.list') }}">
            <i class="fas fa-fw fa-ban"></i>
            <span>Blocking</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.log.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Activity Log</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Extra
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetut"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-book"></i>
            <span>Tutorials</span>
        </a>
        <div id="collapsetut" class="collapse" aria-labelledby="headingApp"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.tutorial.index') }}">List</a>
                <a class="collapse-item" href="{{ route('admin.tutorial.create') }}">Create new</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('blogs.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Blogs</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.setting') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span></a>
    </li>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>