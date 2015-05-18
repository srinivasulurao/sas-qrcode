<html>
<head>
    <meta name="viewport" content="width=device-width">
    <?php $root=site_url(); ?>

    <!--Core Bootsrap JS starts Here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo $root."assets/js/bootstrap.js"; ?>"></script>
    <script src="<?php echo $root."assets/js/npm.js"; ?>"></script>
    <script src="<?php echo $root."assets/js/texas-tech.js"; ?>"></script>
    <script src="<?php echo $root."assets/dateTimePicker/jquery.datetimepicker.js"; ?>"></script>

    <!-- Core Bootstrap Css Starts Here- -->
    <link href="<?php echo $root."assets/css/bootstrap.css"; ?>" rel="stylesheet">
    <link href="<?php echo $root."assets/css/bootstrap-theme.css"; ?>" rel="stylesheet">
    <link href="<?php echo $root."assets/css/sasqrcode.css"; ?>" rel="stylesheet">
    <link href="<?php echo $root."assets/dateTimePicker/jquery.datetimepicker.css"; ?>" rel="stylesheet">

    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <div style="width:100%;margin:auto;text-align: center">
        <div style='display:inline-block;width:35%'>
        <a href='<?php echo site_url()."admin"; ?>'>
        <img src='<?php echo $root."images/logo.png"; ?>' style="height:120px;width:280px;margin-left:215px">
        </a>
        </div>


        <div class="hii-login">Logged in : <?php echo userLoginName($this->session->userdata); ?>
        <a href="<?php echo site_url().'admin/logout'; ?>" class="logout">Logout</a>
        </div>
    </div>

    <ul class="menu-links">
    <?php
    $current_id=($this->uri->segment(2,0))?$this->uri->segment(2,0):"index";
    $dashBoardLinks=getDashboardHeaderLinks();
    foreach($dashBoardLinks as $text=>$link):
    $class=str_replace("admin/","",$link);
    $link=site_url().$link;
    $active=($current_id==$class)?" active":"";
    echo "<li class='$class{$active}'><a href='$link'>$text</a></li>";
    endforeach;
    ?>
    </ul>

</header>

<div class="container">
    <?php
    $tick=($messageType=='success')?"&#x2714;":"&#x2718";
    $tickBack=($messageType=='success')?"lightgreen":"tomato";
    $tick="<font class='tick' style='background: $tickBack'>$tick</font>";
    if($message):
        ?>
        <div id='notification-message' class="bg-<?php echo $messageType; ?>"><?php echo $tick.$message; ?></div>
    <?php
    endif;
    $this->session->unset_userdata('message');
    $this->session->unset_userdata('messageType');
    ?>
