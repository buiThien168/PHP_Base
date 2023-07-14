<?php
if (!isset($_SESSION["user"]["username"])) {
    header("location:index.php?controller");
}
?>
<?php include "./user/View/layout/header.php"  ?>
<!-- ======= Hero Section ======= -->
<?php include "./user/View/layout/section.php"  ?>

<?php include "./user/View/layout/main.php"  ?>
<!-- ======= Footer ======= -->
<?php include "./user/View/layout/footer.php"  ?>