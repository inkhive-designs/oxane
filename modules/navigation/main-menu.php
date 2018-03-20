<div id="slickmenu"></div>
<?php $class = get_header_image() ?  'color-light' : 'color-dark' ;  ?>
<nav id="site-navigation" class="main-navigation front <?php echo $class; ?>" role="navigation">
    <?php
    // Get the Appropriate Walker First.
    $walker = has_nav_menu('primary') ? new Oxane_Menu_With_Icon : '';
    //Display the Menu.
    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
</nav><!-- #site-navigation -->