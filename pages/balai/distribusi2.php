<script src="jquery-ui.js"></script>
<?php 
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
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
                        
            <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap "></i> Kelola Data Distribusi Bibit
                            <div class="pull-right">
                                <div class="btn-group">
                                <a href="laporan/cetakdistribusi.php" target="_blank">
								<button type="button" class="btn btn-success btn-xs"><i class="fa fa-print "></i> Cetak</button>
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
                                                  <th rowspan="2" align="center" valign="middle">No.</th>
                                                  <th colspan="5" align="center" style="text-align: center">Penerima</th>
                                                  <th colspan="2" style="text-align: center">Bibit</th>
                                                  <th colspan="2" style="text-align: center">Distribusi</th>
                                                  <th rowspan="2" align="center" valign="middle">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: center">NIK</th>
                                                    <th>Nama</th>
                                                    <th>JK</th>
                                                    <th>Desa</th>
                                                    <th>Kecamatan</th>
                                                    <th>Jenis</th>
                                                    <th>Usia</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <?php
$query = mysql_query("SELECT * from distribusi, penerima, bibit, wilayah where distribusi.nama=penerima.nama and distribusi.nik=penerima.nik and distribusi.kode=bibit.kode and penerima.id_wilayah=wilayah.id order by tanggal ASC");
$no=1;
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
                                                    <td><?php echo $result['jumlah_dist']; ?></td>
                                                    <td><?php echo $result['tanggal']; ?></td>
                                                    <td style="text-align: center">
                                                    <a href="?cat=<? echo "".$_SESSION['level']."";?>&page=distribusi2&del=1&id=<?php echo $result['id_dist']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
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