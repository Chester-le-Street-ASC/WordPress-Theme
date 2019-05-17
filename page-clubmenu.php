<?php

wp_nav_menu( array(
  'menu'              => 'primary',
  'theme_location'    => 'primary',
  'depth'             => 2,
  'container'         => 'div',
  'container_class'   => 'collapse navbar-collapse',
  'container_id'      => 'chesterNavbar',
  'menu_class'        => 'nav navbar-nav mr-auto',
  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
  'walker'            => new WP_Bootstrap_Navwalker())
);

?>
