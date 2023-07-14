<?php
include "Model/DBConfig.php";
include "Model/Session.php";
$db = new Database();
$ss = new Session();
$db->connect();

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = '';
}
switch ($controller) {
        // home
    case 'dashboard': {
            $ss->init();
            $table = "user";
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $begin = ($page * 3) - 3;
            $data = $db->getAllData($table, $begin);
            if (empty($data)) {
                $dataList = array();
            } else {
                $dataList = $data;
            }

            require_once('View/home/home.php');
            break;
        }
        // đăng xuất
    case 'logout': {
            $ss->init();
            $key = "user";
            $ss->unset($key);
            header('location:index.php?controller');
            exit;
        }
        // xóa
    case 'delete': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $table = "user";
                $db->DeleteData($table, $id);
                header("location:index.php?controller=dashboard");
                exit;
            }
        }
        // add
    case 'add': {
            $ss->init();
            if (isset($_POST["submit"])) {
                $thanhcong = array();
                if (empty($_POST["name"]) || empty($_POST["username"]) || empty($_POST["password"])) {
                    $_SESSION["warning"] = "Chưa điền đầy đủ thông tin";
                } else {
                    $name = $_POST["name"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $Decentralization = (int)$_POST["Decentralization"];
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $table = "user";
                    $result = $db->getUserLogin($table, $username);
                    $dem = mysqli_num_rows($result);
                    $path = "assets/uploads/";
                    $file_name = $_FILES["fileToADD"]["tmp_name"];
                    $file_uploads = "";
                    if ($dem > 0) {
                        $_SESSION["dem"] = "tài khoản đã được sử dụng, vui lòng chọn tên khác";
                    } else {

                        if ($_FILES["fileToADD"]["type"] == "image/jpeg" || $_FILES["fileToADD"]["type"] == "image/png" || $_FILES["fileToADD"]["type"] == "image/jpg" || $_FILES["fileToADD"]["type"] = "image/gif") {
                            if ($_FILES["fileToADD"]["error"] < 1) {
                                if ($_FILES["fileToADD"]["size"] < 5 * 1024 * 1024) {
                                    $file_uploads = "assets/uploads/" . $_FILES["fileToADD"]["name"];
                                    move_uploaded_file($file_name, $path . $_FILES["fileToADD"]["name"]);
                                    if ($db->InsertData($name, $username, $password, $file_uploads, $Decentralization)) {
                                        $_SESSION["success"] = "Thêm thành công";
                                        header("location:index.php?controller=dashboard");
                                        exit;
                                    } else {
                                        $_SESSION["danger"] = "Thêm thất bại";
                                    }
                                }
                            }
                        }
                    }
                }
            }
            require_once('View/add/add.php');
            break;
        }
        // sửa
    case 'edit': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $table = "user";
                $dataList = $db->getDataID($table, $id);
                if (isset($_POST['update'])) {
                    $name = $_POST["name"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $Decentralization = (int)$_POST["Decentralization"];
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $path = "assets/uploads/";
                    $file_name = $_FILES["fileToUpload"]["tmp_name"];
                    $file_uploads = "";
                    if ($_FILES["fileToUpload"]["type"] == "image/jpeg" || $_FILES["fileToUpload"]["type"] == "image/png" || $_FILES["fileToUpload"]["type"] == "image/jpg" || $_FILES["fileToUpload"]["type"] = "image/gif") {
                        if ($_FILES["fileToUpload"]["error"] < 1) {
                            if ($_FILES["fileToUpload"]["size"] < 5 * 1024 * 1024) {
                                $file_uploads = "assets/uploads/" . $_FILES["fileToUpload"]["name"];
                                move_uploaded_file($file_name, $path . $_FILES["fileToUpload"]["name"]);
                                if ($db->UpdateData($name, $username, $password, $file_uploads, $Decentralization, $id)) {
                                    header("location:index.php?controller=dashboard");
                                    exit();
                                }
                            }
                        }
                    }
                }
            }
            require_once('View/edit/edit.php');
            break;
        }
        // tìm kiếm
    case 'search': {
            if (isset($_GET['key'])) {
                $key = $_GET['key'];
                $table = "user";
                $dataList = $db->SearchData($table, $key);
            } else {
                header("location:index.php?controller=dashboard");
                exit;
            }
            require_once('View/home/home.php');
            break;
        }
        // đăng kí
    case 'register': {
            require_once('View/register/register.php');
            break;
        }
        // quên mk
    case 'forgotPass': {
            // if (isset($_POST['submit_pass_reset'])) {
            //     $username = $_POST['username'];
            //     $table = "user";
            //     $result = $db->ResetPass($table, $username);
            //     $user_email = $result['username'];
            //     $user_pass = $result['password'];
            //     if ((!strcmp($username, $user_email))) {
            //         /*Mail Code*/
            //         $to = $user_email;
            //         $subject = "Password";
            //         $txt = "Your password is $user_pass .";
            //         $headers = "From: password@example.com" . "\r\n" .
            //             "CC: ifany@example.com";
            //         mail($to, $subject, $txt, $headers);
            //     }
            // }
            require_once('View/forgotPass/forgotPass.php');
            break;
        }
        // phân quyền
    case 'Decentralization': {
            if (isset($_GET["Dl"])) {
                $Decentralization = $_GET["Dl"];
                if ($Decentralization == 1) {
                    header("location:index.php?controller=dashboard");
                    exit;
                } else if ($Decentralization == 2) {
                    header("location:index.php?controller=dashboard");
                    exit;
                } else {
                    include_once "./user/index.php";
                    exit;
                }
            }
            require_once('View/login/login.php');
            break;
        }
    default: {
            $ss->init();
            if (isset($_POST["submit"])) {
                if (empty($_POST["username"]) || empty($_POST["password"])) {
                    $_SESSION["account_empty"] = "Yêu cầu nhập thông tin tài khoản";
                } else {
                    $username = $_POST["username"];
                    $password_input = $_POST["password"];
                    if (isset($_POST['inputRememberPassword'])) {
                        $expiration = time() + 60;
                        setcookie("username", $username, $expiration);
                        setcookie("password", $password_input, $expiration);
                    } else {
                        $expiration = time() - 60;
                        setcookie("username", "", $expiration);
                        setcookie("password", "", $expiration);
                    }
                    $table = "user";
                    $result = $db->getUserLogin($table, $username);
                    // foreach ($result as $value) {
                    //     $password = $value["password"];
                    //     $Decentralization = $value["Decentralization"];
                    // }
                    $arr = mysqli_fetch_assoc($result);
                    $dem = mysqli_num_rows($result);
                    if ($dem > 0) {
                        if (password_verify($password_input, $arr['password'])) {
                            // header("location:index.php?controller=Decentralization&Dl=" . $Decentralization);
                            header("location:index.php?controller=Decentralization&Dl=" . $arr['Decentralization'] . "&id=" . $arr['id']);
                            $_SESSION["user"] = $arr;
                            // $value["username"];
                        } else {
                            $_SESSION["wrong_password"] = "Sai mật khẩu or tài khoản";
                        }
                    } else {
                        $_SESSION["account_does_not_exist"] = "tài khoản không tồn tại";
                    }
                }
            }
            require_once('View/login/login.php');

            break;
        }
}
