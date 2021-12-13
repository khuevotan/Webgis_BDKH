<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="template/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="template/ol.css" type="text/css" />
	<link href="img/logo2.png" rel="shortcut icon"/>
</head>

<body>
	<div id="main">
		<div class="wrapHeaderMain">
        <h5>  
		<img src="img/flag_vn.png" style="float:left" width="195px" height="130px"/>
      <nav class="navbar navbar-expand-lg navbar-light  bg-success" style="height: 130px; margin-top:0px">
        <a class="navbar-brand text-white " style = "padding: 15px;" href="#"> 
		<h4>BẢN ĐỒ DỰ ĐOÁN BIẾN ĐỔI KHÍ HẬU VỀ NHIỆT ĐỘ VÀ LƯỢNG MƯA Ở VIỆT NAM </h4></a>
        <div class="navbar-collapse  " style="height: 0px; margin-top:0px " >  
          <ul class="navbar-nav bg-warning " >
            <li class="nav-item  ">
              <a class="nav-link  " href="index.php">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gioithieu.php">GIỚI THIỆU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="dangky.php">ĐĂNG KÝ</a>
            </li>
			<li class="nav-item">
              <a class="nav-link " href="duongdingannhat.php">TÌM ĐƯỜNG ĐI</a>
            </li>
            <li class="nav-item">
              <a ha class="nav-link " href="infouser.php">THÔNG TIN CÁ NHÂN</a>
            </li>
			<li class="nav-item">
			  <div id="thongtin"> 
				<div class="collapse navbar-collapse justify-content-end text-right" id="collapsibleNavbar_2" data-parent="#parent">
					<ul class="navbar-nav">
						<?php
						if (isset($_SESSION['tentk']) && $_SESSION['tentk']) {
							$timeLimit = 8000;
							$start = $_SESSION['time'];
							
							if (time() - $start > $timeLimit) {
								session_destroy();
								echo '<script language="javascript">';
								echo 'alert("Phiên làm việc của bạn đã hết hạn!")';
								echo '</script>';
								echo '<script>
						window.location.replace("dangnhap.php");
						</script>';
							}	
							echo '						
					<span class="mr-0 d-none d-lg-inline text-dark font-italic span" style="font-size: 13pt">';
							echo $tentk, ' (' . $tenltk . ')
							<a href="dangxuat.php">Đăng Xuất</a>';
							echo '
					</span>
					</a>';
						} else {
							echo "
					<li class='nav-item'>
						<a class='nav-link' href='dangnhap.php'>
							<span class='fas fa-sign-in-alt mr-1'></span>
							Bạn chưa đăng nhập 
						</a>
					</li>";
						}
						?>
					</ul>
				</div>
			  </div>
            </li>
          
          </ul>
          </div>
     </nav>
    </h5>
		</div>
	</div>
<div id="content">

