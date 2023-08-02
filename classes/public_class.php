<?php
	if ( ! class_exists( 'WP_PRE_Loader_Public' ) ):
		
		class WP_PRE_Loader_Public {

			function __construct() {
				add_action( 'wp_body_open', array($this, 'WP_PRE_Loader_function') );
				add_action( 'wp_footer', array($this, 'WP_PRE_Loader_function'), 99 );
			}

			public function WP_PRE_Loader_function() {

				// Remove JS class
				echo '<script type="text/javascript">
						var plwao_tag	= document.getElementsByTagName( "html" )[0];
						var plwao_class	= plwao_tag.getAttribute("class");
						var new_classes	= plwao_class.replace("plwao-hide", "");

						plwao_tag.setAttribute( "class", new_classes );
					</script>';

				// Print Style
				echo "<style type='text/css'>.plwao-loader-wrap{background-color: #ffffff;}</style>";

				echo $this->WP_PRE_Loader_layout();
				// Enquque public script
				wp_print_scripts('wp_pre_loader_script');
			}

			public function WP_PRE_Loader_layout(){
				?>
				<div class="plwao-loader-wrap">
					<div class="plwao-loader-inr">
							<img src="<?php echo WPCPL_URL; ?>assets/images/spinner-1.gif" class="plwao-img" alt="" />
					</div>
				</div>
				<?php
			}

		}

		new WP_PRE_Loader_Public();

	endif;