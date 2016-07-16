<?php
	
	 require_once '../Library/php-activerecord/ActiveRecord.php'; 
	 ActiveRecord\Config::initialize(function($cfg)
	 {
		 $cfg->set_model_directory('../Model');
		 $cfg->set_connections(array(
		 'development' => 'mysql://root:@localhost/mydbleda'));
 		});

?>	