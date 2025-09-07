<?php
//about theme info
add_action( 'admin_menu', 'vw_kids_store_gettingstarted' );
function vw_kids_store_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Kids Store', 'vw-kids-store'), esc_html__('Theme Demo Import', 'vw-kids-store'), 'edit_theme_options', 'vw_kids_store_guide', 'vw_kids_store_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_kids_store_admin_theme_style() {
   wp_enqueue_style('vw-kids-store-custom-admin-style', get_theme_file_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-kids-store-tabs', get_theme_file_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_kids_store_admin_theme_style');

//guidline for about theme
function vw_kids_store_mostrar_guide() { 
	//custom function about theme customizer
	$vw_kids_store_return = add_query_arg( array()) ;
	$vw_kids_store_theme = wp_get_theme( 'vw-kids-store' );
?>

<div class="wrap getting-started">
		<div class="getting-started__header">
	    	<div>
                <h2 class="tgmpa-notice-warning"></h2>
            </div>
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to VW Kids Store ', 'vw-kids-store' ); ?></h2>
						
						<p class="version"><?php esc_html_e( 'Version', 'vw-kids-store' ); ?>: <?php echo esc_html($vw_kids_store_theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'vw-kids-store' ); ?>	
						</span>
    					
						<div class="powered-by">
						  <p><strong><?php esc_html_e( 'Click the below run importer button to import demo content', 'vw-kids-store' ); ?></strong></p>

						  <div class="demo-content">
						    <?php
						      /* Get Started. */
						      require get_theme_file_path( '/inc/getstart/demo-content.php' );
						    ?>
						  </div>  
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_KIDS_STORE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-kids-store'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-kids-store'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_STORE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-kids-store'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/responsive.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1) Setup VW Kids Store Theme', 'vw-kids-store' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'VW Kids Store is a free WordPress theme ideal for kids and baby shops, kids toy stores, children’s clothing, baby products, playgroup, child growth activities, playhouse, daycare centers, Primary educatoin, Kindergarten, kids fashion, children store, nursery items, toddler clothing, kids boutique, baby gear, infant essentials, childrens furniture, baby accessories, kids toys, toddler shoes, childrens books and more. This is a wonderful theme with an elegant and colorful design with the desired minimal approach. Crafted by a WordPress expert, it has a sophisticated design and a clean layout depicting every detail with precision and clarity. It is made retina-ready to publish crystal clear images of your products. Its user-friendly interface is great for everyone irrespective of the coding skills possessed. This beautiful theme comes with a responsive layout making your website look and work fabulously across every device including smartphones and gives your visitors a stunning viewing experience. To add more professional appeal to your website, you get the option to add a custom logo. As far as personalization options are concerned, you will get choices for colors, fonts, and typography. Developers have taken care of the conversion part and interactive part simultaneously and have included the Call to Action Button (CTA) for the same. Highly secure and clean codes that are also optimized will result in a lightweight design giving you faster page load time. SEO Friendly codes result in higher ranks in SERP and eventually, you get more traffic to your website.', 'vw-kids-store' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','vw-kids-store'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-kids-store'); ?></a> <?php esc_html_e( 'your website.','vw-kids-store'); ?> </li>
							<li><?php esc_html_e( 'VW Kids Store','vw-kids-store'); ?> <a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Documentation','vw-kids-store'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_theme_file_uri()); ?>/screenshot.png" alt="" />
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2) Premium Theme Information.','vw-kids-store'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/responsive1.png'); ?>" alt="">

							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','vw-kids-store'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'Creating a website with children and kids in mind isn’t that easy. But with Toy Store WordPress Theme, designing a kids’ related website becomes a breeze. It is created with keeping children and young audiences in focus that love colorful and playful designs and give attention to the things that look good. This theme is not only visually appealing but also comes with useful business options that you can run your kids’ store smoothly online. WP Toy Store WordPress Theme shows quality images through an amazing full-screen slider that is designed retina-ready for displaying a wonderful slideshow. Smartly placed Call To Action Buttons (CTA) will make the overall website interactive and guides the visitors to take the next course of action thus improving conversions also. There isn’t any need to start from scratch even if you have zero coding knowledge as this theme offers you demo data that you can import in a single click and start your online journey within minutes.', 'vw-kids-store' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','vw-kids-store'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Theme options using customizer API','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'One click demo importer','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Global color option','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Responsive design','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Favicon, logo, title, and tagline customization','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Advanced color options and color pallets','vw-kids-store'); ?></li>
										<li><?php esc_html_e( '100+ font family options','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Simple menu option','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'SEO friendly','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Pagination option','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Compatible with different WordPress famous plugins like contact form 7','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on all sections','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Responsive Layout for All Devices','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Footer customization options','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Fully integrated with the latest font awesome','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Background image option','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Custom Page Templates','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Sticky post & comment threads','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Parallax image-background section','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Customizable home page','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Footer widgets & editor style','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Social media feature','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Slider with an unlimited number of slides','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Services section','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Work section with custom post type','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Team section with custom post type','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Services section with custom post type','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Video section','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Blog post section','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Contact page template','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Shortcodes for the Custom post type','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Contact us widget','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Social icons widget','vw-kids-store'); ?></li>							
										<li><?php esc_html_e( 'Easily Customize WordPress Theme','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Change site title color','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Custom Widgets','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Advanced Theme Options','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Call to Action Buttons','vw-kids-store'); ?></li>								
										<li><?php esc_html_e( 'Regular Updates','vw-kids-store'); ?></li>	
										<li><?php esc_html_e( 'Full-width template','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Sidebar Widget Area','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Custom Google Fonts','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Custom Link Colors','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Home Page Sections','vw-kids-store'); ?></li>
										<li><?php esc_html_e( 'Custom Sections','vw-kids-store'); ?></li>								
										<li><?php esc_html_e( 'GPL Compatible','vw-kids-store'); ?></li>	
										<li><?php esc_html_e( 'Excellent Core Web Vitals','vw-kids-store'); ?></li>			
										<li><?php esc_html_e( 'Professional support','vw-kids-store'); ?></li>			

									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','vw-kids-store'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','vw-kids-store'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','vw-kids-store'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','vw-kids-store'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','vw-kids-store'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-kids-store'); ?></a> <?php esc_html_e( 'your website.','vw-kids-store'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','vw-kids-store'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','vw-kids-store'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','vw-kids-store'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','vw-kids-store'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( VW_KIDS_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-kids-store'); ?></a>
					</ol>
				</div>
			</div>
		</div>
</div>
<?php } ?>