<?php
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/php_ext/phpseclib/Net/SSH2.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/php_ext/phpseclib/Net/SFTP.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/php_ext/phpseclib/Crypt/RSA.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/php_ext/phpseclib/Math/BigInteger.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/php_ext/phpseclib/Crypt/Hash.php");


use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\PublicKeyLoader;

$key = PublicKeyLoader::load(file_get_contents("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/key/public_key"), 'KbFaQA4qgdpmT9T');

$ssh = new SSH2('localhost');
if (!$ssh->login('username', $key)) {
    throw new \Exception('Login failed');
}







include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/php_ext/phpseclib.php");
$host = 'www.kleene-mv.org';
$port = 22;
$conn = ssh2_connect($host, $port, array('hostkey'=>'ssh-rsa'));
$username = 'fredy';
$pub_key = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/key/public_key";
$pri_key = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/key/id_rsa";
ssh2_auth_pubkey_file($conn, $username, $pub_key, $pri_key);
?>