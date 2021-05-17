<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>


<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Gross Total Earnings</div>

                           <?php if($statistics['totalGrossEarnings'] > 0): ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱ <?= $statistics['totalGrossEarnings'] ?></div>
                            <?php else: ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱ 0.00</div>
                            <?php endif ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Net Earnings</div>

                            <?php if($statistics['totalNetEarnings'] > 0): ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱ <?= $statistics['totalNetEarnings'] ?></div>
                            <?php else: ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱ 0.00</div>
                            <?php endif ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Completed Appointments</div>

                            <?php if($statistics['totalCompletedAppointments'] > 0): ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statistics['totalCompletedAppointments'] ?></div>
                            <?php else: ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            <?php endif ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pending Appointments</div>
                            
                        <?php if($statistics['totalPendingAppointments'] > 0): ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statistics['totalPendingAppointments']?></div>
                            <?php else: ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            <?php endif ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Gross Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>

            <!-- Area Chart Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="AdminAreaChart"></canvas>

                    <?php foreach($earningspermonth as $field): ?>
                    <input type="text" id="myInput<?= $field->month ?>" value="<?= $field->monthlyearnings ?>" hidden>
                    <?php endforeach ?>
                
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="AdminPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                    <input type="text" id="percentHaircut" value="<?= $statistics['percentHaircut'] ?>" hidden>
                        <i class="fas fa-circle text-primary"></i> Haircut
                    </span>
                    <span class="mr-2">
                        <input type="text" id="percentManicure" value="<?= $statistics['percentManicure'] ?>" hidden>
                        <i class="fas fa-circle text-success"></i> Manicure
                    </span>
                    <span class="mr-2">
                        <input type="text" id="percentPedicure" value="<?= $statistics['percentPedicure']?>" hidden>
                        <i class="fas fa-circle text-info"></i> Pedicure
                    </span>
                    <span class="mr-2">
                        <input type="text" id="percentMassage" value="<?= $statistics['percentMassage']?>" hidden>  
                        <i class="fas fa-circle text-warning"></i> Massage
                    </span>
                    <span class="mr-2">
                        <input type="text" id="percentHomeServiceHaircut" value="<?= $statistics['percentHomeServiceHaircut']?>" hidden>  
                        <i class="fas fa-circle text-danger"></i> Home Service Haircut
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Appointment Overview</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Percent Cancelled<span
                        class="float-right"><?= $statistics['percentCancelled']?>%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $statistics['percentCancelled']?>%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Percent Pending <span
                        class="float-right"><?= $statistics['percentPending']?>%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $statistics['percentPending']?>%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Percent Completed<span
                        class="float-right"><?= $statistics['percentCompleted']?>%</span></h4>


                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $statistics['percentCompleted']?>%"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Brusko Barbershop 2021. All Rights Reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('account/userlogout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/adminassets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/adminassets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/adminassets/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/adminassets/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/demo/chart-area-admin.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/js/demo/chart-pie-admin.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/adminassets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/demo/datatables-demo.js'); ?>"></script>


</body>

</html>