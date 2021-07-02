<?php
session_start();
clearstatcache();
//language support configuration
if (!function_exists("gettext")){ 
    //    echo "gettext is not installed\n"; 
} else{ 
    //    echo "gettext is supported\n"; 
}


if ($_POST['language'] != null){
    $_SESSION['languagePreference'] = $_POST['language'];
}

clearstatcache();

$locale = $_SESSION['languagePreference'];
if ($locale == ''){
    $locale = 'de_DE';
}
$domain = 'app';

$results = putenv("LC_ALL=$locale");
if (!$results) {
    exit ('putenv failed');
}

if (defined('LC_MESSAGES')) {
//    setlocale(LC_MESSAGES, $locale); // Linux
    putenv('LANGUAGE=' . $locale);
    setlocale(LC_ALL, $locale);
} else {
    putenv("LC_ALL={$locale}"); // windows
}


bindtextdomain($locale, "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/locale/nocache");
$results = bindtextdomain($locale, "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/locale");
//echo 'new text domain is set: ' . $results. "\n";
$results = textdomain($locale);
//echo 'current message domain is set: ' . $results. "\n";

//echo _("Good morning");








//if (defined('LC_MESSAGES')) {
//    setlocale(LC_MESSAGES, $locale); // Linux
//    bindtextdomain("app", "./locale");
//} else {
//    putenv("LC_ALL={$locale}"); // windows
//    bindtextdomain("app", ".\locale");
//}




$language['language'] = $locale;
//echo _("Good Morning");
print json_encode($language, JSON_UNESCAPED_SLASHES);
?>