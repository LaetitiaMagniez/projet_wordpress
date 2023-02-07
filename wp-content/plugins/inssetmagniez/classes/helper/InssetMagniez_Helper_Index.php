<?php

class InssetMagniez_Helper_Index {

    public function isOpen()
    {

        $configs = InssetMagniez_CRUD_Index::getConfigs();
        foreach ($configs as $config)
            if($id = $config['id'])
                $$id  = $config['value'];
            
        if(!@$dateOuverture || !@$dateFermeture)
            return false;
            

        $start_at = strtotime($dateOuverture);
        $end_at = strtotime($dateFermeture);
        $now = strtotime(date('Y-m-d H:i'));

        return($now >= $start_at && $now <= $end_at);
                
    
    }
}