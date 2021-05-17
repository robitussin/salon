
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Create an appointment</h1>
                    <h6 class="m-0 font-weight-bold text-primary">Choose Date and Time</h6>    

                    <form class="user" id="submitform" action="<?= base_url('appointment/createappointment'); ?>" method="post">
                        <div class="card-body">
                            <input id="dateinput" width="312" name="datetime" required>
                            <script>
                                $('#dateinput').datetimepicker({
                                    datepicker: { showOtherMonths: true },
                                    modal: true,
                                    footer: true,
                                    format:'yyyy/mm/dd hh:mm:ss',
                                });
                            </script> 
                        </div>

                        <h6 class="m-0 font-weight-bold text-primary">Choose Service</h6>
                        </br>

                        <div class="row">                 
                            <?php if (! empty($servicelist)) : ?>
                                <?php foreach ($servicelist as $field) : ?>   
                                    <div class="col-lg-3">
                                        <div class="card-body">
                                            <img class="card-img-top" src="<?= base_url('assets/img/'. $field->imagename); ?>" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $field->servicename ?></h4>
                                                <p class="card-text">Cost: <?= $field->servicecost ?> Pesos</p>
                                                <p class="card-text"><?= $field->description ?></p>                                             
                                                <div class="form-check">
                                                    <label class="form-check-label" for="check1">
                                                    <input type="checkbox" class="form-check-input" id="check1" name="servicename[]" value="<?= $field->servicename ."-". $field->id ?>">    
                                                    <p class="card-text">Choose <?= $field->servicename ?></p>               
                                                    </label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </br>
                                <?php endforeach ?>   
                            <?php endif ?>           
                        </div>
        
                        <button class="btn btn-success btn-icon-split" type="button" data-toggle="modal" data-target="#confirm-submit">
                            <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                            </span>
                        <span class="text">Submit</span>
                        </button>
                                                <!-- Logout Modal-->
                        <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Submit" to create an appointment.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit" id="submit">Submit</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <script src="<?= base_url('assets/adminassets/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/js/demo/chart-pie-demo.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/formsubmit.js'); ?>"></script>
</body>

</html>