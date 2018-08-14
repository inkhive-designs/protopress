/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    wp.customize( 'protopress_hide_title_tagline', function ( value ) {
        value.bind( function ( to ) {
            $( '#text-title-desc' ).toggle();
        });
    } );

    wp.customize( 'protopress_branding_below_logo', function ( value ) {
        value.bind( function ( to ) {
            if(to == true ) {
                $( '#text-title-desc' ).css({
                    'display' : 'block',
                });
            }
            else {
                $( '#text-title-desc' ).css( {
                    'display' : 'inline-block',
                });
            }
        });
    } );

    wp.customize( 'protopress_center_logo', function ( value ) {
        value.bind( function ( to ) {
            if( to == true ) {
                $( '.site-branding' ).css('text-align', 'center' );
                $( '#site-logo' ).css({
					'text-align' : 'center',
                });
                $( '#text-title-desc' ).css('text-align', 'center' );
            }
            else {
                $( '.site-branding' ).css('text-align', 'left' );
                $( '#site-logo' ).css({
					'text-align' : 'left',
				});
                $( '#text-title-desc' ).css('text-align', 'left' );
            }
        });
    } );
    
    //Social Icons
    wp.customize( 'protopress_social_1', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fab fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'protopress_social_2', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fab fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'protopress_social_3', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fab fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'protopress_social_4', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fab fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'protopress_social_5', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fab fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'protopress_social_6', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fab fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
        });
    });

    //Featured Areas
    wp.customize( 'protopress_grid_enable', function( value ) {
        value.bind( function( to ) {
            $( '.flex-images' ).toggle();
        });
    });

    wp.customize( 'protopress_grid_title', function( value ) {
        value.bind( function( to ) {
            $( '.flex-images .section-title' ).text( to );
        });
    });

    wp.customize( 'protopress_box_enable', function( value ) {
        value.bind( function( to ) {
            $( '.featured-2' ).toggle();
        });
    });

    wp.customize( 'protopress_box_title', function( value ) {
        value.bind( function( to ) {
            $( '.featured-2 .popular-articles .section-title' ).text( to );
        });
    });

    wp.customize( 'protopress_slider_title', function( value ) {
        value.bind( function( to ) {
            $( '.featured-2 .latest-hap .section-title' ).text( to );
        });
    });
    
    //Design and Layouts
    //Footer Settings
    wp.customize( 'protopress_fc_line_disable', function( value ) {
        value.bind( function( to ) {
            $( '.credit-line' ).toggle();
        });
    });

    wp.customize( 'protopress_footer_text', function( value ){
        value.bind( function( to ) {
            $( '.footer-text' ).text( to );
        });
    });

    //Sidebar
    wp.customize( 'protopress_sidebar_width', function( value ) {
        value.bind( function( to ) {
            var SidebarWidth    =   (to * 100) / 12;
            $('#secondary').css('width', SidebarWidth + '%' );
            $('#primary, #primary-mono').css('width', 100 - SidebarWidth + '%' );
        } );
    } );


    //Design & Layouts
    //Colors
    wp.customize( 'protopress_site_titlecolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    } );

    wp.customize( 'protopress_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );

    //Fonts
    wp.customize( 'protopress_title_font', function( value ) {
        value.bind( function( to ) {
            $( '.title-font, h1, h2, .section-title, #top-menu a, #site-navigation a' ).css( 'font-family', to );
        } );
    } );
    wp.customize( 'protopress_body_font', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'font-family', to );
        } );
    } );

    //Menu Settings
    wp.customize( 'protopress_disable_nav_desc', function( value ) {
        value.bind( function( to ) {
            $('#site-navigation .menu-desc').toggle();
        });
    });

    wp.customize( 'protopress_disable_active_nav', function( value ) {
        value.bind( function( to ) {
            if( to == true ) {
                $( '#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a' ).css({
                    'border': 'none',
                    'background' : 'inherit'
                });
            }
            else {
                $( '#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a' ).css({
                    'border': 'solid 1px #cecece',
                    'background' : '#dbdbdb'
                });
            }
        });
    });



} )( jQuery );
