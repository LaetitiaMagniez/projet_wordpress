<?php

class Lm_Projet_Views_Liste_Pays
{
    public function display() {


        $tempscreen = get_current_screen();
        $this->_screen = $tempscreen->base;
        $Wp_List = new Lm_Projet_Wp_List();

        ?>
        <div class="wrap">
        <h1 class="wp-heading-inline"><?php print get_admin_page_title(); ?></h1>
        <hr class="wp-header-end" />
        <div class="notice notice-info notice-alt is-dismissible hide delete-confirmation">
            <p><?php _e('Mise à jour effectuée avec succès !'); ?></p>
        </div>
          <?php self::toolbar(); ?>
        <div class="wrap" id="list-table">
            <form id="list-table-form" method="post">
                <?php
                $page  = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );
                $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
                printf('<input type="hidden" name="page" value="%s" />', $page);
                printf('<input type="hidden" name="paged" value="%d" />', $paged);
                $Wp_List->prepare_items();
                $Wp_List->display();
                ?>
            </form>
        </div>
        <div>
        <?php

    }

    private function toolbar()
    {

        ?>

        <div>
            <form action="<?php print admin_url('admin-post.php'); ?>" method="post">
            <table>
                <tbody>
                    <tr>
                        <?php if(defined('LM_PROJET_PLUGIN_NAME')) : ?>
                        <td>
                            <a class="button btn-secondary" href ="<?php print plugins_url(LM_PROJET_PLUGIN_NAME .
                            '/classes/export/Lm_Projet_Export_Pays_XML.php'); ?>">
                                <i class="fas fa-save"></i> XML
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <hr class="wp-header-end" />

    <?php

    }
}