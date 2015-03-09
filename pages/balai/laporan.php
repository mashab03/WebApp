<script src="jquery-ui.js"></script>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"> <i class="fa fa-briefcase fa-fw"></i> Laporan </div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
           <!--- kelola data--->
           
                               <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-briefcase fa-fw"></i> Laporan Pendataan Dan Pendistribusian Bibit
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge success"><i class="fa fa-tree"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Laporan Stok Bibit</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p><a href="laporan/cetakbibit.php" target="_blank"><button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-print"></i>  Cetak</button></a></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="fa fa-group"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Laporan Penerima Bibit</h4>
                                            <hr />
                                        </div>
                                        <div class="timeline-body">
                                            <p>
                                            <form target="_blank" action="laporan/cetakpenerimakec.php" method="post">
                                            <label>Laporan Penerima Per-Kecamatan</label>
                                            <div class="form-group input-group">
                                                <input name="kecamatan" id="kecamatan" type="text" class="form-control" placeholder="Masukkan Nama Kecamatan">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    </button>
                                                </span>
                                        	</div>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <form  target="_blank" action="laporan/cetakpenerimadesa.php" method="post">
                                            <label>Laporan Penerima Per-Desa</label>
                                            <div class="form-group input-group">
                                                <select class="form-control" name="desa" >
      <?
	  $sql=mysql_query("select * from wilayah order by desa ASC");
	  while($desa = mysql_fetch_array($sql)){
	  ?>
      <option value="<? echo $desa['desa']; ?>"><? echo $desa['desa']; ?></option>
      <? } ?>
    </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    </button>
                                                </span>
                                        	</div>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <label>Laporan Seluruh Penerima</label>
                                            <a href="laporan/cetakpenerima.php" target="_blank"><button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-print"></i>  Cetak</button></a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge success"><i class="fa fa-globe"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Laporan Wilayah Distribusi Bibit</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p><a href="laporan/cetakwilayah.php" target="_blank"><button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-print"></i>  Cetak</button></a></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="fa fa-sitemap"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Laporan Pendistribusian Bibit</h4>
                                            <hr />
                                        </div>
                                        <div class="timeline-body">
                                            <p>
                                            <form  target="_blank" action="laporan/cetakdistribusibulan.php" method="post">
                                            <label>Laporan Distribusi Per-Bulan</label>
                                            <div class="form-group input-group">
                                                <input name="bulan" id="bulan" type="text" class="form-control" placeholder="Contoh : 01/2015">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    </button>
                                                </span>
                                        	</div>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <form  target="_blank" action="laporan/cetakdistribusitahun.php" method="post">
                                            <label>Laporan Distribusi Per-Tahun</label>
                                            <div class="form-group input-group">
                                                <input name="tahun" id="tahun" type="text" class="form-control" placeholder="Contoh : 2015">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    </button>
                                                </span>
                                        	</div>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <form  target="_blank" action="laporan/cetakdistribusibibit.php" method="post">
                                            <label>Laporan Distribusi Bibit Per-Desa</label>
                                            <div class="form-group input-group">
                                            <label>Jenis Bibit</label>
                                            <select class="form-control" name="jenis">
      <?
	  $sql=mysql_query("select * from bibit order by kode ASC");
	  while($bibit = mysql_fetch_array($sql)){
	  ?>
      <option value="<? echo $bibit['jenis']; ?>"><? echo $bibit['jenis']; ?></option>
      <? } ?>
    </select>
                                        	</div>
                                            <div class="form-group input-group">
                                            <label>Desa</label>
                                            <select class="form-control" name="desa" >
      <?
	  $sql=mysql_query("select * from wilayah order by desa ASC");
	  while($desa = mysql_fetch_array($sql)){
	  ?>
      <option value="<? echo $desa['desa']; ?>"><? echo $desa['desa']; ?></option>
      <? } ?>
    </select>
                                        	</div>
                                            <button type="submit" class="btn btn-success" name="cetak" id="cetak"><i class="fa fa-print"></i> Cetak</button>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <form  target="_blank" action="laporan/cetakdistribusibibit2.php" method="post">
                                            <label>Laporan Distribusi Bibit Per-Kecamatan</label>
                                            <div class="form-group input-group">
                                            <label>Jenis Bibit</label>
                                            <select class="form-control" name="jenis">
      <?
	  $sql=mysql_query("select * from bibit order by kode ASC");
	  while($bibit = mysql_fetch_array($sql)){
	  ?>
      <option value="<? echo $bibit['jenis']; ?>"><? echo $bibit['jenis']; ?></option>
      <? } ?>
    </select>
                                        	</div>
                                            <div class="form-group input-group">
                                            <label>Kecamatan</label>
                                            <input class="form-control" name="kec" id="kec" placeholder="Nama Kecamatan">
                                        	</div>
                                            <button type="submit" class="btn btn-success" name="cetak" id="cetak"><i class="fa fa-print"></i> Cetak</button>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <label>Laporan Rekap Distribusi Bibit</label>
                                            <a href="laporan/cetakdistribusi.php" target="_blank"><button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-print"></i>  Cetak</button></a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-badge success"><i class="fa fa-money"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Laporan Keuangan</h4>
                                            <hr />
                                        </div>
                                        <div class="timeline-body">
                                            <p>
                                            <form  target="_blank" action="laporan/cetakkeuanganbulan.php" method="post">
                                            <label>Laporan Keuangan Per-Bulan</label>
                                            <div class="form-group input-group">
                                                <input name="bulan" id="bulan" type="text" class="form-control" placeholder="Contoh : 01/2015">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    </button>
                                                </span>
                                        	</div>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <form  target="_blank" action="laporan/cetakkeuangantahun.php" method="post">
                                            <label>Laporan Keuangan Per-Tahun</label>
                                            <div class="form-group input-group">
                                                <input name="tahun" id="tahun" type="text" class="form-control" placeholder="Contoh : 2015">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    </button>
                                                </span>
                                        	</div>
                                            </form>
                                            </p>
                                            <hr />
                                            <p>
                                            <label>Laporan Rekap Keuangan</label>
                                            <a href="laporan/cetakkeuangan.php" target="_blank"><button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-print"></i>  Cetak</button></a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

           
           <!--- end page-wrapper--->            
		</div>