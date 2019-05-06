<?php $view=get_view(); ?>

<div id="file-paginator-options">
    <div class="field">
        <div class="two columns alpha">
             <?php echo $view->formLabel('theme', __('Theme')); ?>
        </div>
        <div class="inputs five columns omega">
            <?php echo $view->formSelect('theme', get_option('file_paginator_theme'), null, array('light-theme' => __('Light'), 'dark-theme' => __('Dark'), 'compact-theme' => __('Compact'))); ?>
        </div>
        <div class="two columns alpha">
            <?php echo $view->formLabel('links', __('Links')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Check the box below to launch files into new tabs on click.'); ?></p>
            <?php echo $view->formCheckbox('links', get_option('file_paginator_links'),null, array('1','0')); ?>
        </div>
        <div class="two columns alpha">
            <?php echo $view->formLabel('metadata', __('Metadata')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Check the box below to show file metadata.'); ?></p>
            <?php echo $view->formCheckbox('metadata', get_option('file_paginator_metadata'),null, array('1', '0')); ?>
        </div>
    </div>
</div>