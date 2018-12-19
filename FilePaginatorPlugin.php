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
    protected $_hooks = array('public_head');

    public function hookPublicHead($args)
    {   
        queue_js_file('jquery.simplePagination');
        queue_css_file('simplePagination');
        
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