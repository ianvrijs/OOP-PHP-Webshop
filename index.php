<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'config.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . 'autoload.php');

database::init(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

$sHtmlNav = require_once(__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'nav.php');
$sHtmlFooter = require_once(__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php');



if (isset($_GET['module']) && !empty($_GET['module']))
{
    $sFilepath = __DIR__ . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $_GET['module'] . DIRECTORY_SEPARATOR;
}
else
{
    header('Location: index.php?module=home');
}

if(file_exists($sFilepath . "index.php"))
{
    $sHtmlBody = include($sFilepath . "index.php");
}
else
{
    header("Location: index.php?module=404");

}

$oHtml = new html();
$oHtml->addJs('formValidate.js');
// $oHtml->addJs('confirmation.js');    
$oHtml->addCss('style.css');
$oHtml->addCss('login.css');
$oHtml->setTitle('Eindopdracht php | Ian Vrijs');
$oHtml->addHtml($sHtmlNav);
$oHtml->addHtml($sHtmlBody);
// $oHtml->addHtml($sHtmlFooter);


//echo
$oHtml->doOutput();

?>