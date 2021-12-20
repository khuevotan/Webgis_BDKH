<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/logo2.png" rel="shortcut icon"/>
	<title>Quản Lý User</title>
</head>

<body id="qluser">
	<?php 
	$page_title = 'Xem thông tin';
	include('check.php');
	global $tenltk;
    if ($tenltk == 'User') {
        include('header_footer/header_us.php');
    } else if ($tenltk == 'Admin') {
        include('header_footer/header_ad.php');
    } else {
        include('header_footer/header.php');
    }
	echo '<h5 style="color: green">Thông tin từng người dùng đã đăng ký</h5>';

	include('ketnoi.php');
	$tentk = $_SESSION['tentk'];

    $result = pg_query($conn, "select * from public.user");
    while($row = pg_fetch_object($result))
    {
        echo
		'<style>
    table {
        font-size: 13pt;
    }
</style>
<form action="qluser.php" method="post" style="width: 400px; margin: 0 auto">
	<table class="table table-success" align="center" style="width: 400px; margin-top: 10px;">
		<tr class="bg-success">
			<th style="text-align: center; font-size: 15pt; color: white">
			THÔNG TIN CHI TIẾT</th>
		</tr>
	    <tr>
	        <td>
	            <table style="margin: 5px" cellpadding="2" cellspacing="10">
	                <tr>
	                    <td><b>Mã loại TK:</b></td>
	                    <td>' .$row->maltk. '</td>
	                </tr>
	                <tr>
	                    <td><b>Tên tài khoản:</b> </td>
	                    <td>' .$row->tentk. '</td>
	                </tr>
	                <tr>
	                    <td><b>Họ Tên:</b> </td>
	                    <td>' .$row->hoten. '</td>
	                </tr>

	                <tr>
	                    <td><b>Số điện thoại:</b></td>
	                    <td>' .$row->sdt. '</td>
	                </tr>

					<tr>
	                    <td><b>Địa chỉ:</b></td>
	                    <td>' .$row->diachi. '</td>
	                </tr>

	                <tr>
	                    <td><b>Giới tính:</b></td>
	                    <td>' .$row->gioitinh. '</td>
	                </tr>
	            </table>
	            <div style="margin-left: 10px; font-size: 13pt; margin-bottom: 5px">
	                <a class="text-danger" href="xoauser.php?id=' . $row->tentk . '">Xóa tài khoản</a>
					</br>
					<a class="text-danger" href="#' . $row->tentk . '">Sửa thông tin tài khoản</a>
					</br>
					<a class="text-danger" href="#' . $row->tentk . '">Đổi mật khẩu</a>
	            </div>
	        </td> 
	    </tr>
	</table>
</form>';
    }
    pg_close($conn);

	include('header_footer/footer.html'); ?>
</body>
</html>