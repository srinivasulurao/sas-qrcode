<?php
$this->load->view('common/header_login');
?>

<div class="dashboard_box">
<?php
$links=getDashboardHeaderLinks();
$dashboardMenuImages=getMenuImages();
echo "<ul style='margin-top:50px;' class='dashboard_links'>";
foreach($links as $key=>$value):
    $link=site_url().$value;
    $img=site_url()."images/".$dashboardMenuImages[$key];
    echo"<li><a href='$link'><img src='$img'><br>{$key}</a></li>";
	//echo"<li><a href='$link'><br>{$key}</a></li>";
endforeach;
    echo "</ul>";
?>
</div>
<?php
$this->load->view('common/footer.php');
?>

<style>
    body{
        background: black;
    }
</style>