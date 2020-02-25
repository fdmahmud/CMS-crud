<?php  

echo $a = password_hash('123', PASSWORD_DEFAULT, ['cost'=> 350]); //4 to 

echo "<br>";

	echo password_hash($a, PASSWORD_DEFAULT, ['cost'=> 10]);


?>