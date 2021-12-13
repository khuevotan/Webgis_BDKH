<?php
if ((isset($_GET['khuvuc'])) && (is_string($_GET['khuvuc']))) { // Form submission.
    $kv = $_GET['khuvuc'];
    $khuvuc = $kv;
} else { // Không có ID hợp lệ, hủy tập lệnh.
    echo '<p class="error">Trang này lỗi không lấy được id!.</p>';
    include('header_footer/footer.html');
    exit();
}

//Nhúng file kết nối với database
include('ketnoi.php');

//Lấy dữ liệu từ file index.php
if ($khuvuc) {
    $sql = "SELECT name_1, varname_1,f2016_2035,f2046_2065, f2080_2099, n2016_2035, n2046_2065, n2080_2099
            FROM public.biendoi
            WHERE name_1 ILIKE '%$khuvuc%' ";
    $query = pg_query($conn, $sql);
    $i = 1;
    $rows = pg_num_rows($query);
    if ($rows > 0) {
        echo '
        <table class="table-bordered tbfind">
        <tr>
            <th rowspan="2">Tên Tỉnh Thành</th>
            <th colspan="3">Lượng Mưa</th>
            <th colspan="3">Nhiệt Độ</th>
        </tr>
        <tr>
            <th>Đầu TK21</th>
            <th>Giữa TK21</th>
            <th>Cuối TK21</th>
            <th>Đầu TK21</th>
            <th>Giữa TK21</th>
            <th>Cuối TK21</th>
        </tr>';      
        $bg = '#eeeeee';
        while ($row2 = pg_fetch_array($query, NULL, PGSQL_ASSOC)) {
            $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
            echo '<tr bgcolor="' . $bg . '">
                <td>' . $row2['name_1'] . '</td>
                <td>' . $row2['f2016_2035']. '</td>
                <td>' . $row2['f2046_2065'] . '</td>
                <td>' . $row2['f2080_2099'] . '</td>
                <td>' . $row2['n2016_2035'] . '</td>
                <td>' . $row2['n2046_2065'] . '</td>
                <td>' . $row2['n2080_2099'] . '</td>
                 </tr>';
            $i++;
        }
    } else {
        echo "<p style = 'margin-left: 30px; font-size: 13pt; padding:20px 20px 0;'><b>Không tìm thấy kết quả nào!</b></p>";
    }
}
?>

