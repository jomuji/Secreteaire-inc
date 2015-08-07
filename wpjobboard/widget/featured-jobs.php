<?php

/**
 * Featured Jobs
 * 
 * Featured jobs widget template file
 * 
 * 
 * @author Greg Winiarski
 * @package Templates
 * @subpackage Widget
 * 
 */

 /* @var $jobList array List of Wpjb_Model_Job objects */

?>

<?php echo $theme->before_widget ?>
<?php if($title) echo $theme->before_title.$title.$theme->after_title ?>
<?php //$company = $job->getCompany(true); ?>

<div class="wpjb wpjb-widget">
    <div class="wpjb-grid wpjb-grid-compact wpjb-grid-closed-top">
        <?php if(!empty($jobList)): foreach($jobList as $job): ?>
        <div class="wpjb-grid-row">
            <div class="row">
                <div class="col-xs-4 col-sm-2">
                <?php if($job->doScheme("company_logo")): ?>
                <?php elseif($job->getLogoUrl()): ?>
                <img src="<?php echo $job->getLogoUrl() ?>" alt="" class="img-responsive" />
                <?php else: ?>
                <span class="wpjb-glyphs wpjb-icon-building wpjb-icon-only wpjb-icon-64"></span>
                <?php endif; ?>
                </div>
                
                <div class="col-xs-8">
                <h5><a href="<?php echo wpjb_link_to("job", $job) ?>"><?php esc_html_e($job->job_title) ?></a></h5>
                <span class="wpjb-sub"><i class="fa fa-map-marker"></i><?php esc_html_e($job->locationToString()); ?> </span>
                <?php foreach($job->getTag()->category as $category): ?>
                    <span class="wpjb-sub"><i class="fa fa-folder-open"></i><a href="<?php esc_attr_e(wpjb_link_to("category", $category)) ?>"><span itemprop="employmentType"><?php esc_html_e($category->title) ?></span></a></span>
                <?php endforeach; ?>
                </div>
                <div class="col-xs-1">
                <i class="glyphicon glyphicon-star"></i>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="wpjb-grid-row">
            <div class="wpjb-col-100">
                <span><?php _e("No featured jobs found.", "wpjobboard") ?></span>
            </div>
        </div>
        <?php endif; ?> 
    </div>
</div>

<?php echo $theme->after_widget ?>