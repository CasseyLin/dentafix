<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Patients</h6>
                                <h2>{{App\User::where('role_id',3)->count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Dentists</h6>
                                <h2>{{App\User::where('role_id',2)->count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user-plus"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Admin</h6>
                                <h2>{{App\User::where('role_id',1)->count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user-plus"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Roles</h6>
                                <h2>{{App\Role::count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user-check"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Roles in DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Services</h6>
                                <h2>{{App\Service::count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-message-square"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Services in DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Appointment</h6>
                                <h2>{{App\Reservation::count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-message-square"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Appointments in DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Prescription</h6>
                                <h2>{{App\Prescription::count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-align-justify"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Prescriptions in DentaFix</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>