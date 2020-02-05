<?php
namespace Basic;
use Basic\Basic;
class Routing extends Basic{
    var $action;
    var $controllerName;
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
        //setar a uri
        $uri=parent::segment();
        $uriCode=$this->convertUriToUriCode($uri);
        $this->setUriCode($uriCode);
        //setar a tupla
        $tupleCode=$this->getMethodCode().$this->getUriCode();
        $this->setTupleCode($tupleCode);
        //setar a ação
        $action=$this->convertTupleCodeToAction($this->getTupleCode());
        $this->setAction($action);
        if($this->getAction()){
            //controller
            parent::controller(
                $this->getControllerName().'@'.$this->getAction()
            );
        }else{
            //ação desconhecida
            die('invalid request');
        };
    }
    function getAction(){
        return $this->action;
    }
    function getControllerName(){
        return $this->controllerName;
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
    function convertTupleCodeToAction($int){
        switch($int){
            case 11:
            return 'index';
            break;
            case 12:
            return 'create';
            break;
            case 13:
            return 'show';
            break;
            case 14:
            return 'edit';
            break;
            case 21:
            return 'store';
            break;
            case 32:
            return 'update';
            break;
            case 42:
            return 'destroy';
            break;
            default:
            return false;
        }
    }
    function convertUriToUriCode($arr){
        $count=count($arr);
        if($count==1){
            // 1   simples (ex: /, /photos)
            $uriCode=1;
            if($arr[1]=='/'){
                $controllerName='Index';
            }else{
                $controllerName=mb_ucfirst($arr[1]);
            }
            $controllerName=$controllerName.'Controller';
            $this->setControllerName($controllerName);
        }elseif($count==2){
            if(is_numeric($arr[2])){
                // 3   com id (ex:/photos/1)
                $uriCode=3;
            }elseif($arr[2]=='create'){
                // 2   com ação (ex:/photos/create)
                $uriCode=2;
            }else{
                $uriCode=0;
            }
        }elseif($count==3){
            // 4   com id e ação (ex:/photos/1/edit)
            $uriCode=4;
        }else{
            $uriCode=0;
        }
        return $uriCode;
    }
    function manual(){
        print 'roteamento manual<br>';
    }
    function setAction($str){
        $this->action=$str;
    }
    function setControllerName($str){
        $this->controllerName=$str;
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
