<?php defined("ROOT") OR die("Access Denied"); global $menuG; $menuG = $menu; ?>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top" style="background-color: #185B8D;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">
    <img src="/Resource/image/MVC.jpg" width="30" height="30" class="d-inline-block align-top" alt="" style="border-radius: 3px;">
    Página Principal
  </a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <?php 
    function isParent($value, $all)
    {
    	for ($i=0; $i < $all; $i++) { 
    		if ($GLOBALS['menuG'][$i] == NULL) {
    			continue;
    		}
    		if ($GLOBALS['menuG'][$i][2] == $value) {
    			$temp = $GLOBALS['menuG'][$i];
    			$GLOBALS['menuG'][$i] = NULL;
    			if ($temp[3]) {
    				?>
    				<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          			<?php echo $temp[1]; ?>
        			</a>
    				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        			<?php $t = "isParent";
        			$t($temp[0], $all); ?>
        			</div>
    				<?php 
    			} else {
    				?>
    				<a class="dropdown-item" href="#"><?php echo $temp[1]; ?></a>
    				<?php 
    			}
    		}
    	}
    }
    for ($i=0; $i < count($GLOBALS['menuG']); $i++) { 
    	if ($GLOBALS['menuG'][$i] == NULL) {
    		continue;
    	}
     	if ($GLOBALS['menuG'][$i][3]) {
     		?>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $GLOBALS['menuG'][$i][1]; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php $v = "isParent";
        $v($GLOBALS['menuG'][$i][0], count($GLOBALS['menuG'])); ?>
        </div>
      </li>
     		<?php
     	} else {
     		?> 
     <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $GLOBALS['menuG'][$i][1]; ?></a>
      </li>
      		<?php 
     	}
     	
     } ?>
    </ul>
  </div>
</nav>