<?php 

if($user_id){
	header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
}

 ?>

<div id="container-user-akses">
	<form method="POST" action="<?php echo BASE_URL."proses_login.php"; ?>">
		<?php 

			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if($notif == "true"){
				echo "<div class='notif'>Maaf, email atau password yang anda masukan tidak cocok </div>";
			}

		 ?>

		<div class="element-form">
			<label>E-mail</label>
			<span><input type="email" name="email"></span>
		</div>
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password"></span>
		</div>

		<div class="element-form">
			<span><input type="submit" value="Login"></span>
		</div>
	</form>
</div>