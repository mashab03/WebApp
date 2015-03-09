<?php 
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 30; //berapa banyak blok
	$adjacents  = 30;
	$offset = ($hal - 1) * $per_hal;
	$reload="keuangan.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(keuangan.id_keuangan) AS numrows,keuangan.id_keuangan, keuangan.tanggal_keuangan, keuangan.jenis, keuangan.harga, keuangan.satuan, keuangan.jumlah FROM keuangan "); 
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from keuangan order by tanggal_keuangan ASC");
$no=1;
?>
<!---Simpan--->
<?
if(isset($_POST['simpan'])){
$tanggal=$_POST['tanggal'];
$jenis=$_POST['jenis'];
$harga=$_POST['harga'];
$satuan=$_POST['satuan'];
$jumlah=$_POST['jumlah'];
$total=$harga*$jumlah;
if(empty($tanggal)||empty($jenis)||empty($harga)||empty($satuan)||empty($jumlah)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else{
$a="insert into keuangan(id_keuangan, tanggal_keuangan, jenis, harga, satuan, jumlah, total) values ('', '$tanggal', '$jenis', '$harga', '$satuan', '$jumlah', '$total')";
$b=mysql_query($a);
if($b){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=balai&page=keuangan'</script>";
}else{
	echo "<script>alert('Data gagal disimpan!' mysql_error());</script>";
}
}
}
?>
<!---Hapus--->
<?
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from keuangan Where id='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=balai&page=keuangan'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=balai&page=keuangan'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-money  fa-fw"></i> Keuangan</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Tambah Data Keuangan
                        </div>
                        <div class="panel-body">
<form action="" method="post"> 
<div class="form-group">
	<label>Tanggal</label>
  <input class="form-control" name="tanggal" id="tanggal" value="" placeholder="Contoh : 02/02/2015">
</div>       
<div class="form-group">
<label>Jenis Biaya </label>
  <input class="form-control" name="jenis" id="jenis" value="" placeholder="Jenis Biaya">
</div> 
<div class="form-group">
    <label>Harga Satuan </label>
<input class="form-control" name="harga" id="harga" value="" placeholder="Harga Satuan">
</div> 
<div class="form-group">
    <label>Satuan </label>
<input class="form-control" name="satuan" id="satuan" value="" placeholder="Satuan">
</div> 
<div class="form-group">
    <label>Jumlah </label>
<input class="form-control" name="jumlah" id="jumlah" value="" placeholder="Jumlah">
</div>
<button type="submit" class="btn btn-primary" name="simpan" id="simpan" >Simpan</button>    
          
</form>
                        </div>
                    </div>
            <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-group "></i> Kelola Data keuangan 
                            <div class="pull-right">
                                <div class="btn-group">
                                <a href="laporan/cetakkeuangan.php" target="_blank">
								<button type="button" class="btn btn-success btn-xs"><i class="fa fa-print "></i> Laporan</button>
                                </a>
                                </div>
                            </div>
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="width:100%">
                                        <table class="table table-bordered table-hover table-striped" width="80%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jenis Biaya</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Satuan</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['tanggal_keuangan']; ?></td>
                                                    <td><?php echo $result['jenis']; ?></td>
                                                    <td><?php echo $result['harga']; ?></td>
                                                    <td><?php echo $result['satuan']; ?></td>
                                                    <td><?php echo $result['jumlah']; ?></td>
                                                    <td><?php echo $result['total']; ?></td>
                                                    <td>
                                                    <a href="?cat=<? echo "".$_SESSION['level']."";?>&page=keuangan&del=1&id=<?php echo $result['id_keuangan']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
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