<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" value="" placeholder="<?php _e( 'Enter text to search', 'noa' ); ?>" name="s" class="s" /> 
	<input type="submit" class="searchsubmit" value="<?php _e( 'Search', 'noa' ); ?>">
</form>