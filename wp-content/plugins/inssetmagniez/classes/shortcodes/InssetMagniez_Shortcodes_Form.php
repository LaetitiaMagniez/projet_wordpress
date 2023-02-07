<?php

class InssetMagniez_Shortcodes_Form {

    static public function display($atts) {

        $InssetMagniez_Helper_Index = new InssetMagniez_Helper_Index();
        $isOpen = $InssetMagniez_Helper_Index->isOpen();
        if(!$isOpen)
            return __('Formulaire fermé');
        
        
        $atts= '<form id="robert">
                <fieldset>
                    <legend><?php _e("Your coords") ?></legend>
                    <div>
                        <label for="firstname">Firstname</label>
                        <input type="text" id="firstname" name="firstname">
                        <label for="lastname">Lastname</label>
                        <input type="text" id="lastname" name="lastname">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email">
                        <label for="zipcode">Zip code</label>
                        <input type="text" id="zipcode" name="zipcode">
                    </div>
                </fieldset>
                <button id="btn">Submit</button>
            </form>';

        return $atts;       

        

    }

}