		<div class="wrap about-wrap">
			<h1><?php printf( __( 'What\'s new  in Gravity PDF %s?', 'gfpdftoolkit' ), $vars['display_version'] ); ?></h1>			
			
			<div class="gfpdf-badge"><?php printf( __( 'Version %s', 'pdfextended' ), $vars['display_version'] ); ?></div>

			<?php $this->tabs(); ?>

			<div class="changelog">
				<h3><?php _e( 'TODO - Getting Started Steps / Documentation', 'gfpdftoolkit' );?></h3>

				<div class="feature-section">

					<p><?php _e( 'Version 2.3 introduces a comprehensive customer management interface. Get detailed statistics on your customers, quickly make edits, and leave detailed notes.', 'gfpdftoolkit' );?></p>

					<img src="<?php echo EDD_PLUGIN_URL . 'assets/images/screenshots/customer-ui.png'; ?>" class="edd-welcome-screenshots"/>

					<h4><?php _e( 'Better Customer Details on Payment', 'gfpdftoolkit' );?></h4>
					<p><?php _e( 'The Customer Details section of the View Order Details screen has been updated to make it easier to move payment records between customers. A quick link to the customer\'s overview page has also been added, letting you easily see all purchases made by the customer.', 'gfpdftoolkit' );?></p>					

				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Additional Updates', 'gfpdftoolkit' );?></h3>

				<div class="feature-section col three-col">
					<div>

						<h4><?php _e( 'PolyLang Support', 'gfpdftoolkit' );?></h4>
						<p><?php _e( 'We\'ve improved support for the popular PolyLang Plugin in 2.3 making EDD more accessible in more languages.', 'gfpdftoolkit' );?></p>

						<h4><?php _e( 'Customer API', 'gfpdftoolkit' );?></h4>
						<p><?php _e( 'A new EDD_Customer class has been introduced that makes it easy for developers to interact with customer data.', 'gfpdftoolkit' );?></p>

					</div>

					<div>

						<h4><?php _e( 'Schema Validation', 'gfpdftoolkit' );?></h4>
						<p><?php _e( 'The Schema Markup has been improved and now properly includes prices for both single and multi-price option products.' ,'gfpdftoolkit' );?></p>

						<h4><?php _e( 'Buy Now Button Improvements', 'gfpdftoolkit' );?></h4>
						<p><?php _e( 'Buy Now buttons no longer create pending payment records when they are clicked. Buy Now buttons are now automatically deactivated if no supported payment gateway is activated.' ,'gfpdftoolkit' );?></p>

					</div>

					<div class="last-feature">

						<h4><?php _e( 'Improved Upgrade Routine API', 'gfpdftoolkit' );?></h4>
						<p><?php _e( 'The upgrade routine has been improved to be more robust and user friendly. It now supports multiple upgrades in a single release, logs which have been completed ,as well as allows incomplete upgrades to be resumed.', 'gfpdftoolkit' );?></p>

					</div>

				</div>
			</div>

			<div class="return-to-dashboard">
				<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'post_type' => 'download', 'page' => 'edd-settings' ), 'edit.php' ) ) ); ?>"><?php _e( 'Go to Easy Digital Downloads Settings', 'gfpdftoolkit' ); ?></a> &middot;
				<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'edd-changelog' ), 'index.php' ) ) ); ?>"><?php _e( 'View the Full Changelog', 'gfpdftoolkit' ); ?></a>
			</div>
		</div>		