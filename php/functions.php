<?php

function register($registerinfo) {

	unset($registerinfo["passagain"]);
	$registerinfo["team"] = (int) $registerinfo["team"];
	$registerinfo["acl"] = 1;

	extract($registerinfo);

	$registerinfo["newpass"] = hash("ripemd128", $newpass);

	return insert("users", USERVALS, $registerinfo);

}

/*UTILITIES*/

function cleanstring($string) {
	$conn = connect();
	return $conn->real_escape_string($string);
}

function arraytoref(&$rawArray)
{ 
    $refArray = array(); 
    foreach($rawArray as $key => $value) 
    {
        $refArray[$key] = &$rawArray[$key];
    }
    return $refArray; 
}

function assoctonum($array) {
	$newarray = array();
	foreach ($array as $key => $value) {
		$newarray[] = $value;
	}
	return $newarray;
}