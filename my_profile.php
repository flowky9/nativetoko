<?php 

if($user_id){
	$module = isset($_GET['module']) ? $_GET['module'] : false;
	$action = isset($_GET['action']) ? $_GET['action'] : false;
	$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
}else {
	header("location:".BASE_URL."index.php?page=login");
}

 ?>
<div id="bg-page-profile">
	<div id="menu-profile">
		<ul>
			<li>
				<a <?php if($module == "kategori") echo "class='active'" ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list" ?>">Kategori</a>
			</li>
			<li>
				<a <?php if($module == "barang") echo "class='active'" ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list" ?>">Barang</a>
			</li>
			<li>
				<a <?php if($module == "kota") echo "class='active'" ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list" ?>">Kota</a>
			</li>
			<li>
				<a <?php if($module == "user") echo "class='active'" ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list" ?>">User</a>
			</li>
			<li>
				<a <?php if($module == "banner") echo "class='active'" ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list" ?>">Banner</a>
			</li>
		</ul>
	</div>

	<div id="profile-content">
		<?php 

			$filename = "module/$module/$action.php";

			if(file_exists($filename)){
				include_once($filename);
			}else{
				echo "<p> Maaf, File tersebut tidak ada dalam sistem</p>";
			}

		 ?>
	</div>
</div>