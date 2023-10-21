<?php
/**
*  Created by   :
*  @author		: Ong The Thanh
*  @date		: 2012/01/23
*  @version		: 0.0.1
*/ 
class Page extends dbBasic{
	function __construct(){
		$this->pkey = 'page_id';
		$this->tbl = DB_PREFIX.'page';
	}
    function getTitle($_id) {
        if(!$_id) return '';
        $res = $this->getOne($_id);
        return $res['title'];
    }
    function getLink($_id) {
        $res = $this->getOne($_id);
        return PCMS_URL.'/'.$res['slug'].'-p'.$_id.'.html';
    }
}
?>