<?php 
	if ($_REQUEST['type']=="Block No.") {
		header('Location:show_block.php?block_id='.$_REQUEST['content']);
		exit();
	}
	else{
		header('Location:show_tx_2.php?id='.$_REQUEST['content']);
		exit();
	}
 ?>