<?php 

	include "../vendor/autoload.php";
 

// for($k = 0; $k <= 500; $k++){
// 	foreach($domains as $domain){
// 		$auth = Atiksoftware\Security\Passgen::ForDomain($domain,$k."5as46d5as"); 
// 		echo $auth["username"]."   ".$auth["password"]."\n";
// 		if(in_array($auth["username"], $createds)){
// 			echo "########################################### HATA ########################################\n";
// 			exit;
// 		}
// 		$createds[] = $auth["username"];
// 	}
// }

$auth = Atiksoftware\Security\Passgen::ForDomain("atiksoftware.com","!%&/xzcas56"); 
echo $auth["username"]."   ".$auth["password"]."\n";