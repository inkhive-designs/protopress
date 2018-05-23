<div id="slickmenu"></div>
<nav id="site-navigation" class="main-navigation" role="navigation">
    <div class="container">
        <?php

        $walker = new Protopress_Menu_With_Icon;
        $walker = new Protopress_Menu_With_Description;
//            if (!has_nav_menu('primary')) { $walker = ''; }
//            wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) );
        // Get the Appropriate Walker First.

        if (!has_nav_menu(  'primary' ) && !get_theme_mod('protopress_disable_nav_desc') ) {
            $walker = '';
        }
        //Display the Menu.
        wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
    </div>
</nav><!-- #site-navigation -->