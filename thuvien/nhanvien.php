<?php
 include '../config/connect.php' ?>
<?php 
    function usernhanvien($sql){
        $conn = connect_db();
        $query = "SELECT * FROM user_admin WHERE username='$sql' ";

        // Thực thi truy vấn
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result);
    }
?>