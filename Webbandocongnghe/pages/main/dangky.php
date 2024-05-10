<?php
include('config.php');
if(isset($_POST['dangky']))
{

    $tenkhachang = $_POST['tenkhachang'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);

    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky (tenkhachang, email, diachi, matkhau, dienthoai) VALUES ('".$tenkhachang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')");

    if($sql_dangky)
    {
        echo '<p style="color:green">Đăng Ký Thành Công</p>';
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
        </tr>
    </table>
</form>
