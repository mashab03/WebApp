<?
include "pages/koneksi.php";
if(isset($_POST['simpan'])){
$nama=$_POST['nama'];
$email=$_POST['email'];
$judul=$_POST['judul'];
$pesan=$_POST['pesan'];

$sql="INSERT INTO  pesan (id,nama,email,judul,pesan)VALUES ('', '$nama', '$email', '$judul', '$pesan')"; 
if($sql){
	echo "<script>alert('Pesan anda telah terkirim. Terima kasih.'),window.location='index.php'</script>";
}else{
	echo "<script>alert('Gagal Kirim Pesan');";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balai Pembibitan Terpadu Sentajo Raya</title>
    <meta name="description" content="" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="./favicon.png" />		
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template  -->
    <link href="css/templatemo_style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
    <div class="col-xs-12 visible-sm visible-xs" id="templatemo_mobile_menu_wap">
        <p id="mobile_menu_btn"> <a href="#"><span class="glyphicon glyphicon-align-justify"></span></a> </p>
        <div id="mobile_menu">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#templatemo_banner_top">Home</a></li>
                <li><a href="#templatemo_upcomming_event">Profil</a></li>
                <li><a href="#templatemo_pricing">Organisasi</a></li>
                <li><a href="#templatemo_contact">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
  
    <div id="templatemo_banner_top" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
               </div>
                <div class="col-md-4">
                    <p class="right"><a href="pages/login.php">Login</a> <span class="glyphicon glyphicon-user"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div id="templatemo_banner_logo" class="container_wapper">
        <div class="container">
            <div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset">
                    <img src="images/templatemo_logo.png" alt="logo" />
                    <h2 style="color:#0080FF">Balai Pembibitan Terpadu<br />SENTAJO RAYA</h2>
                    <span style="color:#0080FF">Aplikasi Pendataan Dan Pendistribusian Bibit</span>
                </div>
            </div>
        </div>
    </div>

    <div id="templatemo_main_menu" class="container_wapper hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-justified">
                        <li><a href="#templatemo_banner_top">Home</a></li>
                        <li><a href="#templatemo_upcomming_event">Profil</a></li>
                        <li><a href="#templatemo_pricing">Organisasi</a></li>
                        <li><a href="#templatemo_contact">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="templatemo_upcomming_event" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 section_header">
                    <h1>Profil</h1>
                </div>
                <div class="col-md-6 col-md-offset-3 col-md-offset-3">
                    <p><strong>Visi</strong><br>
					Terwujudnya sistem dan produksi bibit tanaman yang bermutu tinggi untuk memenuhi kebutuhan petani regional dan nsional.					</p>
                    <p><strong>Misi</strong><br>
					Menjaga ketersediaan bibit tanaman dari varietas unggul secara kontiniue dan berkesinambungan</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6 col-md-3">
                    <div class="event_box event_animate_left">
                        <img src="images/event_01.jpg" alt="Event 1" class="img-responsive" />
                        <ul>
                            <li><p><strong>Bibit Sawit</strong></p>
                                    <div align="left"><span class="glyphicon glyphicon-file"><br />
                                      </span>Bibit sawit varietas unggul. Cocok dengan segala kondisi tanah dan telah terjamin menghasilkan buah yang bagus.
                                    </div>
                            </li>                          
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="event_box event_animate_left">
                        <img src="images/event_02.jpg" alt="Event 1" class="img-responsive" />
                        <ul>
                            <li><p><strong>Benih Sawit</strong></p>
                                    <div align="left"><span class="glyphicon glyphicon-file"><br />
                                      </span>Benih sawit varietas unggul. Cocok Untuk petani yang ingin melakukan pembibitan sendiri.
                                    </div>
                            </li>                          
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="event_box event_animate_left">
                        <img src="images/event_03.jpg" alt="Event 1" class="img-responsive" />
                        <ul>
                            <li><p><strong>Bibit Karet</strong></p>
                                    <div align="left"><span class="glyphicon glyphicon-file"><br />
                                      </span>Bibit karet varietas unggul. Menghasilkan getah kualitas prima dan memiliki daya tahan yang cukup baik.
                                    </div>
                            </li>                          
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="event_box event_animate_left">
                        <img src="images/event_04.jpg" alt="Event 1" class="img-responsive" />
                        <ul>
                            <li><p><strong>Bibit Kakao</strong></p>
                                    <div align="left"><span class="glyphicon glyphicon-file"><br />
                                      </span>Bibit kakao varietas unggul. Dapat menghasilkan buah dalam jumlah banyak dalam satu bantang, dan tahan terhadap serangan hama.
                                    </div>
                            </li>                          
                        </ul>
                    </div>
                </div>
                <div class="templatemo_clear">
                </div>
            </div>
        </div>
    </div>
<br>
    <div id="templatemo_pricing" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 section_header">
                    <h1>Organisasi</h1>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 pricing_icon_wapper">
                    <p class="cycle_icon"><span class="glyphicon glyphicon-user"></span></p>
                    <div class="clearfix"></div>
                    <h1>Kepala</h1>
                    <p>Wandi Gunawan</p>
                </div>
                <div class="col-md-4 pricing_icon_wapper">
                    <p class="cycle_icon"><span class="glyphicon glyphicon-user"></span></p>
                    <div class="clearfix"></div>
                    <h1>Bag. Tata Usaha</h1>
                    <p>Marlinda, SP</p>
                </div>
                <div class="col-md-4 pricing_icon_wapper">
                    <p class="cycle_icon"><span class="glyphicon glyphicon-user"></span></p>
                    <div class="clearfix"></div>
                    <h1>Bag. Pengolahan</h1>
                    <p>Guska Rianto, SP</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <div class="price_table_box">
                        <h1>Tugas</h1>
                        <ul>
                            <li><span class="glyphicon glyphicon-pencil"></span> Melaksanakan sebagian kewenangan dan tugas teknis tertentu yang menunjang pelaksanaan tugas Dinas Perkebunan dalam rangka melayani Balai Bibit, produsen bibit swasta dan penangkar bibit dalam rangka memproduksi bibit bermutu dari varietas unggul dengan menerapkan prinsip pelayanan, koordinasi dan integrasi baik ke dalam maupun ke luar.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price_table_box">
                        <h1>Tugas</h1>
                        <ul>
                            <li><span class="glyphicon glyphicon-pencil"></span> Tata usaha menyusun rencana, melaksanakan tugas dan arahan, serta menyelenggarakan tugas-tugas di bidang administrasi, keuangan, dan kepegawaian dalam menunjang pelaksanaan program kerja dan kegiatan di bidang tata usaha. Tata usaha mempunyai tugas melaksanakan penyusunan rencana dan program manajemen kepegawaian, manajemen keuangan dan manajemen sumberdaya fisik dan perlengkapan, kerumahtanggaan, dan ketatausahaan di lingkungan Balai Pembibitan Terpadu Kecamatan Sentajo Raya Kabupaten Kuantan Singingi. </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price_table_box">
                        <h1>Tugas</h1>
                        <ul>
                            <li><span class="glyphicon glyphicon-pencil"></span> Bagian Pengolahan menyusun rencana, melaksanakan tugas dan arahan, serta menyelenggarakan tugas-tugas di bidang Pengolahan baik pengolahan pembibitan sawit, karet dan kakao. Bagian pengolahan mempunyai tugas melaksanakan penyusunan rencana pengolahan, perawatan dan pemeliharaan. </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="templatemo_contact" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 section_header">
                    <h1>Contact</h1>
                </div>
                <div class="col-md-6 col-md-offset-3 col-md-offset-3">
                    <p>Apabila anda memiliki pertanyaan, masukan dan saran silahkan hubungi kami di Kantor Balai Pembibitan Terpadu Sentajo Raya, Jalan raya teluk kuantan - rengat. Terima kasih.</p>
                </div>
                
            </div>
        </div>
    </div>
    <div id="templatemo_footer" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright © 2015 Helpi Nopriandi</p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.mobile.customized.min.js"></script>
    <script src="js/unslider.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <!-- templatemo 404 reactive -->
</body>
</html>