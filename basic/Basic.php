<?php
namespace Basic;
use Basic\Routing;
class Basic{
    function autoRouting(
        $bool=true
    ){
        return new Routing($bool);
    }
    function error(
        $showErrors=true
    ){
        if($showErrors){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }else{
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(0);
        }
    }
    function getInputVars(){
        $pairs = explode("&", file_get_contents("php://input"));
        $vars = array();
        foreach ($pairs as $pair) {
            $nv = explode("=", $pair);
            $name = urldecode($nv[0]);
            $value = urldecode($nv[1]);
            $vars[$name] = $value;
        }
        return $vars;
    }
    function getMethod(){
        return @$_SERVER['REQUEST_METHOD'];
    }
    function getUri(
        $segmentId=null
    ){
        $str=$_SERVER["REQUEST_URI"];
        $str=@explode('?',$str)[0];
        $arr=explode('/',$str);
        $arr=array_filter($arr);
        $arr=array_values($arr);
        if(count($arr)<1){
            $segment[1]='/';
        }else{
            $i=1;
            foreach ($arr as $key => $value) {
                $segment[$i++]=$value;
            }
        }
        if(is_null($segmentId)){
            return $segment;
        }else{
            if(isset($segment[$segmentId])){
                return $segment[$segmentId];
            }else{
                return false;
            }
        }
    }
}
?>
