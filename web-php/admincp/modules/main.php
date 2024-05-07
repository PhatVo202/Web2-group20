<div class="col-10 ">
    <div class="m-4 bg-white p-4">
    <?php
if (isset($_GET['action']) && isset($_GET['query'])) {
    $tam = $_GET['action'];
    $query = $_GET['query'];
} else {
    $tam = '';
    $query = '';
}

if ($tam === 'quanlydanhmucsanpham' && $query == 'them') {
    include("modules/quanlydanhmucsp/them.php");
    include("modules/quanlydanhmucsp/lietke.php");
} else if ($tam === 'quanlydanhmucsanpham' && $query == 'sua') {
    include("modules/quanlydanhmucsp/sua.php");
} else if ($tam === 'quanlysp' && $query == 'them') {
    include("modules/quanlysp/them.php");
    include("modules/quanlysp/lietke.php");
} else if ($tam === 'quanlysp' && $query == 'sua') {
    include("modules/quanlysp/sua.php");
}else if ($tam === 'quanlydonhang' && $query == 'lietke') {
    include("modules/quanlydonhang/lietke.php");
}else if ($tam === 'donhang' && $query == 'xemdonhang') {
    include("modules/quanlydonhang/xemdonhang.php");
} else {
    include("modules/dashboard.php");
}
?>
    </div>
</div>
