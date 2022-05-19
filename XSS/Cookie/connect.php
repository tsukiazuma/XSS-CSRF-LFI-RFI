<?php
// Thêm, sửa, xóa
function execute($sql)
{
    // Kết nối database
    $conn = mysqli_connect('localhost', 'root', '', 'training');
    mysqli_set_charset($conn, 'utf8');
    // Truy vấn
    $resultset = mysqli_query($conn, $sql);
    // Đóng kết nối
    mysqli_close($conn);
    return $resultset;
}
