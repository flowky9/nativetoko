<?php 

session_start();

include_once("function/helper.php");
include_once("function/koneksi.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>NativeToko | Jual Barang Elektronik</title>
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet">
		<?php 

				if(isset($_GET['action']) == 'form'){
					echo "<script src='js/ckeditor/ckeditor.js'></script>";
				}

		 ?>
	</head>	

	<body>
		<div id="container">
			<div id="header">
				<a href="<?php echo BASE_URL."index.php"; ?>">
					<img src="<?php echo BASE_URL."images/logo.png"; ?>" alt="">
				</a>

				<div id="menu">
					<div id="user">
					<?php 

						if($user_id){
							echo "Halo <b> $nama </b>, <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'> My Profile </a>";

							echo "<a href='logout.php'> Logout </a>";
						}else {
							echo "<a href='".BASE_URL."index.php?page=login' >Login</a>
							<a href='".BASE_URL."index.php?page=register'>Register</a>";
						}

					 ?>
						
					</div>

					<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
						<img src="<?php echo BASE_URL."images/cart.png"; ?>" alt="">
					</a>
				</div>
			</div>

			<div id="content">
				<?php 

					$filename = $page.".php";

					if(file_exists($filename)){
						include_once("$filename");
					}else {
						echo "Maaf, file tersebut tidak ada di dalam sistem";
					}

				 ?>
			</div>

			<div id="footer">
				<p>Copyright &copy; NativeToko 2018</p>
			</div>
		</div>
	</body>
</html>