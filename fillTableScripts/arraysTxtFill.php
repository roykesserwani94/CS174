<?php require '../connection.php';


$file = 'arrays.txt';
$current = '{"data":[';

$sql = "SELECT * FROM gamescore";
$results =  mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_row($results)) {
	$cost = 500 + ($row[4] * 300);
	$current .= "[\"{$row[3]}\", \"{$row[1]}\", \"OPP\", \"OPRK\", \"1st\", \"{$cost}\"],";
	if ($row[3] == "RB" || $row[3] == "WR" || $row[3] == "TE"){
		$current .= "[\"FLEX\", \"{$row[1]}\", \"OPP\", \"OPRK\", \"1st\", \"{$cost}\"],";

	}
}

$sql = "SELECT * FROM teams";
$results =  mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_row($results)) {
	$cost = 500;
	$current .= "[\"DST\", \"{$row[1]}\", \"OPP\", \"OPRK\", \"1st\", \"{$cost}\"],";	
}


$current = rtrim($current, ',');
$current .= ']}';
file_put_contents($file, $current);




?>
