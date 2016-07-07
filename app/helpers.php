<?php
    function sort_by($column,$body,$attr=''){
        $direction=($_GET['direction']=='asc')? 'desc': 'asc';
        $url=URL.$_GET['url'];
        return link_to($url,$body,array('sort'=>$column,'direction'=>$direction),$attr);
    }
    function link_to($url,$body,array $queryString=array(),$attributes=''){
        $link="<a {$attributes} href=".$url."?";
        $queryString=append_to_queryString($queryString);
//        print_r($queryString);
        unset($queryString['url']);
        if(isset($queryString)){
            foreach($queryString as $key=>$value){
                $link.=$key.'='.$value.'&';
            }
            $link=rtrim($link,'&');
        }
        $link=rtrim($link,'?');
        return $link." >{$body}</a>";
    }
    function append_to_queryString(array $param){
        return array_merge( $_GET,$param);
    }
    function except_to_queryString(array $param){
        return array_diff_assoc($param,$_GET);
    }
    function isSort($column){
        if(!isset($_GET['sort'])){$_GET['sort']='';}
        return ($_GET['sort']==$column) ? 'sorting '.sortSign():'';
    }
    function sortSign(){
        return ($_GET['direction']=='asc')? 'glyphicon glyphicon-sort-by-attributes' : 'glyphicon glyphicon-sort-by-attributes-alt';
    }
    function redirect($uri,$contentType='location'){
        header("{$contentType}: {$uri}");
    }
    function isActive($param){
        return isset($_GET['url'])? (rtrim($_GET['url'],'/')==$param)? 'active':'' :'';
    }
    function hasMessage(){
        \Libs\Session::init();
        return \Libs\Session::get('message');
    }
    function hasErrors(){
        \Libs\Session::init();
        return isset($_SESSION['errors']);
    }
    function getErrors($key){
        return \Libs\Session::get('errors')[$key];
    }
    function oldInput($key){
        if(isset($_SESSION['old']) && isset($_SESSION['old'][$key])){
            return $_SESSION['old'][$key];
        }
        return false;
    }
    function decryptErrors($errors=array())
    {
        if(!empty($errors)){
            $er=explode(',', $errors);
            $err=array();
            for ($i=0; $i < count($er) ; $i=$i+2) {
                $err[$er[$i]]=$er[$i+1];
            }
            return $err;
        }
        return $errors;
    }
?>