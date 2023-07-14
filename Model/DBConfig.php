<?php
class Database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'ql_users';

    private $conn = null;
    private $result = null;
    public function connect()
    {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->pass, $this->dbname);
        if (!$this->conn) {
            echo 'kết nối thất bại';
            die();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }

    // function thực thi truy vấn
    public function execute($sql)
    {
        $this->result = mysqli_query($this->conn, $sql);
        return $this->result;
    }
    // functon đếm số phần tử
    public function num_rows()
    {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }
    // functon đếm users
    public function getUserLogin($table, $username)
    {
        $sql = "SELECT * FROM $table WHERE username ='$username'";
        $results =  $this->execute($sql);
        return $results;
    }
    // function getdata
    public function getData()
    {
        if ($this->result) {
            $data  = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // function thêm dữ liệu
    public function InsertData($name, $username, $password, $avatar, $Decentralization)
    {
        $sql = "INSERT INTO user(name,username,password,avatar,Decentralization) VALUES('$name','$username','$password','$avatar','$Decentralization')";
        return $this->execute($sql);
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    // function Xoa dữ liệu
    public function DeleteData($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = '$id'";
        return $this->execute($sql);
    }
    // function sua dữ liệu
    public function UpdateData($name, $username, $password, $avatar, $Decentralization, $id)
    {
        $sql = "UPDATE user SET name ='$name',username='$username' ,password='$password',avatar='$avatar',Decentralization='$Decentralization' WHERE id = '$id'";
        return $this->execute($sql);
    }
    // function getAllData
    public function getAllData($table, $page)
    {
        $sql = "SELECT * FROM  $table LIMIT $page,5";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    // function getAllData
    public function getAllDataUser($table, $id)
    {
        $sql = "SELECT * FROM  $table WHERE id = '$id'";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    // function getdata
    public function getDataID($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = '$id'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data  = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // function tìm kiếm
    public function SearchData($table, $key)
    {
        $sql = "SELECT * FROM $table WHERE name REGEXP '$key' ORDER BY id DESC";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    // function gage
    public function page()
    {
        $sql = "SELECT * FROM  user";
        $sql_trang = $this->execute($sql);
        $row_count = mysqli_num_rows($sql_trang);
        return $row_count;
    }
    // function reset pass
    public function ResetPass($table, $username)
    {
        $sql = "SELECT username,password FROM $table WHERE username ='$username'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data  = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
}
