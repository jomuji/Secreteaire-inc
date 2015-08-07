<?php

/**
 * Recently posted jobs
 * 
 * Recent jobs widget template file
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

<div class="wpjb wpjb-widget">
    <div class="wpjb-grid wpjb-grid-compact wpjb-grid-closed-top">
        <?php if(!empty($jobs->job)): foreach($jobs->job as $job): ?>
        <div class="wpjb-grid-row">
            <div class="col-xs-4 col-sm-2">
                <?php if($job->doScheme("company_logo")): ?>
                <?php elseif($job->getLogoUrl()): ?>
                <img src="<?php echo $job->getLogoUrl() ?>" alt="" class="img-responsive" />
                <?php else: ?>
                <span class="wpjb-glyphs wpjb-icon-building wpjb-icon-only wpjb-icon-64"></span>
                <?php endif; ?>
            </div>
            <div class="col-xs-7 col-sm-8">
                <h5><a href="<?php echo wpjb_link_to("job", $job) ?>"><?php esc_html_e($job->job_title) ?></a></h5>
                <span class="wpjb-sub"><i class="wpjb-glyphs wpjb-icon-location"></i><?php esc_html_e($job->locationToString()); ?></span>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="">
            <div class="row">
                <span class="col-xs-12">           
                    <a class="btn btn-block btn-lg btn-primary" href="<?php echo wpjb_url() ?>"><?php _e("Voir toutes les offres", "wpjobboard") ?><span class="wpjb-glyphs wpjb-icon-right-open"></span></a>
                    
                </span>
            </div>
        </div>
        <?php else: ?>
        <div class="wpjb-grid-row">
            <div class="wpjb-col-100">
                <span><?php _e("No job listings found.", "wpjobboard") ?></span>
            </div>
        </div>
        <?php endif; ?> 
    </div>
</div>

<?php echo $theme->after_widget ?>