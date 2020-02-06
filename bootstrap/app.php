<?php
require '../vendor/autoload.php';
use Basic\Kernel as Basic;
use Dotenv\Dotenv;
$Basic=new Basic();
$Basic->error($Basic->isDev());
$filename=$Basic->root().'.env';
if(file_exists($filename)){
    $dotenv = Dotenv::createImmutable($Basic->root());
    $dotenv->load();
}else{
    die('.env not found'.PHP_EOL);
}
$Basic->autoRouting(true);
?>
