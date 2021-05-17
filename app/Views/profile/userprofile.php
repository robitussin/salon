<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
            <p>Accepted file type .png. Less than 1MB</p> <button class="btn button border"><b>Upload</b></button>
        </div>
    </div>
    <div class="py-2">
        <form method="post" id="submitform" action ="<?= base_url('admin/updateAccount'); ?>">
            <?php if(! empty($accountlist)): ?>
                <div class="row py-2">
                    <div class="col-md-6"> <label for="firstname">UserName</label> <input type="text" class="bg-light form-control" value="<?= $accountlist->username ?>" name="username"> </div>
                    <div class="col-md-6"> <label for="email">Email Address</label> <input type="email" class="bg-light form-control" value="<?= $accountlist->emailaddress ?>" name="emailaddress" disabled> </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Phone Number</label> <input type="tel" class="bg-light form-control" value="<?= $accountlist->contactnumber ?>" name="contactnumber"> </div>
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Status</label> <input type="text" class="bg-light form-control" value="<?= $accountlist->status ?>" disabled></div>
                </div>
            <?php endif ?>
            <div class="py-3 pb-4 border-bottom"> 
                <input class="btn btn-primary mr-3" type="button" value="Save Changes" data-toggle="modal" data-target="#confirm-submit">
            </div>
            <div class="col-md-6"> 
                <input type="hidden" class="bg-light form-control" value="<?= $accountlist->id ?>" name="id"> 
            </div>
            <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                <div> 
                    <?php if(!strcmp($accountlist->status, "ACTIVE")): ?>
                        <b>Deactivate account</b> 
                    <?php elseif(!strcmp($accountlist->status, "INACTIVE")): ?>
                        <b>Activate account</b> 
                    <?php endif ?>
                </div>
                <div class="ml-auto"> 
                    <?php if(!strcmp($accountlist->status, "ACTIVE")): ?>
                        <input class="btn btn-danger mr-3" type="button" data-toggle="modal" data-target="#confirm-deactivate" value="Deactivate">
                    <?php elseif(!strcmp($accountlist->status, "INACTIVE")): ?>
                        <input class="btn btn-success mr-3" type="button" data-toggle="modal" data-target="#confirm-activate" value="Activate">
                    <?php endif ?>
                </div>
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
                        <div class="modal-body">Select "Save" to apply changes.</div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="submit" type ="submit" name="userinfoupdate" value="userinfoupdate">Save</a>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Modal-->
            <div class="modal fade" id="confirm-activate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Save" to activate account.</div>
                        <div class="modal-footer">
                            <button class="btn btn-success" id="submit" type ="submit" name="activateaccountbutton" value="activateaccountbutton">Activate</a>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Submit Modal-->
            <div class="modal fade" id="confirm-deactivate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Save" to deactivate account</div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" id="submit" type ="submit" name="deactivateaccountbutton" value="deactivateaccountbutton">Deactivate</a>
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

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/adminassets/js/formsubmit.js'); ?>"></script>

</body>

</html>