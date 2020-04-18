<!-- Modal -->
<?php function signFormModal()
{ ?>
    <div class="modal fade" id="signFormModal" tabindex="-1" role="dialog" aria-labelledby="signFormModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signFormModalLabel">Login/Registrasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#form-login" aria-controls="home" aria-selected="true">Login</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#form-reg" role="tab" aria-controls="profile" aria-selected="false">Registrasi</a></li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div id="form-login" class="tab-pane fade show active" role="tabpanel" aria-labelledby="form-login-tab">
                            <form action="proses_login.php" method="post">
                                <div class="form-group">
                                    <label for="usernameLogin">username</label>
                                    <input class="form-control" type="text" name="username" id="usernameLogin"><br>
                                </div>
                                <div class="form-group">
                                    <label for="passwordLogin">password</label>
                                    <input class="form-control" type="password" name="password" id="passwordLogin"><br>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div id="form-reg" class="tab-pane fade"  role="tabpanel" aria-labelledby="form-reg-tab">
                            <form action="proses_registrasi.php" method="post">

                                <div class="form-group">
                                    <label for="usernameReg">username</label>
                                    <input class="form-control" type="text" name="username" id="usernameReg"><br>
                                </div>

                                <div class="form-group">
                                    <label for="emailReg">email</label>
                                    <input class="form-control" type="email" name="email" id="emailReg"><br>
                                </div>

                                <div class="form-group">
                                    <label for="passwordReg">password</label>
                                    <input class="form-control" type="password" name="password" id="passwordReg"><br>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>