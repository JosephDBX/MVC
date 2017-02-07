<?php defined("ROOT") or die("Access Denied"); require PRE."nav.php"; ?>
<div class="container vertical">
	<div class="row justify-content-center">
		<div class="err"></div>
		<section class="box box-white col-xs-11 col-sm-10 col-md-6 col-lg-5 text-center">
			<h1><?php echo "Hola " . $user . ". Tu contraseña es: " . $password . ". Y tu ID es: " . $id; ?></h1>
			<div class="box box-white">
				<button id="logout" class="btn btn-primary">Logout</button>
			</div>
		</section>
	</div>
</div>