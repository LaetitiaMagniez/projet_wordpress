<?php
add_shortcode('INSCRIPTION', array('Lm_Projet_Shortcodes_Form', 'display'));

class Lm_Projet_Shortcodes_Form {

    static public function display($atts) {


        $atts= '<form id="prospect_inscription">
                <fieldset>
                    <legend> Vos informations</legend>
                    <div>
                        <label for="prenom">Votre Prénom</label>
                            <input type="text" id="prenom" name="prenom">
                        <label for="nom"> Votre Nom</label>
                            <input type="text" id="nom" name="nom">
                        <label for="mail">Votre Mail</label>
                            <input type="text" id="mail" name="mail">
                        <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" required="required" style="display: block">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        <label for="dateNaissance">Date de Naissance</label>
                        <input type="date" id="dateNaissance" name="dateNaissance">
                        <button id="btn-inscription">Suivant</button>
                    </div>
                </fieldset>
            </form>';

        return $atts;       

        

    }

}