<?php 
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 30; //berapa banyak blok
	$adjacents  = 30;
	$offset = ($hal - 1) * $per_hal;
	$reload="penerima.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(penerima.id) AS numrows,penerima.id, penerima.nama, penerima.nik, penerima.jk, penerima.id_wilayah, wilayah.id FROM penerima LEFT JOIN wilayah ON penerima.id_wilayah = wilayah.id"); 
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from penerima, wilayah,bibit where penerima.id_wilayah=wilayah.id and penerima.kode=bibit.kode order by kecamatan ASC");
$no=1;
?>
<!---Simpan--->
<?
if(isset($_POST['simpan'])){
$nama=$_POST['nama'];
$nik=$_POST['nik'];
$jk=$_POST['jk'];
$id_wilayah=$_POST['id_wilayah'];
$kode=$_POST['kode'];
if(empty($nama)||empty($nik)||empty($jk)||empty($id_wilayah)||empty($kode)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else{
$a="insert into penerima(id, nama, nik, jk, id_wilayah, kode) values ('', '$nama', '$nik', '$jk', '$id_wilayah', '$kode')";
$b=mysql_query($a);
if($b){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=dinas&page=penerima'</script>";
}else{
	echo "<script>alert('NIK sudah terdaftar! Silahkan perikas kembali.');</script>";
}
}
}
?>
<!---Hapus--->
<?
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from penerima Where nik='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=dinas&page=penerima'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=dinas&page=penerima'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-group  fa-fw"></i> Penerima Bibit</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Tambah Penerima Bibit
                        </div>
                        <div class="panel-body">
<form action="" method="post"> 
<div class="form-group">
	<label>NIK</label>
  <input class="form-control" name="nik" id="nik" value="" placeholder="Nomor Induk KTP">
</div>       
<div class="form-group">
<label>Nama </label>
  <input class="form-control" name="nama" id="nama" value="" placeholder="Nama">
</div> 
<div class="form-group">
    <label>Jenis Kelamin </label>
    <select class="form-control" name="jk" placeholder="Jenis Kelamin">
      <option value="Pria">Pria</option>
      <option value="Wanita">Wanita</option>
    </select>
</div> 
<div class="form-group">
    <label>Desa </label>
    <select class="form-control" name="id_wilayah" placeholder="id_wilayah">
      <?
	  $sql=mysql_query("select * from wilayah order by desa ASC");
	  while($desa = mysql_fetch_array($sql)){
	  ?>
      <option value="<? echo $desa['id']; ?>"><? echo $desa['desa']; ?></option>
      <? } ?>
    </select>
</div> 
<div class="form-group">
    <label>Jenis Bibit </label>
    <select class="form-control" name="kode">
      <?
	  $sql=mysql_query("select * from bibit order by kode ASC");
	  while($bibit = mysql_fetch_array($sql)){
	  ?>
      <option value="<? echo $bibit['kode']; ?>"><? echo $bibit['jenis']; ?> - <? echo $bibit['usia']; ?></option>
      <? } ?>
    </select>
</div>
<button type="submit" class="btn btn-primary" name="simpan" id="simpan" >Simpan</button>    
          
</form>
                        </div>
                    </div>
            <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-group "></i> Kelola Data Penerima 
                            <div class="pull-right">
                                <div class="btn-group">
                                <a href="laporan/cetakpenerima.php" target="_blank">
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
                                        <table class="table table-bordered table-hover table-striped" width="75%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Desa</th>
                                                    <th>Kecamatan</th>
                                                    <th>Jenis Bibit</th>
                                                    <th>Usia Bibit</th>
                                                    <th>Aksi</th>
                                                    <th>Proses</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['nik']; ?></td>
                                                    <td><?php echo $result['nama']; ?></td>
                                                    <td><?php echo $result['jk']; ?></td>
                                                    <td><?php echo $result['desa']; ?></td>
                                                    <td><?php echo $result['kecamatan']; ?></td>
                                                    <td><?php echo $result['jenis']; ?></td>
                                                    <td><?php echo $result['usia']; ?></td>
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=editpenerima&id=<?php echo $result['nik']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-check fa- "></i> </button></a>
                                                    <a href="?cat=<? echo "".$_SESSION['level']."";?>&page=penerima&del=1&id=<?php echo $result['nik']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
                                                    </td>
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=distribusi&id=<?php echo $result['nik']; ?>"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-tree fa- "></i> Bibit</button></a>
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