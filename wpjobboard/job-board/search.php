<?php 

/**
 * Advanced search form
 * 
 * Displays advanced search form
 * 
 * @author Greg Winiarski
 * @package Templates
 * @subpackage JobBoard
 */

 /* @var $form Wpjb_Form_AdvancedSearch */

?>

<div class="wpjb wpjb-page-search">

    <?php if($show_results): ?>
    <div class="wpjb-layer-inside wpjb-refine-search">
        <span class="wpjb-refine-query"><?php echo $readable ?></span>
        <span class="wpjb-refine-actions">
            <a href="#" class="wpjb-button wpjb-refine-button"><?php _e("Refine Search", "wpjobboard") ?><span class="wpjb-glyphs wpjb-icon-down-open"></span></a>
            <a href="#" class="wpjb-button wpjb-subscribe wpjb-glyphs wpjb-icon-bell-alt"><?php _e("Subscribe To This Search", "wpjobboard") ?></a>
        </span>
    
    <?php endif; ?>
    <div id="recherche-avancee">
    <form action="<?php echo wpjb_link_to("search") ?>" method="get" class="wpjb-form wpjb-form-to-refine <?php if($show_results): ?>wpjb-none<?php endif; ?>">
        <?php echo $form->renderHidden() ?>
        <?php foreach($form->getReordered() as $group): ?>
        <?php /* @var $group stdClass */ ?> 
        <fieldset class="wpjb-fieldset-<?php esc_attr_e($group->getName()) ?>">
            <legend class="wpjb-empty"><?php esc_html_e($group->title) ?></legend>
            <?php foreach($group->getReordered() as $name => $field): ?>
            <?php /* @var $field Daq_Form_Element */ ?>
            <div class="<?php wpjb_form_input_features($field) ?>">

                <label class="wpjb-label">
                    <?php esc_html_e($field->getLabel()) ?>
                    <?php if($field->isRequired()): ?><span class="wpjb-required">*</span><?php endif; ?>
                </label>
                
                <div class="wpjb-field">
                    <?php wpjb_form_render_input($form, $field) ?>
                    <?php wpjb_form_input_hint($field) ?>
                    <?php wpjb_form_input_errors($field) ?>
                </div>

            </div>
            <?php endforeach; ?>
        </fieldset>
        <?php endforeach; ?>
        <fieldset>
            <legend class="wpjb-empty"></legend>
            <input type="submit" class="wpjb-submit" id="wpjb_submit" value="<?php _e("Rechercher", "wpjobboard") ?>" />
        </fieldset>

    </form>
    </div>
    
    <?php if($show_results): ?>
    </div>
    <div class="wpjb-job-list wpjb-grid">
    
        <?php $result = wpjb_find_jobs($param) ?>
        <?php if ($result->count) : foreach($result->job as $job): ?>
        <?php /* @var $job Wpjb_Model_Job */ ?>
        <?php $this->job = $job; ?>
        <?php $this->render("index-item.php") ?>
        <?php endforeach; else :?>
        <div class="wpjb-grid-row">
            <?php _e("No job listings found.", "wpjobboard"); ?>
        </div>
        <?php endif; ?>
    

    </div>
 

    <?php if($pagination): ?>
    <div class="wpjb-paginate-links">
        <?php wpjb_paginate_links($url, $result->pages, $result->page, $query, $format) ?>
    </div>
    <?php endif; ?>
    
    <!-- Begin: Subscribe to anything -->
    <?php Wpjb_Project::getInstance()->setEnv("search_feed_url", $result->url->feed);  ?>
    <?php Wpjb_Project::getInstance()->setEnv("search_params", $param);  ?>
    <?php add_action("wp_footer", "wpjb_subscribe") ?>
    <!-- End: Subscribe to anything -->

    <?php endif; ?>

</div>

