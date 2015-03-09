<script src="jquery-ui.js"></script>
<?php 
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
	$nik=$_GET['id'];
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 30; //berapa banyak blok
	$adjacents  = 30;
	$offset = ($hal - 1) * $per_hal;
	$reload="distribusi.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(distribusi.id_dist) AS numrows,distribusi.id_dist, distribusi.nama, distribusi.nik, distribusi.kode, distribusi.jumlah_dist, distribusi.tanggal, penerima.nik FROM distribusi LEFT JOIN penerima ON distribusi.nik = penerima.nik "); 
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$dis = mysql_query("SELECT * from penerima, bibit, wilayah where penerima.kode=bibit.kode and penerima.id_wilayah=wilayah.id and penerima.nik='$nik'");
	$dist = mysql_fetch_array($dis);
?>
<!---Simpan--->
<?
if(isset($_POST['simpan'])){
$nama=$_POST['nama'];
$nik=$_POST['nik'];
$kode=$_POST['kode'];
$jumlah=$_POST['jumlah'];
$tanggal=$_POST['tanggal'];
	//cek stok bibit
	$jml=mysql_query("select * from bibit where kode='$kode'");
	$jmlb=mysql_fetch_array($jml);
	$jmlb2=$jmlb['jumlah']-$jumlah;
	//cek nama dan nik
	$nm=mysql_query("select * from distribusi where nik='$nik'");
	$nma=mysql_fetch_array($nm);
	$nm1=$nma['nama'];
	$nm2=$nma['nik'];
if(empty($nama)||empty($nik)||empty($kode)||empty($jumlah)||empty($tanggal)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else if ($jmlb2 <=0){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Jumlah Stok Bibit Tidak Cukup');
	}
	</script>";
}else if($nm2==$nik){
	echo "<script>alert('Nama Atau NIK Sudah menerima bibit!!!');window.location='?cat=balai&page=distribusi2'</script>";
}else{
$a="insert into distribusi(id_dist, nama, nik, kode, jumlah_dist, tanggal) values ('', '$nama', '$nik', '$kode', '$jumlah', '$tanggal')";
$c="update bibit set jumlah='$jmlb2' where kode='$kode'";
$b=mysql_query($a);
$d=mysql_query($c);
if($b and $c){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=balai&page=distribusi2'</script>";
}else{
	echo "<script>alert('Data gagal disimpan!');</script>";
}
}
}
?>
<!---Hapus--->
<?
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from distribusi Where id_dist='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=balai&page=distribusi2'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=balai&page=distribusi2'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-sitemap fa-fw"></i> Distribusi Bibit</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Tambah Data Distribusi Bibit
                        </div>
                        <div class="panel-body">
<script> 
$(document).ready(function() {
                $("#datepicker").datepicker();      
    });
</script>
<form action="" method="post"> 
<div class="form-group">
	<label>NIK</label>
  <input class="form-control" value="<? echo $dist['nik']; ?>" disabled="disabled">
  <input type="hidden" class="form-control" name="nik" id="nik" value="<? echo $dist['nik']; ?>" >
</div>       
<div class="form-group">
<label>Nama </label>
  <input class="form-control" value="<? echo $dist['nama']; ?>" disabled="disabled">
  <input type="hidden" class="form-control" name="nama" id="nama" value="<? echo $dist['nama']; ?>">
</div> 
<div class="form-group">
    <label>Jenis Bibit </label>
    <input class="form-control"value="<? echo $dist['jenis']; ?> - <? echo $dist['usia']; ?>" disabled="disabled">
    <input  type="hidden" class="form-control" name="kode" id="kode" value="<? echo $dist['kode']; ?>">
</div> 
<div class="form-group">
<label>Jumlah </label>
  <input class="form-control" name="jumlah" id="jumlah" value="" placeholder="Jumlah Bibit">
</div> 
<div class="form-group">
<label>Tanggal </label>
  <input class="form-control" name="tanggal" id="datepicker" placeholder="Masukkan Tanggal Distribusi. Contoh : 01/01/2015" type="text">
</div> 
<button type="submit" class="btn btn-primary" name="simpan" id="simpan" >Simpan</button>    
          
</form>
                        </div>
                    </div>
                        
		</div>