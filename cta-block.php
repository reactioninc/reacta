<?php
/**
 * @package _rebase
 * see cta-readme.txt in CTA plugin for instructions
 */
 
 
$heading = get_field('cta_heading');
$sub_heading = get_field('cta_sub_heading');
$content = get_field('cta_content');
$link_type = get_field('cta_link_type');
$img = get_field('cta_background_image');

	
	if( $link_type == 'internal_link') { 

		$link = get_field('cta_link_internal');

	} else if( $link_type == 'external_link') {

		$link = get_field('cta_link_external');

	} else { 

		$link = 'null';

	}

?>


<div class="cta-block" style="background-image:url(<?php echo $img;?>);">
	
	<?php if($link == 'null'){
		} else { ?>
			<a href="<?php echo $link;?>">
	<?php }?>
	
	<h2><?php echo $heading;?><span class="sub-heading"><?php echo $sub_heading;?></span></h2>
	<p class="lead"><?php echo $content;?></p>
	
	
	<?php if($link == 'null'){
		} else { ?>
			</a>
	<?php }?>
	
</div>