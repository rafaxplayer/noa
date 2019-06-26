<div class="noa-instagram-widget" style="max-width: <?php echo absint( $instance['container_size'] ); ?>px; margin: -<?php echo esc_attr( $instance['photo_space']/2 ); ?>px;">
		
	<?php if ( !empty($photos) ): ?>

		<?php foreach ( $photos as $photo ): ?>
		
			<div class="insta-item" style="padding: <?php echo esc_attr( $instance['photo_space']/2 ); ?>px; -webkit-box-flex: 0;-ms-flex: 0 0 <?php echo esc_attr( $size['flex'] ); ?>%; flex: 0 0 <?php echo esc_attr( $size['flex'] ); ?>%; ">
				
					
				<img src="<?php echo esc_attr( $photo[$size['thumbnail']] ); ?>" alt="<?php echo esc_attr( $photo['caption'] ); ?>">
						
					
				<a href="<?php echo esc_attr( $photo['link'] ); ?>" class="insta-img-wrapp" title="<?php echo esc_attr( $photo['caption'] ); ?>" target="_blank" rel="nofollow"></a>
					
			</div>

		<?php endforeach; ?>

	<?php endif; ?>

</div>

<?php if ( !empty($instance['link_text']) && !empty($follow_link) ): ?>
	
	<p class="noa-instagram-follow-link">
		<a href="<?php echo esc_attr( $follow_link ) ?>" target="_blank" rel="nofollow" class="mks_author_link noa-widget-cta"><i class="fa fa-instagram"></i> <?php echo esc_html( $instance['link_text'] ); ?></a>
	</p>

<?php endif; ?>