<?php
if (!isset($_SESSION["user"]["username"])) {
    header("location:index.php?controller");
}
?>

<link rel="stylesheet" href="../../css/style/styles.css">
<div class="sb-nav-fixed">
    <?php include("./View/layout/header.php") ?>
    <div id="layoutSidenav">
        <?php include("./View/layout/slidenav.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Thêm User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                    <div class="card mb-4">
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Nhập thông tin user
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="form-floating mb-3">
                                        <label for="inputEmail">Avatar</label>
                                        <img style="width: 12rem; height: 12rem; border-radius: 50%; margin: 0 auto;padding: 0;" src="<?= $dataList['avatar'] ?>" class="form-control" id="img_load">
                                        <input id="avatar" style="margin: 0 auto;display:block;" type="file" name="fileToADD" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" name="name" type="text" placeholder="Enter your first name" />
                                            <label for="inputFirstName">Fullname</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="username" />
                                            <label for="inputLastName">UserName</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="password" />
                                    <label for="inputEmail">Password</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <select class="form-control form-control-lg" name="Decentralization">
                                            <option value="1">1.Admin</option>
                                            <option value="2">2.Employee</option>
                                            <option value="0">3.User</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <?php if (isset($_SESSION["danger"])) { ?>
                                    <span style="margin: 0 auto;color: red;"><?php echo $_SESSION["danger"] ?></span>
                                <?php }  ?>
                                <?php if (isset($_SESSION["warning"])) { ?>
                                    <span style="margin: 0 auto;color: red;"><?= $_SESSION["warning"] ?></span>
                                <?php } ?>
                                <?php if (isset($_SESSION["dem"])) { ?>
                                    <span style="margin: 0 auto;color: red;"><?= $_SESSION["dem"] ?></span>
                                <?php } ?>
                                <div class="mt-4 mb-0">
                                    <input type="submit" name="submit" class="d-grid btn btn-primary btn-block" value="Insert" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </main>
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
    <script src="../../css/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../css/js/datatables-simple-demo.js"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>

</div>
<?php
$key = "danger";
$ss->unset($key);
$key2 = "warning";
$ss->unset($key2);
$key3 = "dem";
$ss->unset($key3);
?>