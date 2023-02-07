<?php

class InssetMagniez_Views_Config {

    public function display() {

        $configs = InssetMagniez_CRUD_Index::getConfigs();
        ?>

            <div class="wrap" id="insset_param_update">
                <h1 class="wp-heading-inline"><?php print get_admin_page_title(); ?></h1>
                
                <div class="notice notice-info notice-alt is-dismissible hide update-message">
                    <p><?php _e('Successfully updated!'); ?></p>
                </div>
                <table class="wp-list-table widefat fixed striped">
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <button class="button button-primary left update" id="updateButton">
                                    <i class="fas fa-check"></i>
                                    <?php _e('Update'); ?>
                                </button>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($configs as $config): ?>
                                <tr>
                                    <th class="smallwidth" style="text-transform: capitalize;">
                                        <?php print $config['id'] ?>
                                    </th>
                                    <td>
                                        <?php if (preg_match('/date/i', $config['id'])): ?>
                                            <input type="datetime-local" id="<?php print $config['id'] ?>" value="<?php print preg_replace('/\s/', 'T', $config['value']) ?>" />
                                        <?php else: ?>
                                            <input id="<?php print $config['id'] ?>" type="text" value="<?php print $config['value'] ?>" />
                                        <?php endif; ?>
                                        <span class="helper-text">
                                            <?php print $config['description'] ?>
                                        </span>
                                    </td>
                                </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
		
		<?php
    }
}