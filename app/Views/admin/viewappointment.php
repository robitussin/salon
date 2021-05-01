<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Appointment Info </h4>
    <div class="py-2">
        <form method="post" action ="<?= base_url('admin/changeappointmentstatus'); ?>" id="submitform">
            <?php if(! empty($appointmentlist)): ?>
                <div class="row py-2">
                    <div class="col-md-6"> 
                        <label for="firstname">User ID:</label> 
                        <input type="text" class="bg-light form-control" value="<?= $appointmentlist->accountid ?>" name="userid" disabled> 
                    </div>
                    <div class="col-md-6"> 
                        <label for="email">Service Type:</label> 
                        <input type="text" class="bg-light form-control" value="<?= $appointmentlist->servicename ?>" name="servicename" disabled> 
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">DateTime:</label> <input type="text" class="bg-light form-control" value="<?= $appointmentlist->datetime ?>" name="datetime" disabled> </div>
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Status:</label> <input type="text" class="bg-light form-control" value="<?= $appointmentlist->status ?>" disabled></div>
                </div>

                <div class="dropdown mb-4">
                    <label>Change Status:</label> 
                    <select form ="submitform" name="appointmentstatus">
                        <option selected disabled>Select Status</option>
                        <option name= value="PENDING">PENDING</option>
                        <option value="CANCELLED">CANCELLED</option>
                        <option value="COMPLETE">COMPLETE</option>
                    </select>

                    <label>Assign Employee:</label> 
                    <?php if(! empty($employeelist)): ?>
                        <select form ="submitform" name="employeeid">
                            <?php foreach($employeelist as $field): ?>
                                <option value="<?= $field->id ?>">
                                <?= $field->name ?> 
                                <?php if(!$field->id == 0): ?>
                                    - <?= $field->position ?>
                                <?php endif ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    <?php endif ?>
                </div>
                <div class="py-3 pb-4 border-bottom"> 
                    <button class="btn btn-success " type="button" data-toggle="modal" data-target="#confirm-update">Update Appointment</button>
                    <input type="text" class="bg-light form-control" value="<?= $appointmentlist->id ?>" name="appointmentid" hidden> 
                    <button class="btn border button" class="type" href="<? base_url('admin/manageallappointments'); ?>">Back</button> 
                </div>
            <?php endif ?>

            <!-- Submit Modal-->
            <div class="modal fade" id="confirm-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Update" to apply changes</div>
                        <div class="modal-footer">
                            <button class="btn btn-success" id="submit" type ="submit" name="deactivateaccountbutton" value="deactivateaccountbutton">Update</a>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/adminassets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/demo/datatables-demo.js'); ?>"></script>


</body>

</html>