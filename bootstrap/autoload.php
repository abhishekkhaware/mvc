<?php
use Symfony\Component\Finder\Finder;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';



$finder = new Finder();
$finder->files()->in(__DIR__."/../config")->name('*.php');

foreach ($finder as $file) {
    // Dump the relative path to the file
    require_once __DIR__."/../config/".$file->getRelativePathname();
}

/*
* whoops Config
*/
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//    $whoops = new \Whoops\Run();
////    $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler())->setPageTitle("Abhishek Khaware- Its\'s Broken!");
//    $errorPage = new Whoops\Handler\PrettyPageHandler();
//    $errorPage->setPageTitle("OOps! It's broken!"); // Set the page's title
////    $errorPage->setEditor("sublime");         // Set the editor used for the "Open" link
////    $errorPage->addDataTable("Extra Info", array(
////        "stuff"     => 123,
////        "foo"       => "bar",
////        "useful-id" => "abhishek"
////    ));
//
//    $whoops->pushHandler($errorPage);
//
//    // Set Whoops as the default error and exception handler used by PHP:
//    $whoops->register();


