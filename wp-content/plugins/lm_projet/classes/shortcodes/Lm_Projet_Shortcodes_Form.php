<?php
add_shortcode('INSCRIPTION', array('Lm_Projet_Shortcodes_Form', 'display'));

class Lm_Projet_Shortcodes_Form {

    static public function display($atts) {


        $atts= '<form id="prospect_inscription">
                <fieldset>
                    <legend><?php _e("Your coords") ?></legend>
                    <div>
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                        <label for="mail">Mail</label>
                        <input type="text" id="mail" name="mail">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" required="required">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                        <label for="dateNaissance">Date de Naissance</label>
                        <input type="date" id="dateNaissance" name="dateNaissance">
                        <button id="btn">Submit</button>
                    </div>
                </fieldset>
            </form>';

        return $atts;       

        

    }

}