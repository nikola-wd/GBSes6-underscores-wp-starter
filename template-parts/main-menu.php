<header class="header">
	<nav class="navbar navbar-expand-md navbar-light bg-faded">
   <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <img src="https://www.placehold.it/80x80" />
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <?php
   wp_nav_menu([
     'menu'            => 'top',
     'theme_location'  => 'menu-1',
     'container'       => 'div',
     'container_id'    => 'bs4navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => 'primary-menu',
     'menu_class'      => 'navbar-nav ml-auto',
     'depth'           => 2,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
   ]); ?>
	</nav>
</header><!-- .header -->