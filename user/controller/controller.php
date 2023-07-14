<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    case 'list': {
        }
    default: {
            $ss->init();
            $table = "user";
            if (isset($_GET['id'])) {
                $id = $_GET["id"];
                $table = "user";
                $data = $db->getDataID($table, $id);
                if (empty($data)) {
                    $dataList = array();
                } else {
                    $dataList = $data;
                }
            }
            require_once('./user/View/Home/Home.php');
            break;
        }
}
