<?php
//session_start();
clearstatcache();
//language support configuration

//checks whether gettext function installed or not
if (!function_exists("gettext")){ 
    //    echo "gettext is not installed\n"; 
} else{ 
    //    echo "gettext is supported\n"; 
}

// get language preference from post request
if ($_POST['language'] != null){
    $_SESSION['languagePreference'] = $_POST['language'];
}

clearstatcache();

//set default laguage as Deutsch is nothing mentioned in the post request or null
$locale = $_SESSION['languagePreference'];
if ($locale == ''){
    $locale = 'de_DE';
}
//file containing translation in the locale folder 
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
$results = textdomain($locale);



$language['language'] = $locale;
//echo _("Good Morning");
//print json_encode($language, JSON_UNESCAPED_SLASHES);
?>