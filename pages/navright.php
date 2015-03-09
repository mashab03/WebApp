            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <span style="color:#0080FF"><strong>Selamat Datang : <? echo $_SESSION['nama']; ?></strong></span>
  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-user fa-fw"></i>  </a>
                    
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-gear fa-fw"></i>Pengaturan</h4>
                                        </div>
                                        <div class="modal-body">
<form action="dashboard.php?edit=1" method="post" enctype="multipart/form-data" name="form1">
<?
	$sql="Select * from user where username='".$_SESSION['username']."' ";
	$rs=mysql_query($sql);
	$rw=mysql_fetch_array($rs);

?>
<div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" id="nama" value="<? echo $rw['nama']; ?>">
                            </div> 
                            <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" name="nip" id="nip" value="<? echo $rw['nip']; ?>">
                            </div>
                            <div class="form-group">
                                            <label>Username</label>
                                            <input disabled="disabled" class="form-control" value="<? echo $rw['username']; ?>">
                            </div>
                            <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" id="password" value="<? echo $rw['password']; ?>">
                            </div>

<?
if(isset($_GET['edit']))
{
	$save=mysql_query("update user set nama='".$_POST['nama']."', nip='".$_POST['nip']."', password='".$_POST['password']."' where username='".$_SESSION['username']."'");
	
	if($save)
	{
		echo "<script>alert('Data Behasil disimpan.'),window.location='dashboard.php'</script>";
	}else{
		echo "<script>alert('Data Gagal disimpan.'),window.location='dashboard.php'</script>";
	}
}
?>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="save" id="save" >Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                        
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                
                 <li class="dropdown">
                    <a class="dropdown-toggle" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> </a>
                    </li>
                
            </ul>