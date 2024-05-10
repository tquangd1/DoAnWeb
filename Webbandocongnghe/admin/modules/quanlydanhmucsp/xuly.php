<?php
include('../../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Themdanhmuc'])) {
        $tenloaisp = $_POST['tendanhmuc'];
        $thutu = $_POST['thutu'];

        // Kiểm tra tính hợp lệ của dữ liệu đầu vào
        $tenloaisp = mysqli_real_escape_string($mysqli, $tenloaisp);
        $thutu = mysqli_real_escape_string($mysqli, $thutu);

        // Thực hiện câu truy vấn INSERT để thêm danh mục sản phẩm
        $sql_them = "INSERT INTO tbl_danhmuc (tendanhmuc, thutu) VALUES ('$tenloaisp', '$thutu')";
        $result = mysqli_query($mysqli, $sql_them);

        if ($result) {
            // Thêm thành công
            header('location: ../../index.php?action=quanlydanhmucsanpham&query=them');
            exit();
        } else {
            // Xử lý lỗi
            echo "Có lỗi xảy ra khi thêm danh mục sản phẩm.";
        }
    } elseif (isset($_POST['suadanhmuc'])) {
        if (isset($_GET['id_danhmuc'])) {
            $id_danhmuc = $_GET['id_danhmuc'];
            $tendanhmuc = $_POST['tendanhmuc'];
            $thutu = $_POST['thutu'];

            // Cập nhật thông tin danh mục sản phẩm trong cơ sở dữ liệu
            $sql_sua_danhmuc = "UPDATE tbl_danhmuc SET tendanhmuc = '$tendanhmuc', thutu = '$thutu' WHERE id_danhmuc = '$id_danhmuc'";
            $query_sua_danhmuc = mysqli_query($mysqli, $sql_sua_danhmuc);

            if ($query_sua_danhmuc) {
                // Sửa danh mục thành công, chuyển hướng về trang liệt kê danh mục
                header('Location: lietke.php');
                exit();
            } else {
                // Xử lý lỗi nếu cần
                echo "Lỗi: " . mysqli_error($mysqli);
            }
        } else {
            // Thiếu thông tin id_danhmuc
            echo "Thiếu thông tin id_danhmuc.";
        }
    }
    else
    {
            $id = $_GET['iddanhmuc'];
            $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
            mysqli_query($mysqli, $sql_xoa);
            header('location: ../../index.php?action=quanlydanhmucsanpham&query=them');

    }
}
?>