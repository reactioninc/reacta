/////////////// CUSTOM ASSIGNABLE CTA INSTRUCTIONS

To ensure the best results, include all the default material below and then customize as needed.



////////TEMPLATES

To call a CTA, include this code in your template wherever you wish the CTA to appear. Ensure that the post or page using that template has a CTA relationship field created. The only data you need to change below is YOUR_RELATIONSHIP_FIELD. 
```
		
		<?php 

		$posts = get_field('YOUR_RELATIONSHIP_FIELD');
		
		if( $posts ): ?>
		
		    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		      
		      
				<?php 
					
					$layout = get_field('cta_layout');
					$partial = get_field('cta_partial_name');
					
					
								
					// checks layout option, default uses cta-block.php, else will use cta-CUSTOM-VALUE.php
					
					if( $layout == 'default') { ?>
					
					<?php echo get_template_part( 'partials/cta', 'block' ); ?>
					
					<?php } else { ?>
					
					<?php echo get_template_part( 'partials/cta', $partial ); ?>
					
				<?php }?>
		      
		     
		    <?php endforeach; ?>
		  
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		    
		<?php endif; ?>
```	
		
////////Partials

Ensure your theme has a partials folder containing a cta-block.php file with the following data:
```
<?php
/**
 * @package _rebase
 * see cta-readme.txt in CTA plugin for instructions
 */
 
 
$heading = get_field('cta_heading');
$sub_heading = get_field('cta_sub_heading');
$content = get_field('cta_content');
$link = get_field('cta_link');
$img = get_field('cta_background_image');

?>


<div class="cta-block" style="background-image:url(<?php echo $img;?>);">
	
	<a href="<?php echo $link;?>">
	
	<h2><?php echo $heading;?><span class="sub-heading"><?php echo $sub_heading;?></span></h2>
	<p class="lead"><?php echo $content;?></p>
	
	</a>
	
</div>
```

////////ACF


The following code should be used for your CTA ACF.

```
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5820e2bea5e9f',
	'title' => 'Call to Action',
	'fields' => array (
		array (
			'key' => 'field_5822174336433',
			'label' => 'CTA Content',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5822175f36434',
			'label' => 'Heading',
			'name' => 'cta_heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5822176b36435',
			'label' => 'Sub Heading',
			'name' => 'cta_sub_heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_58221799a07b1',
			'label' => 'Content',
			'name' => 'cta_content',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
		),
		array (
			'key' => 'field_582217c8a07b2',
			'label' => 'Link Type',
			'name' => 'cta_link_type',
			'type' => 'radio',
			'instructions' => 'Choose the type of link this will be',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'internal_link' => 'Internal URL (for links inside your website)',
				'external_link' => 'External URL (for links outside your website)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'internal_link',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array (
			'key' => 'field_5824dfd9fbc57',
			'label' => 'External URL',
			'name' => 'cta_link_external',
			'type' => 'url',
			'instructions' => 'Add the URL where this CTA should take the user when clicked.',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_582217c8a07b2',
						'operator' => '==',
						'value' => 'external_link',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5824e1497397b',
			'label' => 'Internal URL',
			'name' => 'cta_link_internal',
			'type' => 'page_link',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_582217c8a07b2',
						'operator' => '==',
						'value' => 'internal_link',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'allow_archives' => 0,
			'multiple' => 0,
		),
		array (
			'key' => 'field_582218a5fdd73',
			'label' => 'Background Image',
			'name' => 'cta_background_image',
			'type' => 'image',
			'instructions' => 'Choose an image for the background of your CTA',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => 1,
			'mime_types' => '',
		),
		array (
			'key' => 'field_582216691aa82',
			'label' => 'Layout Options',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_582215a01aa81',
			'label' => 'Layout',
			'name' => 'cta_layout',
			'type' => 'radio',
			'instructions' => 'Choose your layout. By default, your Call to Action will include the general fields and styles created for the CTA section. <br />
<strong>Please note: Custom HTML layouts are for developers only.</strong>',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'default' => 'Default',
				'custom_html' => 'Custom HTML',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'default',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array (
			'key' => 'field_5822167d1aa83',
			'label' => 'Partial Name',
			'name' => 'cta_partial_name',
			'type' => 'text',
			'instructions' => 'Add the get_template_part partial location for the custom CTA (assumes file begins with cta-).',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_582215a01aa81',
						'operator' => '==',
						'value' => 'custom_html',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'block',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'cta',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'custom_fields',
		3 => 'discussion',
		4 => 'comments',
		5 => 'slug',
		6 => 'author',
		7 => 'format',
		8 => 'page_attributes',
		9 => 'featured_image',
		10 => 'categories',
		11 => 'tags',
		12 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;
```




