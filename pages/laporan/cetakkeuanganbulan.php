<?php 
$bulan=$_POST['bulan'];
$msg = strtoupper($bulan);
$pecah = explode('/',$msg);
	/* Koneksi database*/
	include '../koneksi.php';

	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from keuangan where keuangan.tanggal_keuangan like '%$bulan' order by tanggal_keuangan ASC");
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
<h2 align="center"><strong>Laporan Keuangan <br />Bulan
<? 
if($pecah[0]=='01' or '1'){
	echo "Januari";
}else if($pecah[0]=='02' or '2'){
	echo "Februari";
}else if($pecah[0]=='03' or '3'){
	echo "Maret";
}else if($pecah[0]=='04' or '4'){
	echo "April";
}else if($pecah[0]=='05' or '5'){
	echo "Mei";
}else if($pecah[0]=='06' or '6'){
	echo "Juni";
}else if($pecah[0]=='07' or '7'){
	echo "Juli";
}else if($pecah[0]=='08' or '8'){
	echo "Agustus";
}else if($pecah[0]=='09' or '9'){
	echo "September";
}else if($pecah[0]=='10'){
	echo "Oktober";
}else if($pecah[0]=='11'){
	echo "November";
}else if($pecah[0]=='12'){
	echo "Desember";
}
?> <? echo $pecah[1]; ?>
</strong></h2>

<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table width="80%" border="1" align="center" cellspacing="0" class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jenis Biaya</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Satuan</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
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

