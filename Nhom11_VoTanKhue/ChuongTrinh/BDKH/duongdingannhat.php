<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logo2.png" rel="shortcut icon"/>
    <title>Tìm đường</title>

    <style>
.map, .righ-panel {
height: 500px;
width: 40%;
float: left;
}
.map {
border: 1px solid #000;
}
</style>
<script type="text/javascript">


 // Tìm đường đi
 var startPoint = new ol.Feature();
    var destPoint = new ol.Feature();

    var vectorLayer_RoadFind = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [startPoint, destPoint]
        })
    });

    map.addLayer(vectorLayer_RoadFind);

    function roadfind(evt) {
        if (startPoint.getGeometry() == null) {
            // First click.
            startPoint.setGeometry(new ol.geom.Point(evt.coordinate));
            $("#txtPoint1").val(evt.coordinate);
        } else if (destPoint.getGeometry() == null) {
            // Second click.
            destPoint.setGeometry(new ol.geom.Point(evt.coordinate));
            $("#txtPoint2").val(evt.coordinate);
        }
    }

    $("#btnSolve").click(function () {
        var startCoord = startPoint.getGeometry().getCoordinates();
        var destCoord = destPoint.getGeometry().getCoordinates();
        var params = {
            LAYERS: 'NhaTroNT:route',
            FORMAT: 'image/png'
        };
        var viewparams = [
            'x1:' + startCoord[0], 'y1:' + startCoord[1],
            'x2:' + destCoord[0], 'y2:' + destCoord[1]
        ];
        params.viewparams = viewparams.join(';');
        result_RoadFind = new ol.layer.Image({
            source: new ol.source.ImageWMS({
                url: 'http://localhost:8080/geoserver/bdkh/wms',
                params: params
            })
        });

        map.addLayer(result_RoadFind);
    });

    $("#btnReset").click(function () {
        $("#txtPoint1").val(null);
        $("#txtPoint2").val(null);
        startPoint.setGeometry(null);
        destPoint.setGeometry(null);
        // Remove the result layer.
        map.removeLayer(result_RoadFind);
    });

    $("#chkRoadFind").on('click', function () {
        var isChecked = $(this).is(':checked');
        if (isChecked) {
            map.on('singleclick', roadfind);
        }
        else {
            // history.go(0);
            map.un('singleclick', roadfind);
        }
    });
    // End Tìm đường đi


</script>


</head>

<body id="duongdi">
    <?php 
        $page_title = 'Liên hệ';
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

    
<div id="map" class="map"></div>
<div class="righ-panel">
<input type="text" id="txtPoint1" />
<br />
<input type="text" id="txtPoint2" />
<br />
<button id="btnSolve">Tìm đường</button>
<button id="btnReset">Xóa đường</button>
</div>





    <?php include('header_footer/footer.html'); ?>
</body>

</html>