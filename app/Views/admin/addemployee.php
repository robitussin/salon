<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Add New Employee</h4>

    
    <div class="text-center" id="formsubmitmessage">      
        <?php if (! empty($message)) : ?>
            <div class="alert alert-success">
            <?php foreach ($message as $field => $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
    </div>

    <div class="py-2">
        <form method="post" id="submitform" action ="<?= base_url('admin/addemployee'); ?>">
                <div class="row py-2">
                    <div class="col-md-6"> <label for="firstname">Employee Name</label> <input type="text" class="bg-light form-control" value="" name="employeename" required> </div>
                    <div class="col-md-6"> 
                        <div class="dropdown mb-4">
                            <label>Change Status:</label> 
                            <select form ="submitform" name="position" required>
                                <option selected disabled>Select Position</option>
                                <option>Massage Therapist</option>
                                <option>Stylist</option>
                                <option>Manicurist</option>
                                <option>Pedicurist</option>
                            </select>
                        </div>
                    </div>
                </div>

            <div class="py-3 pb-4 border-bottom"> 
            <input class="btn btn-success" type="button" value="Add" data-toggle="modal" data-target="#confirm-submit">
            <a class="btn border button" type="button" href="<?= base_url('admin/manageallemployees'); ?>">Back</a> 
            </div>

            <!-- Submit Modal-->
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
                        <div class="modal-body">Select "Add" to apply changes.</div>
                        <div class="modal-footer">
                            <button class="btn btn-success" id="submit" type ="submit" name="userinfoupdate" value="userinfoupdate">Add</a>
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

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/formsubmit.js'); ?>"></script>


</body>

</html>