<link rel="stylesheet" href="./login.css">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <?php if (isset($_SESSION["wrong_password"])) { ?>
                                <span style="margin: 0 auto;color: red;"><?php echo $_SESSION["wrong_password"] ?></span>
                            <?php }  ?>
                            <?php if (isset($_SESSION["account_does_not_exist"])) { ?>
                                <span style="margin: 0 auto;color: red;"><?= $_SESSION["account_does_not_exist"] ?></span>
                            <?php } ?>
                            <?php if (isset($_SESSION["account_empty"])) { ?>
                                <span style="margin: 0 auto;color: red;"><?= $_SESSION["account_empty"] ?></span>
                            <?php } ?>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-floating mb-3">
                                        <input value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>" class="form-control" id="inputEmail" name="username" type="text" placeholder="name@example.com" />
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3 form-pass">
                                        <input value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>" class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                        <div>
                                            <i id="toggle-icon" class="far fa-eye" onclick="togglePasswordVisibility()"></i>
                                        </div>

                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" name="inputRememberPassword" id="inputRememberPassword" type="checkbox" value="" />
                                        <label class="form-check-label" for="inputRememberPassword">Remember
                                            Password</label>

                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="index.php?controller=forgotPass">Forgot Password?</a>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Login" />

                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="index.php?controller=register">Need an account? Sign up!</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<?php
$key = "wrong_password";
$ss->unset($key);
$key2 = "account_does_not_exist";
$ss->unset($key2);
$key3 = "account_empty";
$ss->unset($key3);
?>
<!-- echo '<script type="text/javascript">

    window.onload = function () { alert("Tài khoản hoặc mật khẩu không chính xác!"); } </script>'; -->