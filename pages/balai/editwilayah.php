<?php 
$id=$_GET['id'];
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal - 1) * $per_hal;
	$reload="wilayah.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(wilayah.id) AS numrows, wilayah.id, wilayah.desa, wilayah.kecamatan FROM wilayah ");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from wilayah order by kecamatan DESC");
$no=1;
?>
<!---Simpan--->
<?
if(isset($_POST['simpan'])){
$desa=$_POST['desa'];
$kecamatan=$_POST['kecamatan'];
if(empty($desa)||empty($kecamatan)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else{
$a="insert into wilayah(id, desa, kecamatan) values ('', '$desa', '$kecamatan')";
$b=mysql_query($a);
if($b){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=balai&page=wilayah'</script>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data wilayah gagal disimpan');
	}
	</script>";
}
}
}
?>
<!---Hapus--->
<?
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from wilayah Where id='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=balai&page=wilayah'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=balai&page=wilayah'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success">Wilayah Distribusi Bibit</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Tambah Wilayah Distribusi Bibit
                        </div>
                        <div class="panel-body">
<?
$edit = mysql_query("SELECT * from wilayah where id='".$id."'");
$res = mysql_fetch_array($edit);
if(isset($_GET['edit'])){
	$desa=$_POST['desa'];
	$kecamatan=$_POST['kecamatan'];
	$rs = mysql_query("update wilayah set desa='$desa', kecamatan='$kecamatan' where id='".$id."'");
	if($rs){
		echo "<script>alert('Data berhasil diubah!');window.location='?cat=balai&page=wilayah'</script>";
	}else{
		echo "<script>alert('Data gagal diubah!');window.location='?cat=balai&page=wilayah'</script>";
	}
}
?>
<form action="?cat=balai&page=editwilayah&edit=1&id=<? echo $id;?>" method="post">       
<div class="form-group">
    <label>Desa</label>
    <input class="form-control" name="desa" id="desa" value="<? echo $res['desa'];?>" placeholder="Nama Desa">
</div> 
<div class="form-group">
    <label>Kecamatan</label>
    <input class="form-control" name="kecamatan" id="kecamatan" value="<? echo $res['kecamatan'];?>" placeholder="Nama Kecamatan">
</div> 
 
<button type="submit" class="btn btn-warning" name="edit" id="edit" >Update</button>           
</form>
                        </div>
                    </div>
            <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-globe "></i> Kelola Data Wilayah Distribusi Bibit
                            <div class="pull-right">
                                <div class="btn-group">
                                <a href="laporan/cetakwilayah.php" target="_blank">
								<button type="button" class="btn btn-success btn-xs"><i class="fa fa-print "></i> Laporan</button>
                                </a>
                                </div>
                            </div>
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Desa</th>
                                                    <th>Kecamatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['desa']; ?></td>
                                                    <td><?php echo $result['kecamatan']; ?></td>  
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=editwilayah&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-check fa- "></i> </button></a>
                                                    <a href="?cat=<? echo "".$_SESSION['level']."";?>&page=wilayah&del=1&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
                                                    
                                                    </td>
                                                </tr>
                                              </tbody>
                                              <?php $no++; }?>
                                        </table>
                                        
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