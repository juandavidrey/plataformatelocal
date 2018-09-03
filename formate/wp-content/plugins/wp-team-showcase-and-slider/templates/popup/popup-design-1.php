<?php
	$feat_image 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$member_designation = get_post_meta($post->ID, '_member_designation', true);
	$member_department 	= get_post_meta($post->ID, '_member_department', true); 
	$skills 			= get_post_meta($post->ID, '_skills', true);
	$member_experience 	= get_post_meta($post->ID, '_member_experience', true); 
	$facebook_link 		= get_post_meta($post->ID, '_facebook_link', true);
	$google_link 		= get_post_meta($post->ID, '_google_link', true); 
	$likdin_link 		= get_post_meta($post->ID, '_likdin_link', true);
	$twitter_link 		= get_post_meta($post->ID, '_twitter_link', true); 
?>
	
	<div id="popup-<?php echo $popup_id. '-' .$i; ?>" class="mfp-hide white-popup-block wp-tsas-popup-wrp">		
			  <header>
				<div class="wp-modal-header ng-scope" style="background:url(<?php echo $feat_image ?>) center top no-repeat;">					
						<div class="member-popup-info">
						<div class="member-name"><?php the_title(); ?></div>							
						<?php if($member_designation != '' || $member_department!= ''){ ?>
							<div class="member-job"> 
								<?php echo ($member_designation != '' ? $member_designation : '');
								echo ($member_designation != '' && $member_department != '' ? ' - ' : '');
								echo ($member_department != '' ? $member_department : ''); ?>
							</div>
							<?php } ?>
						</div>
						</div>
			  </header>
			  <div class="wp-modal-body">
			  <?php if($skills != '' || $member_experience != '') { ?>	
					<div class="other-info">
					<?php echo ($skills != '' ? $skills : '');
						  echo ($skills != '' && $member_experience != '' ? ' - ' : '');
						  echo ($member_experience != '' ? $member_experience : ''); ?>
					</div>		
				<?php } 
				if($facebook_link != '' || $likdin_link != '' || $twitter_link != '' || $google_link != '') { ?>
					<div class="contact-content">
					<?php if($facebook_link != '') { ?><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook"></i></a> <?php }						
							if($likdin_link != '') { ?><a target="_blank" href="<?php echo $likdin_link; ?>"><i class="fa fa-linkedin"></i></a> <?php } 
							if($twitter_link != '') {?><a target="_blank" href="<?php echo $twitter_link; ?>"><i class="fa fa-twitter"></i></a> <?php }
							if($google_link != '') { ?><a target="_blank" href="<?php echo $google_link; ?>"><i class="fa fa-google-plus"></i></a> <?php } ?>
					</div>	
					<?php } 
					the_content(); ?>
				
			  </div>
</div>