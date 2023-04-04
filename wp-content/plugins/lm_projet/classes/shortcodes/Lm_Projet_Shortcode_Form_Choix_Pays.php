<?php

add_shortcode('CHOIX_PAYS', array('Lm_Projet_Shortcode_Form_Choix_Pays', 'display'));

class Lm_Projet_Shortcode_Form_Choix_Pays
{

    static function display($atts)
    {

        $Lm_Projet_Crud_Index = new Lm_Projet_Crud_Index();

        $ListePays = $Lm_Projet_Crud_Index->getAge();
        $paysListe = "";


        foreach ($ListePays as $Liste) :
            $paysListe .= '<option value="' . $Liste['id'] . '">' . $Liste['pays'] ." note : " . $Liste['note'] . '</option>';
        endforeach;

        //fomulaire en html pour sélectionner les pays
        return "<form id='lm_projet_pays_selectionnes'>
            
        <h3>Liste des pays</h3>
        
        <div>
            <label >Selectionnez votre pays</label>
            <select name='pays1' id='lm_projet_pays1' required='required'  style='display: block;'>
            <option > Veuillez sélectionner un 1er pays </option>" . $paysListe . "
            </select>
        </div>

        <div class='disable-select-pays' id='pays2_container'>
            <label >Selectionnez votre pays</label>
            <select name='pays2' id='lm_projet_pays2'  style='display: block;'>
            <option> Veuillez sélectionner un second pays </option> " . $paysListe . "
            </select>
        </div>

        <div class='disable-select-pays' id='pays3_container'>
            <label>Selectionnez votre pays</label>
            <select name='pays3' id='lm_projet_pays3'  style='display: block;'>
            <option >Veuillez sélectionner un troisième pays</option> " . $paysListe . "
            </select>
        </div>

        <div class='disable-select-pays' id='pays4_container'>
            <label> Selectionnez votre pays</label>
            <select name='pays4' id='lm_projet_pays4'  style='display: block;'>
            <option> Veuillez sélectionner un quatrième pays  </option> " . $paysListe . "
           </select>
        </div>
        
        <div class='disable-select-pays' id='pays5_container'>
            <label> Selectionnez votre pays</label>
            <select name='pays5' id='lm_projet_pays5'  style='display: block;'>
            <option> Veuillez sélectionner un dernier pays  </option> " . $paysListe . "
           </select>
        </div>
        
            <button class='disable-select-pays' id='lm_projet_pays_selectionnes-submit'>Je valide mes choix</button>
        </form>";


    }
}