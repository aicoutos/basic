<?php
namespace App\Controller;
use Basic\Basic;
class IndexController extends Basic{
    function index(){
        print 'hello world';
        // $dataArr=[
        //     'title'=>'hello world'
        // ];
        // $headerStr=$this->view('inc/header',$dataArr);
        // $dataArr['header']=$headerStr;
        // $indexStr=$this->view('screen/index',$dataArr);
    }
}
?>
