<?php
namespace App\Controller;
use Basic\Basic;
class IndexController extends Basic{
    function index(){
        $data=[
            'title'=>'hello world'
        ];
        print $this->view('inc/header',$data);
        print $this->view('screen/index',$data);
    }
}
?>
