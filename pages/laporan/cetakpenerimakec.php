<?php 
	/* Koneksi database*/
	include '../koneksi.php';

	//jalankan query menampilkan data per blok $offset dan $per_hal
	$kec=$_POST['kecamatan'];
	$query = mysql_query("SELECT * from penerima, wilayah,bibit where penerima.id_wilayah=wilayah.id and penerima.kode=bibit.kode and wilayah.kecamatan='$kec' order by kecamatan ASC");
	$no=1;
?>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="12%" rowspan="4" align="right"><img src="../../images/logo.PNG" width="80" height="100" /></td>
    <td width="84%" style="text-align: center">
    <div style="font-size: 20px">PEMERINTAH KABUPATEN KUANTAN SINGINGI</div></td>
    <td width="4%" rowspan="4" style="text-align: center">&nbsp;</td>
  </tr>
  <tr>
    <td style="text-align: center; font-size: 30px; font-weight: bold;"><div>DINAS PERKEBUNAN</div></td>
  </tr>
  <tr>
    <td style="text-align: center; font-size: 22px; font-weight: bold;"><div>BALAI PEMBIBITAN TERPADU SENTAJO RAYA</div></td>
  </tr>
  <tr>
    <td style="text-align: center; font-size: 18px;"><div>Jalan Raya Teluk Kuantan - Rengat</div></td>
  </tr>
</table>
<hr />
<h2 align="center"><strong>Laporan Penerima Bibit Kecamatan <? echo $kec; ?></strong></h2>

<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table width="80%" border="1" align="center" cellspacing="0" class="table table-bordered table-hover table-striped">
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
                                                </tr>
                                              </tbody>
                                              <?php $no++; }?>
                                        </table>
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                        <table width="80%" align="center" cellspacing="0">
  <tr>
    <td width="53%">&nbsp;</td>
    <td width="47%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align: center">Sentajo, <? echo date("d F Y");?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align: center">Kepala</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align: center"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>
    <? 
	$kep=mysql_query("select * from kepala");
	$kepala=mysql_fetch_array($kep);
	?>
    <strong><? echo $kepala['nama']; ?></strong><br />
    NIP. <? echo $kepala['nip']; ?></p></td>
  </tr>
</table>

