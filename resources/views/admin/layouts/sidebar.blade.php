<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{route('dashboard')}}">
                <div class="logo-img">
                   <img src="{{asset('template/src/img/brand-white.svg') }}" class="header-brand-img" alt="Dentafix"> 
                </div>
                <span class="text">DentaFix</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Services</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('service.create')}}" class="menu-item">Create services</a>
                            <a href="{{route('service.index')}}" class="menu-item">View services</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Dentists</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('dentist.create')}}" class="menu-item">Create dentists</a>
                            <a href="{{route('dentist.index')}}" class="menu-item">View dentists</a>

                        </div>
                    </div>
                    @endif
                
                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient Appointments</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient.today')}}" class="menu-item">Today's Appointment</a>
                            <a href="{{route('patients.all')}}" class="menu-item">All time appointment</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>To-do-list</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient.today')}}" class="menu-item">To-do-list</a>
                            <a href="{{route('patients.all')}}" class="menu-item">All time appointment</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'dentist')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Dentist Schedules</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.create')}}" class="menu-item">Create schedules</a>
                            <a href="{{route('appointment.index')}}" class="menu-item">View schedules</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'dentist')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Prescription</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('prescribe.patientToday')}}" class="menu-item">Prescribe Patients(today)</a>
                            <a href="{{route('prescribed.patients')}}" class="menu-item">Prescribed Patients(all)</a>

                        </div>
                    </div>
                    @endif

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{route('logout')}}"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>