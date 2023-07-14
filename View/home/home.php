<?php
session_start();
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
                    <h1 class="mt-4">Quản Lý User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
                    <div class="card mb-4">
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Danh sách User
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FullName</th>
                                        <th>UserName</th>
                                        <th>Password</th>
                                        <th>Decentralization</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>FullName</th>
                                        <th>UserName</th>
                                        <th>Password</th>
                                        <th>Decentralization</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($dataList as $value) {   ?>
                                    <tr>
                                        <td><?= $value["id"] ?></td>
                                        <td><?= $value["name"] ?></td>
                                        <td><?= $value["username"] ?></td>
                                        <td><?= $value["password"] ?></td>

                                        <?php if ($value["Decentralization"] == 1) { ?>
                                        <td><?= $value["Decentralization"] . ' - ' . 'Admin' ?></td>
                                        <?php } else if ($value["Decentralization"] == 2) { ?>
                                        <td><?= $value["Decentralization"] . '  - ' . 'Employee' ?></td>
                                        <?php } else if ($value["Decentralization"] == 0) { ?>
                                        <td><?= $value["Decentralization"] . '  - ' . 'User' ?></td>
                                        <?php }   ?>
                                        <td>
                                            <a href="index.php?controller=edit&id=<?= $value["id"] ?>">Edit</a>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                href="index.php?controller=delete&id=<?= $value["id"] ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                            <?php
                            $row_count = $db->page();
                            $trang = ceil($row_count / 5);
                            ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $trang; $i++) {  ?>
                                    <li class="page-item"><a class="page-link"
                                            href="index.php?controller=dashboard&page=<?php echo $i ?>"><?php echo $i ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../../css/js/datatables-simple-demo.js"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</div>