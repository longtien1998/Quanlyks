
<?php 
    function userkhachhang($sql){
        $conn = connect_db();
        $query = "SELECT * FROM user WHERE tenKhachHang='$sql' ";

        // Thực thi truy vấn
        $result = mysqli_query($conn, $query);
        return $result;
    }
?>