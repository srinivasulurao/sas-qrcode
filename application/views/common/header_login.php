<html>
<head>
    <?php $root=site_url(); ?>

    <!--Core Bootsrap JS starts Here -->
    <script src="<?php echo $root."assets/css/bootstrap.js"; ?>"></script>
    <script src="<?php echo $root."assets/css/npm.js"; ?>"></script>
    <script src="<?php echo $root."assets/css/texas-tech.js"; ?>"></script>


    <!-- Core Bootstrap Css Starts Here- -->
    <link href="<?php echo $root."assets/css/bootstrap.css"; ?>" rel="stylesheet">
    <link href="<?php echo $root."assets/css/bootstrap-theme.css"; ?>" rel="stylesheet">
    <link href="<?php echo $root."assets/css/sasqrcode.css"; ?>" rel="stylesheet">

    <title><?php echo $title; ?></title>
</head>
<body>
<header style="background: transparent">
    <div style="width:100%;margin:auto;text-align: center">
    <img src='<?php echo $root."images/logo.png"; ?>'>
    </div>
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
    ?>
