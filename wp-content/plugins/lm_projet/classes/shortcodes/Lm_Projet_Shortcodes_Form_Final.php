<?php

add_shortcode('FORMULAIRE_FINAL', array('Lm_Projet_Shortcodes_Form_Final', 'display'));

class Lm_Projet_Shortcodes_Form_Final
{

    static function display()
    {

        $Lm_Projet_Crud_Index = new Lm_Projet_Crud_Index();

        //récupèrer la valeur du résultat grace au crud pour le mettre dans la variable Liste Pays
        $idProspect= $_GET['id'];
        $ListePays = $Lm_Projet_Crud_Index->getInfosProspect($idProspect);

        var_dump($ListePays[5]);

        $paysHTML = "";

        for($i=1; $i<6; $i++)
            foreach ($ListePays[4+$i] as $key) :
                $helper = new Lm_Projet_Helper();
                $paysHTML .= "<li> " . $helper->conversion_pays($key) . "</li>";
            endforeach;


        return "
        <script src=\"https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js\"></script>
        <script id=\"Script_Modal\" type=\"text/x-handlebars-template\" src=\"".plugins_url(LM_PROJET_PLUGIN_NAME."/assets/handlebars/Handlebars.hbs")."\"></script>
            Votre nom: " .implode($ListePays[0]). ",<br>
            Votre prénom:  " .implode($ListePays[1]).",<br>
            Votre sexe: " .implode($ListePays[2]).",<br>
            Votre email: " .implode($ListePays[3]).",<br>
            Votre date de naissance: " .implode($ListePays[4]).",<br>

            <ul class='lm_pays_list_container'>
            Vos choix de pays: " . $paysHTML. "
            </ul>
            <input type=\"button\" id=\"lm-form-final\" value=\"Oui, je valide les informations\">
            <div id='handlebarsModalBox'></div>
            ";
    }
}