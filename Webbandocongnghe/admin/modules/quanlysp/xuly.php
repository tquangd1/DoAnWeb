<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh = basename($hinhanh);
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];


if (isset($_POST['themsanpham'])) {
    // Thêm sản phẩm
    $sql_them = "INSERT INTO tbl_sanpham (tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) 
                 VALUES ('$tensanpham', '$masp', '$giasp', '$soluong', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang','$danhmuc')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('location: ../../index.php?action=quanlysp&query=them');
} elseif (isset($_POST['suasanpham'])) {
    // Sửa sản phẩm
    if($hinhanh!=''){

        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

        $id= $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' limit 1";
        $query=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($query))
        {
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', 
            hinhanh='$hinhanh', tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang',id_danhmuc=$danhmuc WHERE id_sanpham='$_GET[idsanpham]'";

        $id= $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' limit 1";
        $query=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($query))
        {
            unlink('uploads/'.$row['hinhanh']);
        }
    }else{
    $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', 
                tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang',id_danhmuc=$danhmuc WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('location: ../../index.php?action=quanlysp&query=them');
}
 else 
{
    // Xóa sản phẩm
    $id= $_GET['idsanpham'];
    $sql = "select * FROM tbl_sanpham WHERE id_sanpham='$id' limit 1";
    $query=mysqli_query($mysqli,$sql);
    while($row=mysqli_fetch_array($query))
    {
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "delete from tbl_sanpham where id_sanpham='".$id."'";
    mysqli_query($mysqli, $sql_xoa);

    header('location: ../../index.php?action=quanlysp&query=them');
}
?>
