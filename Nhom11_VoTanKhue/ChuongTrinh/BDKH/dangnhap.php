<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="img/logo2.png" rel="shortcut icon"/>
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body id="dangnhap">
  <?php
  $page_title = 'Đăng nhập';
  include('xldangnhap.php');
  include('header_footer/header.php');
  ?>
  <?php echo $erors_disable; ?>
    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-bottom: 40px;" >
        <div class="card o-hidden border-dark shadow-lg my-3">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">

                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h4 text-dark mb-4 ">ĐĂNG NHẬP</h1>
                  </div>
                  <form class="user" action="dangnhap.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="txtUsername" aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập..." value="<?php if (isset($_POST['txtUsername'])) echo $_POST['txtUsername']; ?>" />
                      <?php echo $erors_user1; ?>
                      <?php echo $erors_user2; ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="txtPassword" placeholder="Mật khẩu..." value="<?php if (isset($_POST['txtPassword'])) echo $_POST['txtPassword']; ?>" />
                      <?php echo $erors_pass1; ?>
                      <?php echo $erors_pass2; ?>
                    </div>
                    <div class="form-group">
                    
                    </div>
                    <input type="submit" name="dangnhap" class="btn btn-success btn-user btn-block" style="font-size: 12pt;" value="Đăng nhập" />
                  </form>
                 
                  <a href="dangky.php" class="btn btn-google btn-user text-success btn-block">
                    <i class="fab fa-google fa-fw text-success"></i> Chưa có tài khoản hãy Đăng ký!
                  </a>
                </div>
              </div>
            </div>      
          </div> 
        </div>
      </div>
      <div style=" height:21px; "> </div>
  <?php include('header_footer/footer.html') ?>
</body>
</html>