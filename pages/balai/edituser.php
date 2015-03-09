<?php 
$id=$_GET['id'];
	/* Koneksi database*/
	include './koneksi.php';
	include './paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal - 1) * $per_hal;
	$reload="user.php";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(user.id) AS numrows,user.id, user.nama, user.nip, user.username
FROM user ");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * from user order by level ASC");
$no=1;
?>
<!---Simpan--->
<?
if(isset($_POST['simpan'])){
$nama=$_POST['nama'];
$nip=$_POST['nip'];
$username=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];
if(empty($nama)||empty($nip)||empty($username)||empty($password)||empty($level)){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data isian belum lengkap, silahkan periksa kembali!');
	}
	</script>";
}else{
$a="insert into user(id, nama, nip, username, password, level) values ('', '$nama', '$nip', '$username', '$password', '$level')";
$b=mysql_query($a);
if($b){
	echo "<script>alert('Data berhasil disimpan!');window.location='?cat=balai&page=user'</script>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data user gagal disimpan');
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
	$ff=mysql_query("Delete from user Where id='".$ids."'");
	if($ff)
	{
		echo "<script>alert('Data berhasil dihapus!');window.location='?cat=balai&page=user'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='?cat=balai&page=user'</script>";
	}
}
?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <div class="alert alert-success"><i class="fa fa-gear fa-fw"></i> Kelola User</div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-file "></i> Edit Data User
                        </div>
                        <div class="panel-body">
<?
$edit = mysql_query("SELECT * from user where id='".$id."'");
$res = mysql_fetch_array($edit);
if(isset($_GET['edit'])){
	$nama=$_POST['nama'];
	$nip=$_POST['nip'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$level=$_POST['level'];
	$rs = mysql_query("update user set nama='$nama', nip='$nip', username='$username', password='$password', level='$level' where id='".$id."'");
	if($rs){
		echo "<script>alert('Data berhasil diubah!');window.location='?cat=balai&page=user'</script>";
	}else{
		echo "<script>alert('Data gagal diubah!');window.location='?cat=balai&page=user'</script>";
	}
}
?>
<form action="?cat=balai&page=edituser&edit=1&id=<? echo "$id"?>" method="post">       
<div class="form-group">
    <label>Nama</label>
    <input class="form-control" name="nama" id="nama" placeholder="Nama" value="<? echo $res['nama'];?>">
</div> 
<div class="form-group">
    <label>NIP</label>
    <input class="form-control" name="nip" id="nip" placeholder="Nomor Induk Pegawai" value="<? echo $res['nip'];?>">
</div> 
<div class="form-group">
    <label>Username</label>
    <input class="form-control" name="username" id="username" placeholder="Username" value="<? echo $res['username'];?>">
</div> 
<div class="form-group">
    <label>Password</label>
    <input class="form-control" name="password" id="password" placeholder="Password" value="<? echo $res['password'];?>">
</div> 
<div class="form-group">
    <label>Level</label>
    <select class="form-control" name="level">
      <option value="<? echo $res['level'];?>">&lt;? echo $res['level'];?&gt;</option>
      <option value="balai">Balai</option>
      <option value="dinas">Dinas</option>
</select>
</div> 
<button type="submit" class="btn btn-warning" name="edit" id="edit" >Update</button>    
          
</form>
                        </div>
                    </div>
            <!--- kelola data--->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-gear "></i> Kelola Data User
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
while($result = mysql_fetch_array($query)){
?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $result['nama']; ?></td>
                                                    <td><?php echo $result['nip']; ?></td>
                                                    <td><?php echo $result['username']; ?></td>
                                                    <td><?php echo $result['password']; ?></td>
                                                    <td><?php echo $result['level']; ?></td>
                                                    <td>
													<a href="?cat=<? echo "".$_SESSION['level']."";?>&page=edituser&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-check fa- "></i> </button></a>
                                                    <a href="?cat=<? echo "".$_SESSION['level']."";?>&page=user&del=1&id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times "></i> </button></a>
                                                    
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