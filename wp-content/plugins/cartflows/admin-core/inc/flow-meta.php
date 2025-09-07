<?php
/**
 * CartFlows flow Meta Helper.
 *
 * @package CartFlows
 */

namespace CartflowsAdmin\AdminCore\Inc;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class flowMeta.
 */
class FlowMeta {


	/**
	 * Get flow meta options.
	 *
	 * @param int $flow_id flow id.
	 */
	public static function get_meta_settings( $flow_id ) {

		$settings      = self::get_settings_fields( $flow_id );
		$settings_data = array(
			'settings' => $settings,
		);
		return $settings_data;
	}


	/**
	 * Page Header Tabs.
	 *
	 * @param int $flow_id id.
	 */
	public static function get_settings_fields( $flow_id ) {

		// Check is the current theme is FSE theme or not.
		$is_fse_theme = wcf_is_current_theme_is_fse_theme();

		// Add the hidden class if the current theme is not FSE theme.
		$section_hide_class = ! $is_fse_theme ? 'wcf-hide hidden' : '';

		// Check is the current flow is Store Checkout Flow.
		$is_store_checkout_flow = intval( \Cartflows_Helper::get_global_setting( '_cartflows_store_checkout' ) ) === intval( $flow_id );
		
		$settings = array(
			'instant-layout'          => array(
				'title'    => __( 'Instant Layout ', 'cartflows' ),
				'slug'     => 'instant_layout',
				'fields'   => array(
					'instant-layout-style'               => array(
						'type'         => 'toggle',
						'label'        => __( 'Enable Instant Layout', 'cartflows' ),
						'name'         => 'instant-layout-style',
						'value'        => get_post_meta( $flow_id, 'instant-layout-style', true ),
						'desc'         => sprintf(
							/* translators: %1$s: Break line, %2$s: link html Start, %3$s: Link html end. */
							__( 'This layout will replace the default page template for the Checkout, Upsell/Downsell and Thank You steps. You can customize the design %1$sin the Checkout, Upsell/Downsell and Thank You step\'s settings, under the design tab. %2$sRead More.%3$s', 'cartflows' ),
							'<br>',
							'<a href="https://cartflows.com/docs/cartflows-instant-checkout-layout/?utm_source=dashboard&utm_medium=free-cartflows&utm_campaign=docs" target="_blank">',
							'</a>'
						),
						'is_fullwidth' => true,
					),
					'wcf-instant-checkout-header-logo-heading' => array(
						'type'       => 'heading',
						'label'      => __( 'Logo', 'cartflows' ),
						'conditions' => array(
							'relation' => 'and',
							'fields'   => array(
								array(
									'name'     => 'instant-layout-style',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
					'wcf-instant-checkout-header-logo'   => array(
						'type'          => 'image-selector',
						'label'         => __( 'Custom Logo', 'cartflows' ),
						'name'          => 'wcf-instant-checkout-header-logo',
						'value'         => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-instant-checkout-header-logo' ),
						'isNameArray'   => true,
						'objName'       => 'wcf_instant_checkout_header_logo',
						'tooltip'       => __( 'If you\'ve added a custom logo, it will show up here. If not, a default logo from the theme will be used instead.', 'cartflows' ),
						'conditions'    => array(
							'relation' => 'and',
							'fields'   => array(
								array(
									'name'     => 'instant-layout-style',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
						'desc'          => __( 'Minimum image size should be 130 x 40 in pixes for ideal display.', 'cartflows' ),
						'display_align' => 'vertical',
					),
					'wcf-instant-checkout-header-logo-width' => array(
						'type'          => 'number',
						'label'         => __( 'Width (In px)', 'cartflows' ),
						'name'          => 'wcf-instant-checkout-header-logo-width',
						'placeholder'   => '130px',
						'value'         => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-instant-checkout-header-logo-width' ),
						'display_align' => 'vertical',
						'conditions'    => array(
							'fields' => array(
								array(
									'name'     => 'instant-layout-style',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
					'wcf-instant-checkout-header-logo-height' => array(
						'type'          => 'number',
						'label'         => __( 'Height (In px)', 'cartflows' ),
						'name'          => 'wcf-instant-checkout-header-logo-height',
						'placeholder'   => '40px',
						'value'         => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-instant-checkout-header-logo-height' ),
						'display_align' => 'vertical',
						'conditions'    => array(
							'fields' => array(
								array(
									'name'     => 'instant-layout-style',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
					'wcf-instant-checkout-header--color' => array(
						'type'       => 'color-picker',
						'name'       => 'wcf-instant-checkout-header-color',
						'label'      => __( 'Header Color', 'cartflows' ),
						'value'      => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-instant-checkout-header-color' ),
						'conditions' => array(
							'fields' => array(
								array(
									'name'     => 'instant-layout-style',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
				),
				'priority' => 10,
			),
			'funnel-advanced-options' => array(
				'title'    => __( 'Global Styling', 'cartflows' ),
				'slug'     => 'funnel_advanced_options',
				'fields'   => array(
					'gcp-enable-option'      => array(
						'type'         => 'toggle',
						'label'        => __( 'Enable Global Styling', 'cartflows' ),
						'name'         => 'wcf-enable-gcp-styling',
						'value'        => get_post_meta( $flow_id, 'wcf-enable-gcp-styling', true ),
						'is_fullwidth' => true,
					),
					'gcp-primary-color'      => array(
						'type'       => 'color-picker',
						'name'       => 'wcf-gcp-primary-color',
						'label'      => __( 'Primary Color', 'cartflows' ),
						'value'      => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-gcp-primary-color' ),
						'conditions' => array(
							'fields' => array(
								array(
									'name'     => 'wcf-enable-gcp-styling',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
					'gcp-secondary-color'    => array(
						'type'       => 'color-picker',
						'name'       => 'wcf-gcp-secondary-color',
						'label'      => __( 'Secondary Color', 'cartflows' ),
						'value'      => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-gcp-secondary-color' ),
						'conditions' => array(
							'fields' => array(
								array(
									'name'     => 'wcf-enable-gcp-styling',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
					'gcp-primary-text-color' => array(
						'type'       => 'color-picker',
						'name'       => 'wcf-gcp-text-color',
						'label'      => __( 'Text Color', 'cartflows' ),
						'value'      => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-gcp-text-color' ),
						'conditions' => array(
							'fields' => array(
								array(
									'name'     => 'wcf-enable-gcp-styling',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
					'gcp-accent-color'       => array(
						'type'       => 'color-picker',
						'name'       => 'wcf-gcp-accent-color',
						'label'      => __( 'Heading/Accent Color', 'cartflows' ),
						'value'      => wcf()->options->get_flow_meta_value( $flow_id, 'wcf-gcp-accent-color' ),
						'conditions' => array(
							'fields' => array(
								array(
									'name'     => 'wcf-enable-gcp-styling',
									'operator' => '===',
									'value'    => 'yes',
								),
							),
						),
					),
				),
				'priority' => 20,
			),
			'general'                 => array(
				'title'    => __( 'General ', 'cartflows' ),
				'slug'     => 'general',
				'fields'   => array(
					'flow_slug'     => array(
						'type'          => 'text',
						'name'          => 'post_name',
						'label'         => __( 'Funnel Slug', 'cartflows' ),
						'value'         => get_post_field( 'post_name', $flow_id ),
						'display_align' => 'vertical',
					),
					'sandbox_mode'  => array(
						'type'         => 'toggle',
						'label'        => __( 'Enable Test Mode', 'cartflows' ),
						'name'         => 'wcf-testing',
						'value'        => get_post_meta( $flow_id, 'wcf-testing', true ),
						'tooltip'      => ! $is_store_checkout_flow 
							? __( 'The Test Mode automatically adds sample products to your funnel if you haven\'t selected any. This helps you preview and test the checkout experience easily.', 'cartflows' ) 
							: __( 'The Test Mode automatically adds sample products to your store checkout funnel if you haven\'t selected any. This helps you preview and test the experience easily on all steps except the Checkout page.', 'cartflows' ),
						'is_fullwidth' => true,
					),
					'flow_indexing' => array(
						'type'          => 'select',
						'name'          => 'wcf-flow-indexing',
						'label'         => __( 'Disallow Indexing', 'cartflows' ),
						'tooltip'       => __( 'Changing this will replace the default global setting. To go back to the global setting, just select Default.', 'cartflows' ),
						'display_align' => 'vertical',
						'options'       => array(
							array(
								'value' => '',
								'label' => __( 'Default', 'cartflows' ),
							),
							array(
								'value' => 'disallow',
								'label' => __( 'Yes', 'cartflows' ),
							),
							array(
								'value' => 'allow',
								'label' => __( 'No', 'cartflows' ),
							),
						),
						'value'         => get_post_meta( $flow_id, 'wcf-flow-indexing', true ),
					),
					'script_option' => array(
						'type'          => 'textarea',
						'label'         => __( 'Funnel Custom Script', 'cartflows' ),
						'name'          => 'wcf-flow-custom-script',
						'value'         => get_post_meta( $flow_id, 'wcf-flow-custom-script', true ),
						'tooltip'       => __( 'Any code you add here will work across all the pages in this funnel.', 'cartflows' ),
						'display_align' => 'vertical',
					),
				),
				'priority' => 30,
			),
		);
		return apply_filters( 'cartflows_admin_flow_settings', $settings, $flow_id );
	}
}
