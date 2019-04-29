<?php 
/**
* File Paginator
* @copyright Copyright 2018 Ken Albers
* @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
*/

/**
 * File Paginator Plugin
 * @package  File Paginator
 */

class FilePaginatorPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'public_head',
        'config', 
        'config_form',
        );

    protected $_filters = array(
        'files_for_item',
        'file_markup'
    );

    public function hookPublicHead($args)
    {   
        queue_js_file('jquery.simplePagination');
        queue_js_file('filePagination');
        queue_css_file('simplePagination');
        
    }

    public function hookConfig($args){
        $post = $args['post'];
        set_option('file_paginator_theme',$post['theme']);
        set_option('file_paginator_links'),$post['links'];
    }

    public function hookConfigForm() {
        include('config_form.php');
    }

    public function filterFilesForItem($html) {
        return '<div id="pagination"></div>'.$html;
    }

    public function filterFileMarkup($html,$args) {
        $file = $args['file'];
        $options =  $args['options'];
        if (empty($options['filesForItem'])) {
            return $html;
        }
        return '<div class="single-file">'
            . $html
            . all_element_texts($file, array('show_element_set_headings' => false))
            . '</div>';
    }

    public static function paginateFiles() {
        echo '<div id="pagination"></div>';
        $item = get_current_record('item');
        set_loop_records('files', $item->Files);
        foreach (loop('files') as $file):
            echo '<div class="single-file">';
            echo file_markup($file);
            echo all_element_texts($file, array('show_element_set_headings' => false));
            echo '</div>';
        endforeach;

    }
}
?>