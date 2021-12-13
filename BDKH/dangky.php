<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="img/logo2.png" rel="shortcut icon"/>
  <title>Đăng ký</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body id="dangky">
  <?php
  $page_title = 'Đăng ký!';
  include('check2.php');
  global $tenltk;
  if ($tenltk == 'User') {
    include('header_footer/header_us.php');
  } else if ($tenltk == 'Admin') {
    include('header_footer/header_ad.php');
  } else {
    include('header_footer/header.php');
  }

  $erors_user1 = "";
  $erors_user2 = "";
  $erors_pass1 = "";
  $erors_pass2 = "";
  $erors_address = "";
  $erors_fullname = "";
  $erors_phone = "";
  $erors_gender = "";

  $isValue = true;

  if (isset($_POST['submit'])) {
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtTentk'])) {
      die('');
    }

    //Nhúng file kết nối với database
    include('ketnoi.php');

    //Lấy dữ liệu từ file dangky.php
    $tentk   = addslashes($_POST['txtTentk']);
    $password   = addslashes($_POST['txtPassword']);
    $pass2   = addslashes($_POST['txtPassword2']);
    $address      = addslashes($_POST['txtAddress']);
    $fullname   = addslashes($_POST['txtFullname']);
    $phone   = addslashes($_POST['txtPhone']);
    $gender        = addslashes($_POST['txtGender']);
    $maltk       = 'User';
    $quyentk = true;

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$tentk) {
      $erors_user1 = ("<font color='red'>Vui lòng nhập tên tài khoản!</font>");
      $isValue = false;
    }

    if ($password) {
      if ($password != $pass2) {
        $erors_pass2 =  ("<font color='red'>Mật khẩu không khớp. Vui lòng nhập lại!</font>");
        $isValue = false;
      }
    } else {
      $erors_pass1 =  ("<font color='red'>Vui lòng nhập đầy đủ mật khẩu!</font>");
      $isValue = false;
    }

    if (!$address) {
      $erors_address = ("<font color='red'>Vui lòng nhập vào địa chỉ!</font>");
      $isValue = false;
    }

    if (!$fullname) {
      $erors_fullname = ("<font color='red'>Vui lòng nhập đầy đủ họ và tên!</font>");
      $isValue = false;
    }

    if (!$phone) {
      $erors_phone = ("<font color='red'>Vui lòng nhập số điện thoại!</font>");
      $isValue = false;
    }

    if (!$gender) {
      $erors_gender = ("<font color='red'>Vui lòng chọn giới tính!</font>");
      $isValue = false;
    }

    // Mã User
    // Câu lệnh lấy mã user cuối cùng
    $qid = "SELECT id from public.user ORDER BY id DESC LIMIT 1";
    $rid = @pg_query($conn, $qid); // Run the query.

    $rowid = pg_fetch_array($rid, NULL, PGSQL_ASSOC);
    $rowid = implode(' ', $rowid); // Chuyển mảng thành chuỗi
    $user_id = substr($rowid, -3); // Tách lấy số trong mã user

    $ma = 'US';
    $id = $user_id + 1; // Tăng mã lên 1 số
    $id = str_pad($id, 3, '0', STR_PAD_LEFT); // Giữ số 0 tới 3 chữ số

    $result_id = $ma . '' . $id; // Ghép nối mã với số đã tăng
    // End mã user

    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (pg_num_rows(pg_query($conn, "SELECT tentk FROM public.user WHERE tentk='$tentk'")) > 0) {
      $erors_user2 = ("<font color='red'>Tên tài khoản này đã có người dùng. Vui lòng chọn tên tài khoản khác!</font>");
      $isValue = false;
    }

    if ($isValue) {
      //Lưu thông tin thành viên vào bảng
      @$adduser = pg_query($conn, "
            INSERT INTO public.user (
                id,
                maltk,
                tentk,
                matkhau,
                hoten,
                diachi,
                sdt,
                quyentk,
                gioitinh
            )
            VALUES (
                '{$result_id}',
                '{$maltk}',
                '{$tentk}',
                '{$password}',
                '{$fullname}',
                '{$address}',
                '{$phone}',
                '{$quyentk}',
                '{$gender}'
            )
        ");

      //Thông báo quá trình lưu
      if ($adduser) {   
        $message = "Đăng ký thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<p class="error">Quá trình đăng ký thành công</p>';
  
      } else {
        $message = "Có lỗi xảy ra trong quá trình đăng ký";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<p class="error"><a href="dangky.php">Thử lại</a></p>';
      }
    }
  }

  ?>
 
  <div class="con" style="margin-bottom: 40px;">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card border-dark my-3">
          <div class="card-header bg-success">
            <h3 class="text-center text-white font-weight-bold my-1">ĐĂNG KÝ TÀI KHOẢN</h3>
          </div>
          <div class="card-body">
            <form action="dangky.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="medium mb-1" for="inputAddress"><b>Họ và tên: <font color="red">*</font></b></label>
                <input class="form-control py-3" name="txtFullname" type="text" aria-describedby="AddressHelp" placeholder="Nhập họ và tên..." value="<?php if (isset($_POST['txtFullname'])) echo $_POST['txtFullname']; ?>" />
                <?php echo $erors_fullname; ?>
              </div>


              <div class="form-group">
                <label class="medium mb-1" for="inputAddress"><b>Tên đăng nhập: <font color="red">*</font></b></label>
                <input class="form-control py-3" name="txtTentk" type="text" aria-describedby="AddressHelp" placeholder="Nhập tên tài khoản..." value="<?php if (isset($_POST['txtTentk'])) echo $_POST['txtTentk']; ?>" />
                <?php echo $erors_user1; ?>
                <?php echo $erors_user2; ?>
              </div>

              <div class="form-group">
                <label class="medium mb-1" for="inputAddress"><b>Địa chỉ: <font color="red">*</font></b></label>
                <input class="form-control py-3" name="txtAddress" type="Address" aria-describedby="AddressHelp" placeholder="Nhập địa chỉ..." value="<?php if (isset($_POST['txtAddress'])) echo $_POST['txtAddress']; ?>" />
                <?php echo $erors_address; ?>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="medium mb-1" for="inputPhoneNumber"><b>Số điện thoại: <font color="red">*</font></b></label>
                    <input class="form-control py-3" name="txtPhone" type="number" placeholder="" value="<?php if (isset($_POST['txtPhone'])) echo $_POST['txtPhone']; ?>" />
                    <?php echo $erors_phone; ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="medium mb-1" for="inputGender"><b>Giới tính: <font color="red">*</font></b></label>
                    </br>
                    <input class="py-4 mt-3" type="radio" name="txtGender" value="Nam" / checked="checked"> Nam
                    <input class="py-4" style="margin-left: 15px" type="radio" name="txtGender" value="Nữ" /> Nữ
                    <?php echo $erors_gender; ?>
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="medium mb-1" for="inputPassword"><b>Mật khẩu: <font color="red">*</font></b></label>
                    <input class="form-control py-3" name="txtPassword" type="password" placeholder="Nhập mật khẩu..." value="<?php if (isset($_POST['txtPassword'])) echo $_POST['txtPassword']; ?>" />
                    <?php echo $erors_pass1; ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="medium mb-1" for="inputConfirmPassword"><b>Xác nhận mật khẩu: <font color="red">*</font></b></label>
                    <input class="form-control py-3" name="txtPassword2" type="password" placeholder="Nhập lại mật khẩu..." value="<?php if (isset($_POST['txtPassword2'])) echo $_POST['txtPassword2']; ?>" />
                    <?php echo $erors_pass2; ?>
                  </div>
                </div>
              </div>
              
              <div class="form-group mt-4 mb-0">
                <input type="submit" name="submit" class="btn btn-success btn-block" value="Tạo tài khoản" />
              </div>
            </form>
          </div>
          <div class="card-footer text-center">
            <div class="medium "><a class="text-success" href="dangnhap.php">Bạn đã có tài khoản? Đăng nhập</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('header_footer/footer.html'); ?>

</body>
</html>