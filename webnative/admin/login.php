<?php 
$model = new Member();

?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Login/Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php?hal=home">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Login/Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 mt-2 mb-2">
                        <form action="./admin/controllers/member_controllers.php" method="POST">
                        <div class="card shadow-lg border-1 rounded-lg mt-2 mb-2">
                            <div class="card-header"><h3 class="text-center font-font-weight-normal my-4">Login</h3></div>
                            
                            <div class="card-body">
                                
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="username" type="text" placeholder="Username" />
                                        <label for="inputUsername">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.html">Forgot Password?</a>
                                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                                    </div>
                                
                            </div>
                            <div class="card-footer text-center py-3">
                                <!-- <div class="small"> -->
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#registerModal">Need an account? Sign up!
                                    </button>
                                    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-uppercase" id="registerModalLabel">Register</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input class="form-control mb-2" type="text" name="fullname" id="fullname" placeholder="Fullname">
                                                    <input class="form-control mb-2" type="text" name="usernameRegis" id="usernameRegis" placeholder="Username">
                                                    <input class="form-control mb-2" type="password" name="passwordRegis" id="passwordRegis" placeholder="Password">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Pilih Role</label>
                                                        </div>
                                                        <select class="form-control" id="roleRegis" name="roleRegis">
                                                            <option selected>Choose...</option>
                                                            <option value="manager">Manager</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="staff">Staff</option>
                                                        </select>
                                                    </div>
                                                    <input class="form-control mb-2" type="text" name="fotoRegis" id="fotoRegis" placeholder="Foto">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="proses" value="setMember" class="btn btn-primary">Sign Up</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</div>