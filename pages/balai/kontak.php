      <!---Hapus--->
<?
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from pesan Where id='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=dinas&page=home'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=dinas&page=bibit'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-book fa-fw"></i> Kontak</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-book fa-fw"></i> Daftar Pesan</div>
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
	$per_hal = 30; //berapa banyak blok
	$adjacents  = 30;
	$offset = ($hal - 1) * $per_hal;
	$reload="pesan.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(pesan.id) AS numrows,pesan.id, pesan.nama, pesan.email, pesan.judul
FROM pesan ");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from pesan LIMIT $offset,$per_hal");
$no=1;
?>
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Judul</th>
                                                    <th>Pesan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
while($result = mysql_fetch_array($query)){
?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['nama']; ?></td>
                                                    <td><?php echo $result['email']; ?></td>
                                                    <td><?php echo $result['judul']; ?></td>
                                                    <td><?php echo $result['pesan']; ?></td>
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=kontak&del=1&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
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