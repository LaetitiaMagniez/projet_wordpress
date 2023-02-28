<?php

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH .'wp-admin/includes/screen.php');
    require_once(ABSPATH .'wp-admin/includes/class-wp-list-table.php');
}

class Lm_Projet_Wp_List extends WP_List_Table
{
    public $_program;
    public $_screen;

    public function __construct($program = NULL) {

        $this->_program = $program;

        $tempscreen = get_current_screen();
        $this->_screen = $tempscreen->base;

        parent::__construct( [
            'singular' => __('Item', 'sp'),
            'plural'   => __('Items', 'sp'),
            'ajax'     => false
        ]);

    }

    public function prepare_items() {

        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $data = $this->table_data();
        $currentPage = $this->get_pagenum();

        $perPage = 10;
        $this->set_pagination_args(array(
            'total_items' => count($data),
            'per_page'    => $perPage
        ));

        $data = array_slice($data, (($currentPage-1)*$perPage), $perPage);

        $this->items = $data;

    }

    public function get_columns($columns = array()) {


        $note = '<form action="#">
                        <select name="cars" id="cars">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                </form>         ';

        $accessible = '<input type="checkbox" id="accessible" name="accessible" >';

        $columns['pays'] = __('pays');
        $columns['code_ISO'] = __('code ISO');
        $columns['note'] = __('note');
        $columns['accessible'] = __('accessible aux majeurs uniquement');
        return $columns;

    }

    public function get_hidden_columns($default = array()) {

        return $default;

    }

    public function get_sortable_columns($sortable = array()) {

        global $wpdb;

        $sql = "SELECT DISTINCT `pays` FROM " . $wpdb->prefix . LM_PROJET_BASENAME . '_countries' ." WHERE `code_ISO` !='' ";

        $result = $wpdb->get_results($sql, 'ARRAY_A');

        foreach ($result as $value)
            $sortable[$value["pays"]] = array($value["pays"], true);

        $sortable["pays"] = array('pays', true);
        $sortable["code_ISO"] = array('code_ISO', true);
        $sortable["note"] = array('note', true);
        $sortable["acessible_majeur_uniquement"] = array('acessible_majeur_uniquement', true);

        return $sortable;
    }

    public function table_data($per_page=10, $page_number=1, $orderbydefault=false) {

        global $wpdb;

        $sql = "SELECT `pays`,`code_ISO` FROM " . $wpdb->prefix . LM_PROJET_BASENAME . '_countries' ;


        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY `'. esc_sql($_REQUEST['orderby']) .'`';
            $sql .= ! empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }

        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;

    }

    public function column_default( $item, $column_name ) {

        if (preg_match('/note/i',$column_name))
            return self::getNote($item);

        if (preg_match('/accessible/i',$column_name))
            return self::getAccessibilite($item);

        return @$item[$column_name];

    }

    private function getNote($id=0) {

        if (!$id)
            return;

        return  sprintf(
            '<select data-id="%d" class="note">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>',
            $id,
            __('note')
        );
    }

    private function getAccessibilite($id=0) {

        if (!$id)
            return;

        return  sprintf(
            '<input type="checkbox" data-id="%d" class="accessible">',
            $id,
            __('accessible')
        );
    }


}
