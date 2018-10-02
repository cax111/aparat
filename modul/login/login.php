<?php
    include "../../class/koneksi.php";
    include "../../class/class-user.php";
    $objUser = new kelolaUser();
    //memulai session
    session_start();
    //cek ketersediaan session
    if(isset($_SESSION['id_user_aparat'])){
    	//jika ada maka halaman diterukan ke index.php/halaman utama
    	header('location:../../index.php');
    }
?>
<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<title>APARAT | Login</title>
	  	<!-- Tell the browser to be responsive to screen width -->
	  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  	<!-- Bootstrap 3.3.7 -->
	  	<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
	  	<!-- Font Awesome -->
	  	<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
	  	<!-- Theme style -->
	  	<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
	  	<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<p><b>APA</b>RAT</p>
		  	</div>
		  	<!-- /.login-logo -->
		  	<div class="login-box-body">
		    	<p class="login-box-msg">Form Login</p>
		    	<p class="login-box-msg">Aplikasi Pembuatan Surat</p>

		    	<?php
		    		if(isset($_POST['ok'])){
		    			//inisialisasi variabel post menjadi variabel php
		    			$username = $_POST['username'];
		    			$password = md5($_POST['password']);

		    			//memasukan variabel username dan password untuk di cek
		    			$status = $objUser->loginUser($username,$password);
		    			//jika data ada maka berhasil login
		    			if(!empty($status)){
		    				//inisialisasi session id_user
		    				foreach($status as $t){
		    					$_SESSION['id_user_aparat']=$t['id_user'];
		    				}
		    				//meneruskan ke halaman index.php
    						header('location:../../index.php');

    					//jika tidak berhasil login
		    			}else{
		    				//tampilan error jika terdapat kesalahan username/password
		    	?>
		    				<div class="box-footer clearfix label-danger">
			                    <i class="fa fa-times"></i>
			                    Username/Password anda Salah
			            	</div>
		    	<?php
		    			}
		    		}
		    	?>


            	<br/>
		    	<form method="post">
		      		<div class="form-group has-feedback">
		        		<input type="text" name="username" class="form-control" placeholder="Username" required>
		        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
		      		</div>
		      		<div class="form-group has-feedback">
				        <input type="password" name="password"  class="form-control" placeholder="Password" required>
				        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
				    </div>
		      		<div class="row">
			        	<!-- /.col -->
			        	<div class="col-xs-12">
			          		<button type="submit" class="btn btn-primary btn-block btn-flat" name="ok">Sign In</button>
			        	</div>
			        	<!-- /.col -->
		      		</div>
		    	</form>

		  	</div>
		  <!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

		<!-- Bootstrap 3.3.7 -->
		<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>
