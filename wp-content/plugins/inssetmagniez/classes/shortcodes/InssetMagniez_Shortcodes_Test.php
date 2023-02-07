<?php


class InssetMagniez_Shortcodes_Test {
    
    static public function test(){
        return serialize(get_query_var('mavariabletest'));
    }

}    