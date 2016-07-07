<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta charset="utf-8">
    <title>Bank - Aapka Apna Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php echo URL; ?>public/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/style.css" />
<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/angular.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/mycustom.js"></script>
<?php
  if (isset($this->css)) {
    foreach ($this->css as $css) {
      echo "<link rel='stylesheet' href=".URL.__VIEWS__.$css." />\n";
    }
  }
  if (isset($this->js)) {
    foreach ($this->js as $js) {
      echo "<script src=".URL.__VIEWS__.$js." ></script>\n";
    }
  }
 ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<?php \Libs\Session::init(); ?>
<div class="container" id="page-container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <?php include 'navigation.php'; ?>
<!--            <?php //include 'slider.php'; ?> -->
<div class="container" id="main-content">
    <?php if(hasMessage()):?>
        <div class="alert alert-success text-center alert-dismissable">
            <i class="close" data-dismiss="alert">x</i>
            <h4><?php echo hasMessage(); \Libs\Session::remove('message'); ?></h4>
    </div>
    <?php endif; ?>
    <?php if(hasErrors()):?>
        <div class="alert alert-danger text-center alert-dismissable">
        <i class="close" data-dismiss="alert">x</i>
        <h4><?php foreach($_SESSION['errors'] as $key=> $error): ?>
            <i><strong><?=ucwords(str_replace('_',' ',$key))."</strong>, ".$error ?></i><br/>
            <?php endforeach; ?>
        <?php \Libs\Session::remove('errors'); ?></h4>
    </div>
    <?php endif; ?>
