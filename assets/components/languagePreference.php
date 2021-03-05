<?php
session_start();
//language support configuration
if (!function_exists("gettext")){ 
//    echo "gettext is not installed\n"; 
} else{ 
//    echo "gettext is supported\n"; 
}


if ($_POST['language'] != null){
    $_SESSION['languagePreference'] = $_POST['language'];
}



$locale = $_SESSION['languagePreference'];
if ($locale == ''){
    $locale = 'de_DE';
}
//$locale = 'en_EN';
$domain = 'app';

$results = putenv("LC_ALL=$locale");
if (!$results) {
    exit ('putenv failed');
}

if (defined('LC_MESSAGES')) {
    setlocale(LC_MESSAGES, $locale); // Linux
} else {
    putenv("LC_ALL={$locale}"); // windows
}



$results = bindtextdomain("app", "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/locale");
//echo 'new text domain is set: ' . $results. "\n";

$results = textdomain($domain);
//echo 'current message domain is set: ' . $results. "\n";

//echo _("Good morning");
$language['language'] = $locale;
//echo _("Good Morning");
echo json_encode($language);
?>