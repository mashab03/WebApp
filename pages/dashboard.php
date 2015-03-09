<?php
session_start();
if(!isset($_SESSION['level']))
{
	echo "<script>window.location='../index.php'</script>";
}
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Pendataan Dan Pendistribusian Bibit</title>
    <link rel="shortcut icon" href="../favicon.png" />	
    <link href="../css/kendo.default.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script src="../dist/js/jquery-ui.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">


    <a class="navbar-brand" href="dashboard.php"><Span><img src="../images/logo.PNG" width="18" height="22"> Aplikasi Pendataan Dan Pendistribusian Bibit</Span></a>
  </div>
            <!-- /.navbar-header -->

		<? include "navright.php"; ?>
            <!-- /.navbar-top-links -->
		<? include "menu.php"; ?>
            <!-- /.navbar-static-side -->
        </nav>
		<?
				$v_cat = (isset($_REQUEST['cat'])&& $_REQUEST['cat'] !=NULL)?$_REQUEST['cat']:'';
				$v_page = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
				if(file_exists("./".$v_cat."/".$v_page.".php"))
				{
					include("./".$v_cat."/".$v_page.".php");
				}else{
					include("homepage.php");
				}
		?>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/kendo.web.min.js"></script>


</body>

</html>
