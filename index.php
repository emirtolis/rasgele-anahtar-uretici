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

<!--  html,css,js ve php kullanıldı  -github.com/emirtolis-->
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="http://github.githubassets.com/favicons/favicon.svg">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Rasgele Anahtar Oluşturucu</title>
</head>
<body style="text-align:center;"><br>
	<h2>Rasgele Anahtar Oluşturucu </h2>
	<input type="text" id="metin" value="<?php echo "{$key}\r\n";?>" size="33"><br><br>
	<button onclick="window.location.reload()">Yeni Anahtar</button>
	<button onclick="kopyala()">Anahtarı Kopyala</button>
	<div class="github">
		<hr>
	    <a href="http://github.com/emirtolis/rasgele-anahtar-uretici" target="_blank">Kodları Github'dan İndir!</a><br>
		<a href="http://github.com/emirtolis/rasgele-anahtar-uretici/blob/main/LICENSE" target="_blank">Lisans</a><hr>
		<div class="footer">
			<p>Emir Tolis tarafından <img src="http://cdn.r10.net/emojis/smile.png?site=" width="24px" alt="Gülen Yüz" title="emojis/smile.png"> ile yapıldı</p>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>
