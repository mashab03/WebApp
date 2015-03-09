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
                    <div class="alert alert-success"><i class="fa fa-envelope fa-fw"></i> Surat Dinas</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                      
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-envelope fa-fw"></i> Surat Dinas</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
<?php 
	/* Koneksi database*/
	include 'paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal - 1) * $per_hal;
	$reload="surat.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(surat.id) AS numrows,surat.id, surat.nomor, surat.tanggal, surat.perihal
FROM surat ");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from surat order by tanggal DESC LIMIT $offset,$per_hal");
$no=1;
?>
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nomor Surat</th>
                                                    <th>Tanggal</th>
                                                    <th>Perihal</th>
                                                    <th>Lampiran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
while($result = mysql_fetch_array($query)){
?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['nomor']; ?></td>
                                                    <td><?php echo $result['tanggal']; ?></td>
                                                    <td><?php echo $result['perihal']; ?></td>
                                                    <td>
													<a href="dinas/file/<?php echo $result['file']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-download fa-fw "></i>Download</button></a>
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