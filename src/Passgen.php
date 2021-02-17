<?php 

	namespace Atiksoftware\Security;

	class Passgen
	{

		/** Create an username and password for domain
		 * @param string that domain name like "atiksoftware.com"
		 * @param string that key for create spesific password
		 * @param integer that size of will create username char count
		 * @param integer that size of will create password char count
		 * @return array will return an array like [ "username" => "ad0w2xc0", "password" => "aj0]AOTgzN*cyO" ]
		 */
		static function make($domain = "", $key = "^A.R%x", $sizeUsername = 8, $sizePassword = 12){
			$specials = ['/','[',')','=',']','.','?','*','(', ',', '_'];
			$username = "";
			$password = "";
			$domainHash = sha1( $key . $domain . $key );
			$domainHash = preg_replace('/[^A-Za-z0-9]/', '',  base64_encode($domainHash) );
 
			$handleHash = str_split($domainHash); 
			$lastOrd = 12;
			$tryCount = 0;
			while(strlen($username) < $sizeUsername){
				$lastOrd = $ord = ord($handleHash[0]); // 126
				for($i = 0; $i < 3; $i++){ 
					$handleHash[] = array_shift($handleHash);
				} 
				$char = strtolower($handleHash[0]); 
				if($tryCount > 1000 || $username == "" || abs( ord($username[ strlen($username) - 1 ]) - ord($char) ) > 6){
					$username .= $char;
				}else{
					$tryCount++;
				}
			}  
			$sAd = true;
			for($h = 0; $h < $lastOrd; $h++){
				$ord = ord($handleHash[0]); // 126
				for($i = 0; $i < $ord; $i++){ 
					$handleHash[] = array_shift($handleHash);
					$specials[]   = array_shift($specials);
				}
				if($sAd){
					$handleHash[] = $specials[0];
				} 
				$sAd = !$sAd; 
			}
			while(strlen($password) < $sizePassword){
				$lastOrd = $ord = ord($handleHash[0]); // 126
				for($i = 0; $i < 3; $i++){ 
					$handleHash[] = array_shift($handleHash);
				} 
				$char = strtolower($handleHash[0]); 
				if($tryCount > 1000 || $password == "" || abs( ord($password[ strlen($password) - 1 ]) - ord($char) ) > 6){
					$password .= $char;
				}else{
					$tryCount++;
				}
			} 
			return (object)["username" => $username, "password" => $password];
		}



	}
