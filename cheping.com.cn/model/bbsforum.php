<?php

class bbsforum extends model {

    function __construct() {
        parent::__construct();
        $this->table_name = "cp_forum";
    }

    function getSelect($field = '*', $where = 1, $type = 2) {
        $this->fields = $field;
        $this->where = $where;
        $res = $this->getResult($type);
        if($res){
            return $res;
        }else{
            return FALSE;
        }
    }
}
?>
