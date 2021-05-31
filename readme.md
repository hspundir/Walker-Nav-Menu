1. This is a updated walker nav menu file 
2. This file allow to bootstrap 4 classes
2. Third level menu avaible here
3. Put this walker file in theme directory 
4. call file in fucntion.php file then add class Walker_Bootsrap_Nav_Menu() in wp_nav_menu.
5. add this code in header file
 if ( has_nav_menu( 'bootstrap-main-menu' ) ) {
                            wp_nav_menu( array(
                            'theme_location'    => 'bootstrap-main-menu',
                            'container'         => false,
                            'menu_class'        => 'navbar-nav ml-auto',
                            'depth'             => 3,                               
                            'walker'            => new Walker_Bootsrap_Nav_Menu()                                
                            ) 
                            );
                        } 