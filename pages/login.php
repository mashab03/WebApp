<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Pendataan Dan Pendistribusian Bibit">
    <meta name="author" content="Helpi Nopriandi">

    <title>Aplikasi Pendataan Dan Pendistribusian Bibit</title>
    <link rel="shortcut icon" href="../favicon.png" />		

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    <span>
                        <h3 class="panel-title">Please Sign In
                                                <div class="pull-right">
                                <div class="btn-group">
                                    <a href="../index.php"><button type="button" class="btn btn-success btn-block btn-xl" ><i class="fa fa-home"></i>
                            </button></a>
                                </div>
                            </div>
                        </h3>

                            </span>
                    </div>
                    <div class="panel-body">
<form action="loginproces.php" method="post" name="login" id="login">
                                <div class="form-group">
									<label>Username</label>
                                    <input class="form-control" placeholder="Username" name="username"  id="username" type="input" >
                                </div>
                                <div class="form-group">
									<label>Password</label>
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" >
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input name="login" title="login" type="submit" class="btn btn-lg btn-success btn-block" value="Login" >

</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
