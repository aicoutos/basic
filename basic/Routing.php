<?php
namespace Basic;
use Basic\Basic;
class Routing extends Basic{
    var $method;
    var $tuple;
    var $uri;
    function __construct($bool){
        if($bool){
            return $this->auto();
        }else{
            return $this->manual();
        }
    }
    function auto(){
        //identificar o método
        switch($this->getMethod()){
            case 'GET':
            $method=1;
            break;
            case 'POST':
            $method=2;
            break;
            case 'PUT':
            case 'PATCH':
            $method=3;
            break;
            case 'DELETE':
            $method=4;
            break;
            default:
            $method=0;
        }

        print $method.'<br>';
        //indentificar o tipo de uri
        $uri=$this->getUri();
        var_dump($uri);
        //identifica a ação
    }
    function getMethod(){
        return $this->method;
    }
    function getTuple(){
        return $this->tuple;
    }
    function getUri(){
        return $this->uri;
    }
    function manual(){
        print 'roteamento manual<br>';
    }
    function setMethod($int){
        $this->method=$int;
    }
    function setTuple($int){
        $this->tuple=$int;
    }
    function setUri($int){
        $this->uri=$int;
    }
}
?>
