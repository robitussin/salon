
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Create an appointment</h1>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Choose Date and Time</h6>                         
                                </div>
                                <div class="card-body">
                                    <input id="input" width="312" />
                                        <script>
                                            $('#input').datetimepicker({
                                                datepicker: { showOtherMonths: true },
                                                modal: true,
                                                footer: true
                                            });
                                        </script>   
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <!-- /.container-fluid -->