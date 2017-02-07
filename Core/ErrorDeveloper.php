<?php 
namespace Core;
defined("ROOT") OR die("Access Denied");
/**
 * JosephDBX
 */
 class ErrorDeveloper
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
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>ERROR: [<?php echo $errNum; ?>]</strong>
 					 	<?php echo $errStr.", el problema se presentó en la linea ".$errLine.", en el archivo ".$errFile; ?>
 					 </div>
 					<?php 
 					break;

 				case E_USER_WARNING:
 					 ?>
 					 <div class="alert alert-warning alert-dismissible fade show" role="alert">
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>ERROR: [<?php echo $errNum; ?>]</strong>
 					 	<?php echo $errStr.", el problema se presentó en la linea ".$errLine.", en el archivo ".$errFile; ?>
 					 </div>
 					<?php 
 					break;
 				
 				case E_USER_NOTICE:
 					 ?>
 					 <div class="alert alert-info alert-dismissible fade show" role="alert">
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>ERROR: [<?php echo $errNum; ?>]</strong>
 					 	<?php echo $errStr.", el problema se presentó en la linea ".$errLine.", en el archivo ".$errFile; ?>
 					 </div>
 					<?php 
 					break;

 				default:
 					 ?>
 					 <div class="alert alert-warning alert-dismissible fade show" role="alert">
 					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					 		<span aria-hidden="true">&times;</span>
 					 	</button>
 					 	<strong>ERROR: [<?php echo $errNum; ?>]</strong>
 					 	<?php echo $errStr.", el problema se presentó en la linea ".$errLine.", en el archivo ".$errFile; ?>
 					 </div>
 					<?php 
 					break;
 			}
 		});
 	}
 } ?>