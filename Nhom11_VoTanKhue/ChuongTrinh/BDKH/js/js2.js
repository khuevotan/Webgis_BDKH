// Tìm kiếm thông tin biến đổi từng tỉnh
function timkiem() {
    var txtKhuVuc = document.getElementById("txtKhuVuc").value;
  
    if (window.XMLHttpRequest) {
        // Code for IE7+, Firefox, Chrome, Opera, Safari 
        xmlhttp = new XMLHttpRequest();
    }
    else {
        // Code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("divkq").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "xltimkiem.php?khuvuc=" + txtKhuVuc,true);
    xmlhttp.send();
  }
  // End Tìm kiếm thông tin biến đổi từng tỉnh
  
  
  $("#document").ready(function() {
      var format = "image/png";
      var bounds = [102.14498901367188, 8.56333065032959, 109.46942901611328, 23.392732620239258];
      var BIENDOI = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            LAYERS: "bdkh:biendoi"
          }
        })
      });
  
      var QUOCGIA = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:quocgia",
            LAYERS: "bdkh:quocgia"
          }
        })
      });
  
      var DAO = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "",
            LAYERS: "bdkh:dao"
          }
        })
      });
  
      var QUOCLO = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "",
            LAYERS: "bdkh:quoclo"
          }
        })
      });
  
      var SONG = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "",
            LAYERS: "bdkh:song"
          }
        })
      });
  
      var THUDO = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "",
            LAYERS: "bdkh:thudo"
          }
        })
      });
  
      var UBNDTINH = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "",
            LAYERS: "bdkh:ubnd_tinh"
          }
        })
      });
  
      var LUONGMUA = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:luongmua1",
            LAYERS: "bdkh:biendoi"
          }
        })
      });
  
      var LUONGMUA2 = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:luongmua2", 
            LAYERS: "bdkh:biendoi"
          }
        })
      });
  
      var LUONGMUA3 = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:luongmua3",
            LAYERS: "bdkh:biendoi"
          }
        })
      });
      
      var NHIETDO = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:nhietdo1",
            LAYERS: "bdkh:biendoi"
          }
        })
      });
  
      var NHIETDO2 = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:nhietdo2",
            LAYERS: "bdkh:biendoi"
          }
        })
      });
  
  
      var NHIETDO3 = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          ratio: 1,
          url: "http://localhost:8080/geoserver/bdkh/wms",
          params: {
            FORMAT: format,
            VERSION: "1.1.0",
            STYLES: "bdkh:nhietdo3",
            LAYERS: "bdkh:biendoi"
          }
        })
      });
  
      var projection = new ol.proj.Projection({
        code: "EPSG:4326",
        units: "m",
        axisOrientation: "neu"
      });
  
      var map = new ol.Map({
        target: "map",
        layers: [QUOCGIA, BIENDOI, LUONGMUA, LUONGMUA2, LUONGMUA3, NHIETDO ,NHIETDO2, NHIETDO3, DAO, QUOCLO, SONG, THUDO, UBNDTINH],
        view: new ol.View({ projection: projection })
      });
      map.getView().fit(bounds, map.getSize());
      NHIETDO.setVisible(false);
      NHIETDO2.setVisible(false);
      NHIETDO3.setVisible(false);
      LUONGMUA.setVisible(false);
      LUONGMUA2.setVisible(false);
      LUONGMUA3.setVisible(false);
      
  
      $("#chkQUOCGIA").change(function() {
        if ($("#chkQUOCGIA").is(":checked")) {
          QUOCGIA.setVisible(true);
        } else {
          QUOCGIA.setVisible(false);
        }
      });
  
      $("#chkDAO").change(function() {
        if ($("#chkDAO").is(":checked")) {
          DAO.setVisible(true);
        } else {
          DAO.setVisible(false);
        }
      });
  
      $("#chkQUOCLO").change(function() {
        if ($("#chkQUOCLO").is(":checked")) {
          QUOCLO.setVisible(true);
        } else {
          QUOCLO.setVisible(false);
        }
      });
  
      $("#chkSong").change(function() {
        if ($("#chkSong").is(":checked")) {
          SONG.setVisible(true);
        } else {
          SONG.setVisible(false);
        }
      });
  
      $("#chkTHUDO").change(function() {
        if ($("#chkTHUDO").is(":checked")) {
          THUDO.setVisible(true);
        } else {
          THUDO.setVisible(false);
        }
      });
  
      $("#chkUBNDTINH").change(function() {
        if ($("#chkUBNDTINH").is(":checked")) {
          UBNDTINH.setVisible(true);
        } else {
          UBNDTINH.setVisible(false);
        }
      });
  
      $("#chkNHIETDO1").change(function() {
        if ($("#chkNHIETDO1").is(":checked")) {
          NHIETDO.setVisible(true);
          NHIETDO2.setVisible(false);
          NHIETDO3.setVisible(false);
          LUONGMUA.setVisible(false);
          LUONGMUA2.setVisible(false);
          LUONGMUA3.setVisible(false);
        }
      });
  
      $("#chkNHIETDO2").change(function() {
        if ($("#chkNHIETDO2").is(":checked")) {
          NHIETDO.setVisible(false);
          NHIETDO2.setVisible(true);
          NHIETDO3.setVisible(false);
          LUONGMUA.setVisible(false);
          LUONGMUA2.setVisible(false);
          LUONGMUA3.setVisible(false);
        }
      });
  
      $("#chkNHIETDO3").change(function() {
        if ($("#chkNHIETDO3").is(":checked")) {
          NHIETDO.setVisible(false);
          NHIETDO2.setVisible(false);
          NHIETDO3.setVisible(true);
          LUONGMUA.setVisible(false);
          LUONGMUA2.setVisible(false);
          LUONGMUA3.setVisible(false);
        }
      });
  
      $("#LUONGMUA1").change(function() {
        if ($("#LUONGMUA1").is(":checked")) {
          LUONGMUA.setVisible(true);
          LUONGMUA2.setVisible(false);
          LUONGMUA3.setVisible(false);
          NHIETDO.setVisible(false);
          NHIETDO2.setVisible(false);
          NHIETDO3.setVisible(false);
        }
      });
  
      $("#LUONGMUA2").change(function() {
        if ($("#LUONGMUA2").is(":checked")) {
          LUONGMUA.setVisible(false);
          LUONGMUA2.setVisible(true);
          LUONGMUA3.setVisible(false);
          NHIETDO.setVisible(false);
          NHIETDO2.setVisible(false);
          NHIETDO3.setVisible(false);
        }
      });
  
      $("#LUONGMUA3").change(function() {
        if ($("#LUONGMUA3").is(":checked")) {
          LUONGMUA.setVisible(false);
          LUONGMUA2.setVisible(false);
          LUONGMUA3.setVisible(true);
          NHIETDO.setVisible(false);
          NHIETDO2.setVisible(false);
          NHIETDO3.setVisible(false);
        }
      });
  
      $("#TATNTLM").change(function() {
        if ($("#TATNTLM").is(":checked")) {
          LUONGMUA.setVisible(false);
          LUONGMUA2.setVisible(false);
          LUONGMUA3.setVisible(false);
          NHIETDO.setVisible(false);
          NHIETDO2.setVisible(false);
          NHIETDO3.setVisible(false);
        }
      });
  
    //Overview map
    var OSM = new ol.layer.Tile({
      source: new ol.source.OSM(),
      type: 'base',
      title: 'OSM',
    });
  
    var view_ov = new ol.View({
      projection: 'EPSG:4326',
      center: [78.0, 23.0],
      zoom: 5,
    });
  
    var overview = new ol.control.OverviewMap({
      view: view_ov,
      collapseLabel: 'O',
      label: 'O',
      layers: [OSM]
    });
  
    map.addControl(overview);
    //End Overview map
  
  //Xem thông tin thuộc tính các lớp
  map.on('singleclick', function(evt) {
    document.getElementById('info').innerHTML = "Loading... please wait...";
    var view = map.getView();
    var viewResolution = view.getResolution();
    var source = BIENDOI.getSource();
    var url = source.getGetFeatureInfoUrl(
    evt.coordinate, viewResolution, view.getProjection(),
    {'INFO_FORMAT': 'text/html', 'FEATURE_COUNT': 50});
    if (url) {
    document.getElementById('info').innerHTML = '<iframe seamless src="' + url + '"></iframe>';
  }
    });
  });   
  
  
  //----------------------------------------------------------------------------------------------------------------------
  //Start tải bản đồ
  function taianh(){
    var x1 = document.getElementById("mySelect").value;
    var x2 = document.getElementById("mySelect2").value;  
    if(x1=="1" && x2=="3"){
        var a = document.createElement('a');
        a.href = "img/NhietDo_2016_2035.jpg";
        a.download = "NhietDo_2016_2035.jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
   
    if(x1=="1" && x2=="4"){
        var a = document.createElement('a');
        a.href = "img/NhietDo_2046_2065.jpg";
        a.download = "NhietDo_2046_2065.jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
  
    if(x1=="1" && x2=="5"){
        var a = document.createElement('a');
        a.href = "img/NhietDo_2080_2099.jpg";
        a.download = "NhietDo_2080_2099.jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
  
    if(x1=="2" && x2=="3"){
        var a = document.createElement('a');
        a.href = "img/LuongMua_2016_2035.jpg";
        a.download = "LuongMua_2016_2035.jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
  
    if(x1=="2" && x2=="4"){
        var a = document.createElement('a');
        a.href = "img/LuongMua_2046_2065.jpg";
        a.download = "LuongMua_2046_2065.jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
  
    if(x1=="2" && x2=="5"){
        var a = document.createElement('a');
        a.href = "img/LuongMua_2080_2099.jpg";
        a.download = "LuongMua_2080_2099.jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
  }
  //End tải bản đồ