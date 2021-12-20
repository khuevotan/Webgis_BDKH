<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BẢN ĐỒ DỰ ĐOÁN BIẾN ĐỔI KHÍ HẬU VỀ NHIỆT ĐỘ VÀ LƯỢNG MƯA Ở VIỆT NAM </title>
    <link href="img/logo2.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="template/jQuery.js" type="text/javascript"></script>
    <script src="template/ol.js" type="text/javascript"></script>
    <script src="js/js2.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>

  <body>  
  <?php 
    $page_title = 'WEBGIS BẢN ĐỒ DỰ ĐOÁN BIẾN ĐỔI KHÍ HẬU VỀ NHIỆT ĐỘ VÀ LƯỢNG MƯA Ở VIỆT NAM';
    include('check2.php');
    global $tenltk;
    if ($tenltk == 'User') {
        include('header_footer/header_us.php');
    } else if ($tenltk == 'Admin') {
        include('header_footer/header_ad.php');
    } else {
        include('header_footer/header.php');
    }
    ?>
      
  <div style="float:left; width:15%; height:620px; " class="bg-light">
        <div style="float:right; margin-right: 30px;">
            <h5 style="text-align: center; margin-top: 10px;">Hiển thị</h5>
            <input style="margin-right: 10px; margin-top: 10px;" type="checkbox" id="chkQUOCLO" checked/><label for="chkQUOCLO">Đường Quốc Lộ 1</label><br>
            <input style="margin-right: 10px;" type="checkbox" id="chkSong" checked /><label for="chkSong">Sông</label><br>
            <input style="margin-right: 10px;" type="checkbox" id="chkTHUDO" checked /><label for="chkTHUDO">Thủ Đô</label><br>
            <h6 style="text-align: center; margin-top: 10px;">Nhiệt Độ</h6>
            <input style="margin-right: 10px;" type="radio" id="chkNHIETDO1" name="chkNHETDOLUONGMUA" ><label>2016-2035 </label><br>
            <input style="margin-right: 10px;" type="radio" id="chkNHIETDO2" name="chkNHETDOLUONGMUA" ><label>2046-2065 </label><br>
            <input style="margin-right: 10px;" type="radio" id="chkNHIETDO3" name="chkNHETDOLUONGMUA" ><label>2080-2099 </label><br>
            <h6 style="text-align: center; margin-top: 10px;">Lượng Mưa</h6>
            <input style="margin-right: 10px;" type="radio"  id="LUONGMUA1" name="chkNHETDOLUONGMUA" ><label >2016-2035</label><br>
            <input style="margin-right: 10px;" type="radio"  id="LUONGMUA2" name="chkNHETDOLUONGMUA" ><label >2016-2035</label><br>
            <input style="margin-right: 10px;" type="radio"  id="LUONGMUA3" name="chkNHETDOLUONGMUA" ><label >2016-2035</label><br>
            <input style="margin-right: 10px;" type="radio" id="TATNTLM" name="chkNHETDOLUONGMUA" ><label>Tắt</label><br>  
            <h6 style="text-align: center; margin-top: 10px;">Tải Bản Đồ</h6>
          </div>
            <form class="form" style="vertical-align: middle; width: 150px;  margin-left: 15px;">
                <td >
                    <select id="mySelect" class="form-control" onclick ="getvalue()">
                        <option value="1">Nhiệt Độ</option>
                        <option value="2">Lượng Mưa</option>
                    </select>
                    <p id="demo1"></p>
                </td>
                <td>
    
                </td>
                <td >     
                    <select id="mySelect2" class="form-control" onclick ="getvalue2()">
                        <option value="3">2016-2035</option>
                        <option value="4">2046-2065</option>
                        <option value="5">2080-2099</option>
                    </select>
                    <p id="demo2"></p>
                </td>
                <td> 
                    <input class="btn btn-success" style="margin-left:40px ;" type="submit" value="Tải" onclick="taianh()">                       
                </td>
            </form>
    </div>
    
    <!-- Kết quả tìm kiếm -->
     <div class="scrollbar" id="style-1">
                <div class="force-overflow" id="divkq">
                        <!-- Kết Quả Tìm Kiếm-->
                </div>
      </div>

    <!-- Bản đồ -->
    <div style="float:left; width: 60%;" id="map" class="map"></div>

    <!-- Chú Giải-->
    <div style="float:left; width: 25%; height:620px; background: #e8e8e8 ">
    <!-- Tìm kiếm thông tin Từng Tỉnh-->
      <div class="find">
            <div class="col-md-12 ChuThich">
            <h5 style="text-align: center; margin-top: 12px;">Tìm kiếm thông tin tỉnh thành</h5>
            </div>
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="form-group">
                        <input class="form-control " id="txtKhuVuc" name="txtKhuVuc" type="text" />
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                                <button  type="button" name="submit" onclick="timkiem();" class="btn btn-success btn-block">Tìm kiếm</button>
                        </div>
                        <div class="col-md-6">
                                <button  type="reset" name="submit" class="btn btn-success btn-block">Xoá</button>
                        </div>
                    </div>
                </form>
            </div>
         
        </div>
        <!-- End Form tìm kiếm nhà trọ cơ bản -->
    <div id="info"></div>
      <h5 style="text-align: center; margin-top: 12px;">Chú Giải</h5>
      
       <!-- Nhiệt độ và Lượng mưa-->
      <table style="float: left; margin-left: 20px;">
        <th><h6>Nhiệt độ: </h6></th>
          <tr>
            <th>
              <img 
                src="img/nhietdo.png " width="90px" height="104px" />
            </th>
          </tr>
        <th><h6>Lượng mưa: </h6></th>
      <tr>
        <th>
          <img 
            src="img/luongmua.png" width="90px" height="104px" />
        </th>
      </tr>
      </table>
     
        <table style="float: right; margin-right:20px;">
          <!--Quốc Gia-->
          <tr>
            <th><img 
              src="http://localhost:8080/geoserver/bdkh/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=GIS:quocgia" />
            </th>
            <th><h6>: Quốc Gia</h6></th>
          </tr>


          <!--Quần Đảo-->
          <tr>
              <th><img 
                src="http://localhost:8080/geoserver/bdkh/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=GIS:dao" />
              </th>
              <th><h6>: Đảo</h6></th>
          </tr>

          <!--Đường Quốc Lộ 1-->
          <tr>
              <th><img 
                src="http://localhost:8080/geoserver/bdkh/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=GIS:quoclo" />
              </th>
              <th><h6>: Đường Quốc Lộ 1</h6></th>
          </tr>

          <!--Sông-->
          <tr>
              <th><img 
                src="http://localhost:8080/geoserver/bdkh/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=GIS:song" />
              </th>
              <th><h6>: Sông</h6></th>
          </tr>

           <!--Thủ Đô-->
           <tr>
            <th><img 
              src="http://localhost:8080/geoserver/bdkh/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=GIS:thudo" />
            </th>
            <th><h6>: Thủ Đô</h6></th>
           </tr>

            <!--UBND Tỉnh-->
            <tr>
              <th><img 
                src="http://localhost:8080/geoserver/bdkh/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=GIS:ubnd_tinh" />
              </th>
              <th><h6>: UBND Tỉnh</h6></th>
             </tr>
        </table>
    </div>
    
    
    
    <!-- Footer -->
    <?php
        include('header_footer/footer.html');
    ?>
  </body>
</html>
