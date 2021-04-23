<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Appointments</h1>
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
                                Total Appointments</div>
                            <?php if (! empty($appointmentlist)) : ?>
                                <?php $totalappoinments = 0; ?>
                                <?php foreach ($appointmentlist as $field) : ?>                                
                                        <?php $totalappoinments++; ?>
                                <?php endforeach ?>                             
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalappoinments; ?></div>
                            <?php else: ?> 
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
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
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Completed appointments</div>
                            <?php if (! empty($appointmentlist)) : ?>
                                <?php $completedappointments = 0; ?>
                                <?php foreach ($appointmentlist as $field) : ?>
                                    <?php if(!strcmp($field->status, "COMPLETE")): ?>                                
                                        <?php $completedappointments++; ?>
                                    <?php endif ?>   
                                <?php endforeach ?>                             
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $completedappointments; ?></div>
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

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cancelled Appointments
                            </div>
                            <?php if (! empty($appointmentlist)) : ?>
                                <?php $cancelledappointments = 0; ?>
                                <?php foreach ($appointmentlist as $field) : ?>
                                    <?php if(!strcmp($field->status, "CANCELLED")): ?>                                
                                        <?php $cancelledappointments++; ?>
                                    <?php endif ?>   
                                <?php endforeach ?>                             
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cancelledappointments; ?></div>
                            <?php else: ?> 
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            <?php endif ?> 
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ban fa-2x text-gray-300"></i>
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
                                Pending Appointments</div>
                                <?php if (! empty($appointmentlist)) : ?>
                                    <?php $pendingappointments = 0; ?>
                                    <?php foreach ($appointmentlist as $field) : ?>
                                        <?php if(!strcmp($field->status, "PENDING")): ?>                                
                                            <?php $pendingappointments++; ?>
                                        <?php endif ?>   
                                    <?php endforeach ?>                             
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pendingappointments; ?></div>
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
    <?php if (! empty($appointmentlist)) : ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Appointment History</h1>
    </div>
    <?php endif ?>    
    
    <div class="row">
        
        <!-- Border Bottom Utilities -->
        <?php if (! empty($appointmentlist)) : ?>
            <?php foreach ($appointmentlist as $field) : ?> 
                <div class="col-lg-6">
                    <?php if(!strcmp($field->status, "PENDING")): ?>
                        <div class="card mb-4 py-3 border-bottom-warning">
                            <div class="card-body">
                                <p class="card-text"> <?= $field->servicename ?></p> 
                                <p class="card-text"> Appointment date: <?= $field->datetime ?></p> 
                            </div>
                        </div>  
                    <?php elseif(!strcmp($field->status, "CANCELLED")): ?>
                        <div class="card mb-4 py-3 border-bottom-danger">
                            <div class="card-body">
                                <p class="card-text"> <?= $field->servicename ?></p> 
                                <p class="card-text">  Appointment date: <?= $field->datetime ?></p>                       
                            </div>
                        </div>
                    <?php elseif(!strcmp($field->status, "COMPLETE")): ?>
                        <div class="card mb-4 py-3 border-bottom-success">
                            <div class="card-body">
                                <p class="card-text"> <?= $field->servicename ?></p> 
                                <p class="card-text"> Appointment date: <?= $field->datetime ?></p> 
                            </div>
                        </div>
                    <?php endif ?>  
                </div>
            <?php endforeach ?>   
        <?php endif ?>     
    
    </div>
</div>
<!-- /.container-fluid -->


</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Brusko fix salon 2021</span>
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
    <script src="<?= base_url('assets/adminassets/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/js/demo/chart-pie-demo.js'); ?>"></script>
</body>

</html>
