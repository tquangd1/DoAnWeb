<?php
include('config.php');
if(isset($_POST['dangky']))
{
    
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];

    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky (tenkhachhang, email, diachi, matkhau, dienthoai) VALUES ('".$tenkhachhang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')");

    if($sql_dangky)
    {
        echo '<p style="color:green">Đăng Ký Thành Công</p>';
        $_SESSION['dangky']= $tenkhachhang;
        header('Location:index.php?quanly=giohang');
    }
}
?>
<p>Đăng Ký Tài Khoản Thành Viên</p>
<style type="text/css">
    table.dangky tr td {
        padding: 5px;
    }
</style>
<form action="" method="POST">
    <table class="dangky" border="1" width="50%" style="border-collapse:collapse;">
        <tr>
            <td>Họ Và Tên</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Điện Thoại</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Địa Chỉ</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td>Mật Khẩu</td>
            <td><input type="text" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangky" value="Đăng Ký"></td>
            <td><a href="index.php?quanly=dangnhap">Đăng Nhập Nếu Đã Có Tài Khoản</a></td>
        </tr>
    </table>
</form>
