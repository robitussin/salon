<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Add New Service </h4>

    <div class="text-center" id="formsubmitmessage">      
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success">
            <?php foreach ($message as $field => $messageabc) : ?>
                <p><?= $messageabc ?></p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
    </div>

    <div class="py-2">
        <form method="post" action ="<?= base_url('admin/addService'); ?>" id="submitform">
            <div class="row py-2">
                <div class="col-md-6"> 
                    <label>Service Name:</label> 
                    <input type="text" class="bg-light form-control" name="servicename" required> 
                </div>

                <div class="col-md-6 pt-md-0 pt-3"> 
                    <label>Image Name:</label> <input type="text" class="bg-light form-control" name="imagename">
                </div>

            </div>
            <div class="row py-2">
                <div class="col-md-6 pt-md-0 pt-3"> <label>Service Cost:</label> <input type="text" class="bg-light form-control" name="servicecost" required> </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="phone">Description:</label> 
                    <input type="text" class="bg-light form-control" name="servicedescription" required> 
                </div>
            </div>
        </form>

        <div class="py-3 pb-4 border-bottom"> 
            <button class="btn btn-success " type="button" data-toggle="modal" data-target="#confirm-update">Add</button>
            <a class="btn border button" type="button" href="<?= base_url('admin/manageServices'); ?>">Back</a> 
        </div>
   
        <!-- Submit Modal-->
        <div class="modal fade" id="confirm-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Add" to apply changes</div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="submit" type ="submit">Add</a>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
                    </div>
                </div>
            </div>
        </div>
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
                        <span aria-hidden="true">??</span>
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
    <script src="<?= base_url('assets/adminassets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/adminassets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/formsubmit.js'); ?>"></script>
</body>

</html>