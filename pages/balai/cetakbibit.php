<?php 
	/* Koneksi database*/
	include './koneksi.php';

	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from bibit order by jenis DESC");
$no=1;
?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Jenis Bibit</th>
                                                    <th>Usia Bibit</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['jenis']; ?></td>
                                                    <td><?php echo $result['usia']; ?></td>
                                                    <td><?php echo $result['jumlah']; ?></td>
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
