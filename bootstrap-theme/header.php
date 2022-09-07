<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'bretts-bootstrap-theme' ); ?></a>

<div id="wrapper">
	<header>
		<nav id="header" class="navbar navbar-expand-md <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'bretts-bootstrap-theme' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div id="navbar" class="collapse navbar-collapse">
					<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav me-auto',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
							)
						);

						if ( '1' === $search_enabled ) :
					?>
							<form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'bretts-bootstrap-theme' ); ?>" title="<?php esc_attr_e( 'Search', 'bretts-bootstrap-theme' ); ?>" />
									<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e( 'Search', 'bretts-bootstrap-theme' ); ?></button>
								</div>
							</form>
					<?php
						endif;
					?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="container"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 100px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if ( is_single() || is_archive() ) :
		?>
			<div class="row">
				<div class="col-md-8 col-sm-12">
		<?php
			endif;
		?>

<!-- Text Right - Image Left with CTA Button Component -->
<div class="module-4">
    <div class="flex-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h3>
						<?php the_field( 'module-4-title' ); ?>
                    </h3>
                </div>
                <div class="text">
					<?php the_field( 'module-4-text' ); ?>
                </div>
				<div>
					<a class="btn btn-primary" id="learn-more-button" href="#" role="button"><?php the_field( 'module-4-cta-button' ); ?></a>
				</div>
			</div>
                <div class="image col-md-6">
					<?php if ( get_field( 'module-4-image' ) ) : ?>
					<img class="rounded mx-auto img-fluid" src="<?php the_field( 'module-4-image' ); ?>" />
					<?php endif ?>
                </div>
			<div>

			</div>
        </div>
    </div>
</div>
<!-- Text Right - Image Left with CTA Button Component -->

<!-- Our Partners Logo Section -->
<div class="partners-module">
	<div>
		<h4 class="our-partners-heading">Our Partners:</h4>
	</div>
	<div class="flex-container row partners align-self-center">
		<div class="partner-icon col-md-2 align-self-center">
			<?php if ( get_field( 'partner_logo_1' ) ) : ?>
			<img class="partner-image img-fluid-partners" alt="partner logo 1" src="<?php the_field( 'partner_logo_1' ); ?>" />
			<?php endif ?>
		</div>
		<div class="partner-icon col-md-2 align-self-center">
			<?php if ( get_field( 'partner_logo_2' ) ) : ?>
			<img class="partner-image img-fluid-partners" alt="partner logo 2" src="<?php the_field( 'partner_logo_2' ); ?>" />
			<?php endif ?>
		</div>
		<div class="partner-icon col-md-2 align-self-center">
			<?php $partner_logo_3 = get_field( 'partner_logo_3' ); ?>
			<?php if ( $partner_logo_3 ) : ?>
				<img class="partner-image img-fluid-partners" alt="partner logo 3" src="<?php echo esc_url( $partner_logo_3['url'] ); ?>" alt="<?php echo esc_attr( $partner_logo_3['alt'] ); ?>" />
			<?php endif; ?>
		</div>
		<div class="partner-icon col-md-2 align-self-center">
			<?php if ( get_field( 'partner_logo_4' ) ) : ?>
			<img class="partner-image img-fluid-partners" alt="partner logo 4" src="<?php the_field( 'partner_logo_4' ); ?>" />
			<?php endif ?>
		</div>
		<div class="partner-icon col-md-2 align-self-center">
			<?php $partner_logo_5 = get_field( 'partner_logo_5' ); ?>
			<?php if ( $partner_logo_5 ) : ?>
			<img class="partner-image img-fluid-partners" alt="partner logo 5" src="<?php echo esc_url( $partner_logo_5['url'] ); ?>" alt="<?php echo esc_attr( $partner_logo_5['alt'] ); ?>" />
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- Our Partners Logo Section -->

<!-- Image Right - Text Left Component -->
<div class="module-1">
	<div class="flex-container">
		<div class="row align-items-center">
			<div class="image col-md-6">
				<?php if ( get_field( 'module-1-image' ) ) : ?>
				<img class="rounded mx-auto img-fluid" src="<?php the_field( 'module-1-image' ); ?>" />
				<?php endif ?>
			</div>
			<div class="col-md-6">
				<div class="title">
					<h3>
						<?php the_field( 'module-1-title' ); ?>
					</h3>
				</div>
				<div class="text">
					<?php the_field( 'module-1-text' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Image Right - Text Left Component -->

<!-- Text Right - Image Left Component -->
<div class="module-2">
    <div class="flex-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h3>
                        <?php the_field( 'module-2-title' ); ?>
                    </h3>
                </div>
                <div class="text">
                    <?php the_field( 'module-2-text' ); ?>
                </div>
			</div>
                <div class="image col-md-6">
                    <?php $module_2_image = get_field( 'module-2-image' ); ?>
                    <?php if ( $module_2_image ) : ?>
                    <img class="rounded mx-auto img-fluid" src="<?php echo esc_url( $module_2_image['url'] ); ?>" alt="<?php echo esc_attr( $module_2_image['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
        </div>
    </div>
</div>
<!-- Text Right - Image Left Component -->

<!-- Image Right - Text Left Component -->
<div class="module-3">
	<div class="flex-container">
		<div class="row align-items-center">
			<div class="image col-md-6">
				<?php if ( get_field( 'module-3-image' ) ) : ?>
				<img class="rounded mx-auto img-fluid" src="<?php the_field( 'module-3-image' ); ?>" />
				<?php endif ?>
			</div>
			<div class="col-md-6">
				<div class="title">
					<h3>
						<?php the_field( 'module-3-title' ); ?>
					</h3>
				</div>
				<div class="text">
					<?php the_field( 'module-3-text' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Image Right - Text Left Component -->

<!-- Footer Section -->
<footer class="page-footer">
			<div class="col-md-6 footer-logo logo-column">
				<a href="#"><?php if ( get_field( 'footer-logo' ) ) : ?>
				<img src="<?php the_field( 'footer-logo' ); ?>" />
				<?php endif ?></a>
			</div>
			<div class="col-md-6 footer-copyright copyright-column flex-row-reverse">
				<p><?php the_field( 'footer-copyright' ); ?></p>
			</div>
</footer>
<!-- Footer Section -->

<!-- Header Section -->
<header class="page-header">
			<div class="col-md-6 header-logo header-logo-column">
				<a href="#"><?php if ( get_field( 'header-logo' ) ) : ?>
				<img src="<?php the_field( 'header-logo' ); ?>" />
				<?php endif ?></a>
			</div>
			<div class="col-md-6 header-menu menu-column flex-row-reverse">
				
			</div>
				</header>
<!-- Header Section -->