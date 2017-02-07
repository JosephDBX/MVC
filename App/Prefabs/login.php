<?php defined("ROOT") OR die("Access Denied"); ?>
<div class="err"></div>
<div class="box box-white">
	<form action="" method="POST" role="form">
		<legend>Logeate</legend>

		<div class="form-group">
			<input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario...">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña...">
		</div>

	

		<button type="button" id="submit" class="btn btn-primary">Submit</button>
		<label class="checkbox-inline float-right">
			<input type="checkbox" id="" value="" name="remind"> Recuerdame...
		</label>
	</form>
</div>