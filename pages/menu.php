<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <?php
						if($_SESSION['level']=="balai")
						{
						?>
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=bibit"><i class="fa fa-tree fa-fw"></i> Bibit</a>
                        </li>
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=penerima"><i class="fa fa-group  fa-fw"></i> Penerima</a>
                        </li>
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=wilayah"><i class="fa fa-globe fa-fw"></i> Wilayah</a>
                        </li>
                         <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=distribusi2"><i class="fa fa-sitemap fa-fw"></i> Distribusi</a>
                        </li>   
                         <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=laporan"><i class="fa fa-briefcase fa-fw"></i> Laporan</a>
                        </li>
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=surat"><i class="fa fa-envelope fa-fw"></i> Surat Dinas</a>
                        </li> 
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=keuangan"><i class="fa fa-money fa-fw"></i> Keuangan</a>
                        </li> 
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=kepala"><i class="fa fa-user-md fa-fw"></i> Kepala</a>
                        </li>                             
                         <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=user"><i class="fa fa-gear fa-fw"></i> Kelola User</a>
                        </li>                                                                
                        <?php
						}elseif($_SESSION['level']=="dinas"){
						?>
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=penerima"><i class="fa fa-group  fa-fw"></i> Penerima</a>
                        </li>
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=wilayah"><i class="fa fa-globe fa-fw"></i> Wilayah</a>
                        </li>
                         <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=laporan"><i class="fa fa-briefcase fa-fw"></i> Laporan</a>
                        </li>  
                        <li>
                            <a href="?cat=<? echo $_SESSION['level'];?>&page=surat"><i class="fa fa-envelope fa-fw"></i> Surat Dinas</a>
                        </li>
                    </ul>
                </div>
                <? } ?>