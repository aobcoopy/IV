<?php
	
// how to change the 'app' ==> so that i will remain changeable

	$aApplicationMenu = array(
		array(
			'name' => 'Dashboard',
			'menu-icon' => 'fa-dashboard',
			'app' => 'dashboard'
		),
		array(
			'name' => 'Administrator',
			'menu-icon' => 'fa-cog',
			'app' => 'admin',
			'submenu' => array(
				array(
					'name' => 'Access Control',
					'app' => 'accctrl'
				),
				array(
					'name' => 'Activity Log',
					'app' => 'log'
				),
				/*array(
					'name' => 'Profile',
					'app' => 'profile'
				),
				
				array(
					'name' => 'Setting',
					'app' => 'setting'
				)*/
			)
		),
		array(
			'name' => 'SEO Tools',
			'menu-icon' => 'fa-cogs',
			'app' => 'exclusions',
			'submenu' => array(
                array(
                    'name' => 'Exclude villas from search',
                    'app' => 'exclusions'
                ),
                array(
                    'name' => 'Most popular villas (inclusions)',
                    'app' => 'inclusions'
                ),
                array(
                    'name' => 'Metatags for search pages',
                    'app' => 'metatag_search'
                ),
				array(
					'name' => 'Parameter tool',
					'app' => 'parameters'
				)
			)
		),
		/*array(
			'name' => 'Chat Management',
			'menu-icon' => 'fa-commenting',
			'app' => 'chat_group',
			'submenu' => array(
                array(
                    'name' => 'Chat Message',
                    'app' => 'chat_group'
                ),
				array(
                    'name' => 'Online Chat',
                    'app' => 'online_chat'
                ),
            )
		),*/
		/*array(
			'name' => 'Online Chat',
			'menu-icon' => 'fa-commenting',
			'app' => 'online_chat',
		),*/
        array(
            'name' => 'VILLAS Management',
            'menu-icon' => 'fa-home',
            'app' => 'properties',
            'submenu' => array(
                array(
                    'name' => 'All Villas',
                    'app' => 'properties'
                ),
				array(
                    'name' => 'Villa Comment',
                    'app' => 'comment'
                ),
               array(
                    'name' => 'Transfer Villa Rental Rate',
                    'app' => 'transfer'
                ),
//                array(
//                    'name' => 'Product',
//                    'app' => 'product'
//                )*/
            )
        ),
		array(
            'name' => 'Villa Form',
            'menu-icon' => 'fa-home',
            'app' => 'vf_phuket',
            'submenu' => array(
                
				array(
                    'name' => 'Villa Form',
                    'app' => 'vf_phuket'
                ),
				array(
                    'name' => 'Villa Form History',
                    'app' => 'villa_form'
                ),
            )
        ),
		array(
			'name' => 'Yacht ',//Management
			'menu-icon' => 'fa-ship',
			'app' => 'ship',
			'submenu' => array(
				array(
					'name' => 'Yacht',
					'app' => 'yacth'
				),
				array(
					'name' => 'Destination',
					'app' => 'yacth_destination'
				),
				array(
					'name' => 'Marina Location',
					'app' => 'yacth_marina'
				),
				array(
					'name' => 'Type of Yacht',
					'app' => 'yacth_fleet'
				),
				
				array(
					'name' => 'Sailing Route',
					'app' => 'yacth_sailing_route'
				),
				array(
					'name' => 'Prefer Program',
					'app' => 'yacth_prefer_program'
				),
				array(
					'name' => 'Prefer Time',
					'app' => 'yacth_prefer_time'
				),
				array(
					'name' => 'Type of charter',
					'app' => 'yacth_charter'
				),
				array(
					'name' => 'Cover',
					'app' => 'yacth_cover'
				),
				array(
					'name' => 'Background Popup',
					'app' => 'yacth_bg'
				),
				
				
			)
		),
		array(
			'name' => 'Blog ',//Management
			'menu-icon' => 'fa-bullhorn',
			'app' => 'blog',
			'submenu' => array(
				array(
					'name' => 'Blog',
					'app' => 'blog'
				),
				array(
					'name' => 'Blog Category',
					'app' => 'blog_category'
				),
				array(
					'name' => 'IG Photo',
					'app' => 'blog_instagram'
				),
			)
		),
		array(
			'name' => 'Quick Link ',//Management
			'menu-icon' => 'fa-link',
			'app' => 'quick_link',
			//'submenu' => array(
//				array(
//					'name' => 'Blog',
//					'app' => 'blog'
//				),
//			)
		),
		/*array(
			'name' => 'Villa Form',
			'menu-icon' => 'fa-file-text-o',
			'app' => 'villa_forms',
			'submenu' => array(
                array(
                    'name' => 'Phuket',
                    'app' => 'vf_phuket'
                ),
				array(
                    'name' => 'Koh Samui',
                    'app' => 'villa_form'
                ),
				
				
            )
		),*/
		array(
            'name' => 'Shopping List',
            'menu-icon' => ' fa-shopping-cart',
            'app' => 'spl',
            'submenu' => array(
                
				array(
                    'name' => 'Category',
                    'app' => 'spl_cate'
                ),
				array(
                    'name' => 'Product items',
                    'app' => 'spl_items'
                ),
            )
        ),
		array(
			'name' => 'Wine List ',//Management
			'menu-icon' => 'fa-glass',
			'app' => 'wine_list',
		),
		array(
			'name' => 'Agent ',//Management
			'menu-icon' => 'fa-home',
			'app' => 'agent',
		),
		/*array(
			'name' => 'Villa Comment Management',
			'menu-icon' => 'fa-commenting',
			'app' => 'comment',
		),*/
		
		array(
			'name' => 'Invoice ',//Management
			'menu-icon' => 'fa-file-text',
			'app' => 'invoice',
		),
		
		array(
			'name' => 'Rooms ',//Management
			'menu-icon' => 'fa-bed',
			'app' => 'rooms',
			/*'submenu' => array(
				array(
					'name' => 'Destination Setting',
					'app' => 'destination'
				),
				array(
					'name' => 'Subdestination Setting',
					'app' => 'subdestination'
				),
			)*/
		),
		array(
			'name' => 'Destination ',//Management
			'menu-icon' => 'fa-object-group',
			'app' => 'pro',
			'submenu' => array(
				array(
					'name' => 'Destination Setting',
					'app' => 'destination'
				),
				array(
					'name' => 'Subdestination Setting',
					'app' => 'subdestination'
				),
			)
		),
		array(
			'name' => 'Icons ',//Management
			'menu-icon' => 'fa-cogs',
			'app' => 'pro',
			'submenu' => array(
				array(
					'name' => 'Group Icon',
					'app' => 'icongroup'
				),
				array(
					'name' => 'Features Setting',
					'app' => 'feature'
				),
				array(
					'name' => 'Bedroom Setting',
					'app' => 'bedroom'
				),
				array(
					'name' => 'Appliances Setting',
					'app' => 'appliances'
				),
				/*array(
					'name' => 'Facilities Setting',
					'app' => 'facility'
				),*/
				
			)
		),
		array(
			'name' => 'Website Setting',
			'menu-icon' => 'fa-desktop',
			'app' => 'pro',
			'submenu' => array(
				array(
					'name' => 'Category Setting',
					'app' => 'category'
				),
				/*array(
					'name' => 'Facilities Setting',
					'app' => 'facility'
				),*/
				array(
					'name' => 'Address Map Setting',
					'app' => 'addressMap'
				),
				array(
					'name' => 'Tags Setting',
					'app' => 'tag'
				),
				array(
					'name' => 'What is include Setting',
					'app' => 'what_include'
				),
				array(
					'name' => 'Slide Picture',
					'app' => 'slide_photo'
				),
				array(
					'name' => 'Cover Picture',
					'app' => 'cover'
				),
			)
		),
		/*array(
			'name' => 'Front-end Setting',
			'menu-icon' => 'fa-desktop',
			'app' => 'pro',
			'submenu' => array(
				
			)
		),*/
		/*array(
			'name' => 'E-Commerce',
			'menu-icon' => 'fa-shopping-cart',
			'app' => 'pro',
			'submenu' => array(
				array(
					'name' => 'Orders',
					'app' => 'orders'
				),
				array(
					'name' => 'Payment',
					'app' => 'payment'
				)
			)
		),*/
		/*array(
			'name' => 'Shipping',
			'menu-icon' => 'fa-truck',
			'app' => 'pro',
			'submenu' => array(
				array(
					'name' => 'Packaging',
					'app' => 'package'
				),
				array(
					'name' => 'Sending',
					'app' => 'sending'
				)
			)
		),*/
		array(
			'name' => 'Contact Us',
			'menu-icon' => 'fa-commenting',
			'app' => 'contact',
		),
		array(
			'name' => 'FAQ ',//Management
			'menu-icon' => 'fa-commenting',
			'app' => 'faqmanaget',
			'submenu' => array(
				array(
					'name' => 'Faq Group',
					'app' => 'faq'
				),
				array(
					'name' => 'Faq',
					'app' => 'faqs'
				),
				/*array(
					'name' => 'Product',
					'app' => 'product'
				)*/
			)
		),
		array(
			'name' => 'Booking',
			'menu-icon' => 'fa-commenting',
			'app' => 'booking',
		),
		array(
			'name' => 'Testimonial',
			'menu-icon' => 'fa-commenting',
			'app' => 'testimonial',
		),
		array(
			'name' => 'Subscribe',
			'menu-icon' => 'fa-envelope',
			'app' => 'subscribe',
		),
		/*array(
			'name' => 'Confirm Payment',
			'menu-icon' => 'fa-credit-card',
			'app' => 'confirm_payment',
		),*/
	);
	
	/*if($dbc->HasRecord("users","id = '".$_SESSION['auth']['user_id']."'"))
	{
		$us = $dbc->GetRecord("users","*","id = '".$_SESSION['auth']['user_id']."'");
		if($us['super']=='1')
		{
			$arr = array(
				'name' => 'Yacht Management',
				'menu-icon' => 'fa-ship',
				'app' => 'ship',
				'submenu' => array(
					array(
						'name' => 'Cover',
						'app' => 'yacth_cover'
					),
					array(
						'name' => 'Background Popup',
						'app' => 'yacth_bg'
					),
					array(
						'name' => 'Destination',
						'app' => 'yacth_destination'
					),
					array(
						'name' => 'Fleet Type',
						'app' => 'yacth_fleet'
					),
					array(
						'name' => 'Yacth',
						'app' => 'yacth'
					),
				)
			);
			array_push($aApplicationMenu,$arr);
		}
	}*/
	
	
?>

