<?php
    $sql_danhmuc = "SELECT * From tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                      
?>
<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang Chủ</a></li>
        <?php
         while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li> 
        <?php 
        }
        ?>      
        <li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
        <li><a href="index.php?quanly=tintuc">Tin Tức</a></li>
        <li><a href="index.php?quanly=lienhe">liên hệ</a></li>
        <li><a href="index.php?quanly=dangky">Đăng Ký</a></li>
    </ul>
</div>
