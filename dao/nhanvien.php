<?php
require_once 'pdo.php';
function nhanvien_insert($maNhanVien, $tenNhanVien, $congViec, $ngaylamViec, $caLamViec, $Id_KhachSan)
{
    $sql = "INSERT INTO nhanvien(maNhanVien,tenNhanVien,congViec ,ngaylamViec,caLamViec,Id_KhachSan,vai_tro) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql, $maNhanVien, $tenNhanVien, $congViec, $ngaylamViec, $caLamViec, $Id_KhachSan == 1);
}
function nhanvien_update($maNhanVien, $tenNhanVien, $congViec, $ngaylamViec, $caLamViec, $Id_KhachSan)
{
    $sql = "UPDATE nhanvien SET tenNhanVien=?,congVie=?,ngaylamViec=?,caLamViec=?,Id_KhachSan=?,vai_tro=? WHERE maNhanVien=?";
    pdo_execute($sql, $tenNhanVien, $congViec, $ngaylamViec, $caLamViec, $Id_KhachSan == 1, $maNhanVien);
}
function nhanvien_delete($maNhanVien)
{
    $sql = "DELETE FROM nhanvien WHERE maNhanVien=?";
    if (is_array($maNhanVien)) {
        foreach ($maNhanVien as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $maNhanVien);
    }
}
function nhanvien_select_all()//truy vấn và trả về all kh từ csdl
{
    $sql = "SELECT * FROM nhanvien";
    return pdo_query($sql);
}
function nhanvien_select_by_id($maNhanVien) //truy vấn và trả về thông tin của 1 kh dựa trên maNhanVien
{
    $sql = "SELECT * FROM nhanvien WHERE maNhanVien=?";
    return pdo_query_one($sql, $maNhanVien);
}
function nhanvien_exist($maNhanVien)//kt kh có tồn tại trong csdl hay k
{
    $sql = "SELECT count(*) FROM nhanvien WHERE maNhanVien=?";
    return pdo_query_value($sql, $maNhanVien) > 0;
}

function nhanvien_exist_ngaylamViec($ngaylamViec)//kt ngaylamViec kh có tồn tại trong csdl hay k
{
    $sql = "SELECT count(*) FROM nhanvien WHERE ngaylamViec=?";
    return pdo_query_value($sql, $ngaylamViec) > 0;
}

function nhanvien_change_password($maNhanVien, $tenNhanVien_moi)//kt mk có trong csdl hay ch
{

    $sql = "UPDATE nhanvien SET tenNhanVien=? WHERE maNhanVien=?";
    pdo_execute($sql, $tenNhanVien_moi, $maNhanVien);
}