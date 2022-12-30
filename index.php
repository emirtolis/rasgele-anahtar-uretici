<?php
function generate_random_key(){

	if(function_exists('openssl_random_pseudo_bytes')){
		$random = openssl_random_pseudo_bytes(100);
	} else {
		$random = rand().microtime().rand();
	}
	return md5($random);
}
$path_config = 'config.php';
if(!is_writable($path_config)){
	exit;
}
$key = generate_random_key();
$config = file_get_contents($path_config);
$config = str_replace('$config[\'app_key\'] = \'\';', '$config[\'app_key\'] = \''.$key.'\';', $config);
file_put_contents($path_config, $config);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/footer.css">
	<title> Rasgele Anahtar Oluşturucu</title>
</head>
<body>
	<center>
	<h2>Yeni Anahtar: </h2><p class="key" id="new_key"><?php echo "{$key}\r\n";?></p>
	<button onclick="window.location.reload()">Yeni Anahtar</button>
	<br><br><hr>
	<footer>
		<h6 class="footer-text">
			2022 By EMR Mob Studios
		</h6>
	</footer>
	</center>
</body>
</html>