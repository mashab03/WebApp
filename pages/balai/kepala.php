<?php 
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("bibit");
	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from kepala");
$no=1;
?>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-user-md fa-fw"></i> Kepala Balai Pembibitan Terpadu</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                        <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user-md "></i> Kepala Balai Pembibitan Terpadu
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $result['nama']; ?></td>
                                                    <td><?php echo $result['nip']; ?></td>
                                                    <td>
													<a class="dropdown-toggle" data-toggle="modal" data-target="#myModal2"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-repeat fa-fw "></i> Edit</button></a>
                                                    </td>
                                                </tr>
                                              </tbody>
                                              <?php $no++; }?>
                                        </table>
                                        
                                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-md fa-fw"></i>Edit Kepala Balai</h4>
                                        </div>
                                        <div class="modal-body">
<form action="balai/kepala.php?edit=1" method="post" enctype="multipart/form-data" name="form1">
<?
	$sql="Select * from kepala";
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

<?
$edit = mysql_query("SELECT * from kepala ");
$res = mysql_fetch_array($edit);
if(isset($_GET['edit'])){
	$nama=$_POST['nama'];
	$nip=$_POST['nip'];
	$rs = mysql_query("update kepala set nama='$nama', nip='$nip'");
	if($rs){
		echo "<script>alert('Data berhasil diubah!');window.location='/bibit/pages/dashboard.php?cat=balai&page=kepala'</script>";
	}else{
		echo "<script>alert('Data gagal diubah!');</script>";
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

                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
            
		</div>