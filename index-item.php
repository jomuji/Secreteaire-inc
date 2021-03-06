<?php 

/**
 * Job list item
 * 
 * This template is responsible for displaying job list item on job list page
 * (template index.php) it is alos used in live search
 * 
 * @author Greg Winiarski
 * @package Templates
 * @subpackage JobBoard
 */

 /* @var $job Wpjb_Model_Job */

?>

    <div class="wpjb-grid-row wpjb-click-area <?php wpjb_job_features($job); ?>">
        <div class="col-xs-2">
            <?php if($job->doScheme("company_logo")): ?>
            <?php elseif($job->getLogoUrl()): ?>
            <div class="">
                <img src="<?php echo $job->getLogoUrl() ?>" alt="" class="img-responsive" style="" />
            </div>
            <?php else: ?>
            <div class="wpjb-img-36 wpjb-icon-none">
                <span class="wpjb-glyphs wpjb-icon-building wpjb-icon-36"></span>
            </div>
            <?php endif; ?>
        </div>
    
        <div class="col-xs-4">
            <span class="wpjb-line-major">
                <h5><a href="<?php echo wpjb_link_to("job", $job) ?>"><?php esc_html_e($job->job_title) ?></a></h5>
            </span>
            
            <?php if($job->doScheme("company_name")): else: ?>
            <span class="wpjb-sub wpjb-sub-small"><i class="fa fa-building"></i> <?php esc_html_e($job->company_name) ?></span>
            <?php endif; ?>
        </div>
        
        <div class="col-xs-4">
            <span class="wpjb-line-major">
                <span class="wpjb-glyphs wpjb-icon-location"><?php esc_html_e($job->locationToString()) ?></span>
            </span>
            
            <?php if(isset($job->getTag()->type[0])): ?>
            <span class="wpjb-sub wpjb-sub-small" style="background-color:#<?php echo $job->getTag()->type[0]->meta->color ?>; color:#fff">
                <span class="label" style="background-color:#<?php echo $job->getTag()->type[0]->meta->color ?>; color:#fff"><?php esc_html_e($job->getTag()->type[0]->title) ?></span>
            </span>
            <?php endif; ?>
        </div>
        
        <div class="col-xs-2 wpjb-grid-col-last">
            <span class="wpjb-line-major">
                <i class="fa fa-calendar"></i> <?php echo wpjb_date_display("d M", $job->job_created_at, false); ?>
            </span>
            
            <span class="wpjb-sub">
                <?php if($job->isNew()): ?><span class="wpjb-bulb"><?php _e("Nouveau", "wpjobboard") ?></span><?php endif; ?>
            </span>
            
        </div>
    </div>