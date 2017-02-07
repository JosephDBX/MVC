<?php 
namespace Core;
defined("ROOT") OR die("Access Denied");
/**
 * JosephDBX
 */
 class ErrorUser
 {
 	
 	function __construct()
 	{
 		set_error_handler(function($errNum, $errStr, $errFile, $errLine)
 		{
 			if (!(error_reporting() & $errNum)) {
 				return;
 			}
 			switch ($errNum) {
 				case E_USER_ERROR:
 					 ?>
 					 <div class="alert alert-danger alert-dismissible fade show" role="alert">
 					 	<div class="alert_icon text-center">
 					 		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
 					 	</div>
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>ERROR: <?php echo $errStr; ?></strong>
 					 </div>
 					<?php 
 					break;

 				case E_USER_WARNING:
 					 ?>
 					 <div class="alert alert-warning alert-dismissible fade show" role="alert">
 					 	<div class="alert_icon text-center">
 					 		<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
 					 	</div>
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>¿SEGURO? de <?php echo $errStr; ?></strong>
 					 </div>
 					<?php 
 					break;
 				
 				case E_USER_NOTICE:
 					 ?>
 					 <div class="alert alert-info alert-dismissible fade show" role="alert">
 					 	<div class="alert_icon text-center">
 					 		<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
 					 	</div>
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong><?php echo $errStr; ?></strong>
 					 </div>
 					<?php 
 					break;

 				default:
 					 ?>
 					 <div class="alert alert-warning alert-dismissible fade show" role="alert">
 					 	<div class="alert_icon text-center">
 					 		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
 					 	</div>
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>ERROR: <?php echo $errStr; ?></strong>
 					 </div>
 					<?php 
 					break;
 			}
 		});
 	}
 } ?>