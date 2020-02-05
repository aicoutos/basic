<?php
namespace Basic;
use Basic\Basic;
class Routing extends Basic{
    var $methodCode;
    var $tupleCode;
    var $uriCode;
    function __construct($bool){
        if($bool){
            $this->auto();
        }else{
            $this->manual();
        }
    }
    function auto(){
        //setar o método
        $method=parent::getMethod();
        $methodCode=$this->convertMethodToMethodCode($method);
        $this->setMethodCode($methodCode);
        print $this->getMethodCode();
        //setar a uri
        // $uri=parent::getUri();
        // $uriCode=$this->convertUriToUriCode($uri);
        // $this->setUriCode($uriCode);
        //setar a tupla
        //setar a ação
    }
    function getMethodCode(){
        return $this->methodCode;
    }
    function getTupleCode(){
        return $this->tupleCode;
    }
    function getUriCode(){
        return $this->uriCode;
    }
    function convertMethodToMethodCode($str){
        switch($str){
            case 'GET':
            $methodCode=1;
            break;
            case 'POST':
            $methodCode=2;
            break;
            case 'PUT':
            case 'PATCH':
            $methodCode=3;
            break;
            case 'DELETE':
            $methodCode=4;
            break;
            default:
            $methodCode=0;
        }
        return $methodCode;
    }
    function convertUriToUriCode($arr){

    }
    function manual(){
        print 'roteamento manual<br>';
    }
    function setMethodCode($int){
        $this->methodCode=$int;
    }
    function setTupleCode($int){
        $this->tupleCode=$int;
    }
    function setUriCode($int){
        $this->uriCode=$int;
    }
}
?>
