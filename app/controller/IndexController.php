<?php
namespace App\Controller;
use Basic\Controller;
class IndexController extends Controller{
    function index(){
        $data=[
            'title'=>$_ENV['SITE_NAME']
        ];
        print $this->view('inc/header',$data);
        print $this->view('screen/index',$data);
    }
}
?>
