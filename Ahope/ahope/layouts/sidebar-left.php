<?php
if ( ahope_theme_options('sidebar') ) {
	do_action('ahope_sidebar');
} else {
	if ( is_active_sidebar('sidebar-1')){
		echo '<div class="side_bar">';
		dynamic_sidebar('sidebar-1');
		echo '</div>';
	}
}
?>

