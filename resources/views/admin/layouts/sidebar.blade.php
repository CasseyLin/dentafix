<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{route('dashboard')}}">
                <span class="text">DentaFix</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Analytics</div>
                    <div class="nav-item active">
                        <a href="{{route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-lavel">User management</div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-user"></i><span>Admin</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('admin.create')}}" class="menu-item">Create admins</a>
                            <a href="{{route('admin.index')}}" class="menu-item">View admins</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-user"></i><span>Dentists</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('dentist.create')}}" class="menu-item">Create dentists</a>
                            <a href="{{route('dentist.index')}}" class="menu-item">View dentists</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-user"></i><span>Patients</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient.create')}}" class="menu-item">Create patients</a>
                            <a href="{{route('patient.index')}}" class="menu-item">View patients</a>

                        </div>
                    </div>
                    @endif
                
                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-lavel">Appointments</div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-clock"></i><span>Patient Appointments</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient.today')}}" class="menu-item">Today's Appointment</a>
                            <a href="{{route('patients.all')}}" class="menu-item">All time appointment</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-check"></i><span>Services</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('service.create')}}" class="menu-item">Create services</a>
                            <a href="{{route('service.index')}}" class="menu-item">View services</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'dentist')
                    <div class="nav-lavel">Schedules management</div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-calendar"></i><span>Dentist Schedules</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.create')}}" class="menu-item">Create schedules</a>
                            <a href="{{route('appointment.index')}}" class="menu-item">View schedules</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'dentist')
                    <div class="nav-lavel">Prescription of patients</div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Prescription</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('prescribe.patientToday')}}" class="menu-item">Prescribe Patients(today)</a>
                            <a href="{{route('prescribed.patients')}}" class="menu-item">Prescribed Patients(all)</a>

                        </div>
                    </div>
                    @endif

                    <div class="nav-lavel">Logout</div>
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

    <script>
        var botmanWidget = {
            aboutText: 'Developed with❤️ by Cassey',
            introMessage: "✋ Hi! I am Cassey, your assistant chatbot from DentaFix~",
            title:"DentaFix Chatbot",
            placeholderText: 'Ask Cassey Something...',
            bubbleBackground: '#FFFFFF',
            mainColor:'#80E2FF',
            aboutText:'Developed with ❤️ by Cassey',
            aboutLink:'https://drive.google.com/file/d/1Pc8pRFxdSyBHazol4EZkqf_WS0raKh1g/view?usp=sharing',
            bubbleAvatarUrl:'/chatbot/chatbot.jpg'
        };
    </script>
   
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>