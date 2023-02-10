<?php

class Lm_Projet_Views_Configuration
{
    public function display(){

        $configs = Lm_Projet_Crud_Index::getCountriesNames();

        ?>

        <div class="wrap" id="lm_projet_param_update">
            <h1 class="wp-heading-inline"><?php print get_admin_page_title(); ?></h1>

            <div class="notice notice-info notice-alt is-dismissible hide update-message">
                <p><?php _e('Successfully updated!'); ?></p>
            </div>
            <form action="#">
                <label for="cars">Choisissez les pays qui doivent être disponibles: </label>
                <select name="cars" id="cars" multiple>
                    <?php foreach ($configs as $config): ?>
                    <option value="<?php print $config['pays'] ?>" id="lm_projet_disponible"><?php print $config['pays'] ?></option>
                    <?php endforeach ?>
                </select>
            </form>
            <button class="button button-primary left update" id="updateButton">
                <i class="fas fa-check"></i>
                <?php _e('Update'); ?>
            </button>
        </div>

        <?php
    }
}