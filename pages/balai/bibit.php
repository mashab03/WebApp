<?php 
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal - 1) * $per_hal;
	$reload="bibit.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(bibit.id) AS numrows,bibit.id, bibit.jenis, bibit.usia, bibit.jumlah
FROM bibit ");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from bibit order by jenis DESC");
$no=1;
?>
<!---Simpan--->
<?
if(isset($_POST['simpan'])){
$kode=$_POST['kode'];
$jenis=$_POST['jenis'];
$usia=$_POST['usia'];
$jumlah=$_POST['jumlah'];
if(empty($jenis)||empty($usia)||empty($jumlah)||empty($kode)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else{
$a="insert into bibit(id, kode, jenis, usia, jumlah) values ('', '$kode', '$jenis', '$usia', '$jumlah')";
$b=mysql_query($a);
if($b){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=balai&page=bibit'</script>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Bibit gagal disimpan');
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
	$ff=mysql_query("Delete from bibit Where id='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=balai&page=bibit'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=balai&page=bibit'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-tree fa-fw"></i> Bibit</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Tambah Bibit
                        </div>
                        <div class="panel-body">
<form action="" method="post">       
<div class="form-group">
    <label>Kode Bibit</label>
    <input class="form-control" name="kode" id="kode" value="" placeholder="Kode Bibit">
</div> 
<div class="form-group">
    <label>Jenis Bibit</label>
    <input class="form-control" name="jenis" id="jenis" value="" placeholder="Jenis Bibit">
</div> 
<div class="form-group">
    <label>Usia Bibit</label>
    <input class="form-control" name="usia" id="usia" value="" placeholder="Usia Bibit">
</div> 
<div class="form-group">
    <label>Jumlah</label>
    <input class="form-control" name="jumlah" id="jumlah" value="" placeholder="Jumlah Bibit">
</div> 
<button type="submit" class="btn btn-primary" name="simpan" id="simpan" >Simpan</button>    
          
</form>
                        </div>
                    </div>
            <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tree "></i> Kelola Data Bibit
                            <div class="pull-right">
                                <div class="btn-group">
                                <a href="laporan/cetakbibit.php" target="_blank">
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
                                                    <th>Kode Bibit</th>
                                                    <th>Jenis Bibit</th>
                                                    <th>Usia Bibit</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['kode']; ?></td>
                                                    <td><?php echo $result['jenis']; ?></td>
                                                    <td><?php echo $result['usia']; ?></td>
                                                    <td><?php echo $result['jumlah']; ?></td>
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=editbibit&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-check fa- "></i> </button></a>
                                                    <a href="?cat=<? echo "".$_SESSION['level']."";?>&page=bibit&del=1&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
                                                    
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