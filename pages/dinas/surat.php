       <!---Simpan--->
<?
if(isset($_POST['simpan'])){
$nomor=$_POST['nomor'];
$tanggal=$_POST['tanggal'];
$perihal=$_POST['perihal'];
$file=$_FILES['lampiran']['name'];
if(strlen($file)>0){
	if(is_uploaded_file($_FILES['lampiran']['tmp_name'])){
	move_uploaded_file($_FILES['lampiran']['tmp_name'],"dinas/file/".$file);
	}
}
if(empty($nomor)||empty($tanggal)||empty($perihal)||empty($file)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else{
$a="insert into surat(id, nomor, tanggal, perihal, file) values ('', '$nomor', '$tanggal', '$perihal', '$file')";
$b=mysql_query($a);
if($b){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=dinas&page=home'</script>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data surat gagal disimpan');
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
	$ff=mysql_query("Delete from surat Where id='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=dinas&page=home'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=dinas&page=surat'</script>";
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
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Tambah Surat
              </div>
                        <div class="panel-body">
<form action="" method="post" enctype="multipart/form-data">       
<div class="form-group">
    <label>Nomor Surat</label>
    <input class="form-control" name="nomor" id="nomor" value="" placeholder="Nomor Surat">
</div> 
<div class="form-group">
    <label>Tanggal Surat</label>
    <input class="form-control" name="tanggal" id="tanggal" value="" placeholder="Tanggal Surat Contoh : 02/02/2015">
</div> 
<div class="form-group">
    <label>Perihal</label>
    <input class="form-control" name="perihal" id="perihal" value="" placeholder="Perihal">
</div> 
<div class="form-group">
    <label>Lampiran</label>
    <input type="file" name="lampiran" id="lampiran" />
</div> 
<button type="submit" class="btn btn-primary" name="simpan" id="simpan" >Simpan</button>    
          
</form>
                        </div>
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
                                                    <th>Aksi</th>
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
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=surat&del=1&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
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