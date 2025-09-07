<?php
/**
 * Cart Abandonment Meta Settings.
 *
 * @package Woocommerce-Cart-Abandonment-Recovery
 */

namespace WCAR\Admin\Inc;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Meta_Options.
 */
class Meta_Options {
	/**
	 * Member Variable.
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 * Constructor function that initializes required actions and hooks.
	 */
	public function __construct() {
	}

	/**
	 *  Initiator.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Get flow meta options.
	 */
	public static function get_meta_settings() {

		$settings     = self::get_setting_fields();
		$integrations = self::get_integration_fields();
		$email_fields = self::get_email_template_fields();
		return [
			'settings'     => $settings,
			'integrations' => $integrations,
			'email_fields' => $email_fields,
		];
	}

	/**
	 * Page Header Tabs.
	 */
	public static function get_setting_fields() {

		$roles       = wcf_ca()->helper->get_wordpress_user_roles();
		$roles_array = [];
		foreach ( $roles as $key => $label ) {
			$roles_array[] = (object) [
				'id'   => $key,
				'name' => $label,
			];
		}

		$settings = [
			'general-settings'         => [
				'title'    => __( 'General', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'general-settings',
				'fields'   => [
					'wcf-ca-status'                => [
						'type'         => 'toggle',
						'label'        => __( 'Enable Tracking', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_status',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_status' ),
						'desc'         => __( 'Cart will be considered abandoned if order is not completed in cut-off time.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-cut-off-time'          => [
						'type'         => 'number',
						'label'        => __( 'Cart abandoned cut-off time', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_cron_run_time',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_cron_run_time', 20 ),
						'desc'         => __( 'Consider cart abandoned after above entered minutes of item being added to cart and order not placed.', 'woo-cart-abandonment-recovery' ),
						'after'        => __( 'minutes', 'woo-cart-abandonment-recovery' ),
						'min'          => '10',
						'is_fullwidth' => true,
					],
					'wcf-ca-ignore-users'          => [
						'type'         => 'multi-select',
						'label'        => __( 'Disable Tracking For', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_ignore_users',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_ignore_users', [] ),
						'options'      => $roles_array,
						'desc'         => __( 'It will ignore selected users from abandonment process when they logged in, and hence they can not receive mail for cart abandoned by themselves.', 'woo-cart-abandonment-recovery' ),
						'placeholder'  => __( 'Select user roles', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-excludes-orders'       => [
						'type'         => 'multi-select',
						'label'        => __( 'Exclude email sending For', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_excludes_orders',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_excludes_orders', [] ),
						'options'      => [
							[
								'id'   => 'pending',
								'name' => __( 'Pending', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'processing',
								'name' => __( 'Processing', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'on-hold',
								'name' => __( 'On Hold', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'completed',
								'name' => __( 'Completed', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'failed',
								'name' => __( 'Failed', 'woo-cart-abandonment-recovery' ),
							],
						],
						'desc'         => __( 'It will not send future recovery emails to selected order status and will mark as recovered.', 'woo-cart-abandonment-recovery' ),
						'placeholder'  => __( 'Select order status', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcar-email-admin-on-recovery' => [
						'type'         => 'toggle',
						'label'        => __( 'Notify recovery to admin', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcar_email_admin_on_recovery',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcar_email_admin_on_recovery' ),
						'desc'         => __( 'This option will send an email to admin on new order recovery.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
				],
				'priority' => 10,
			],
			'webhook-settings'         => [
				'title'    => __( 'Webhook', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'webhook-settings',
				'fields'   => [
					'wcf-ca-zapier-tracking-status'        => [
						'type'         => 'toggle',
						'label'        => __( 'Enable Webhook', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_zapier_tracking_status',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_zapier_tracking_status' ),
						'desc'         => __( 'Allows you to trigger webhook automatically upon cart abandonment and recovery.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-zapier-cart-abandoned-webhook' => [
						'type'         => 'webhook-url',
						'label'        => __( 'Webhook URL', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_zapier_cart_abandoned_webhook',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_zapier_cart_abandoned_webhook' ),
						'desc'         => __( 'Add the Webhook URL below.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-coupon-code-status'            => [
						'type'         => 'toggle',
						'label'        => __( 'Create Coupon Code', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_coupon_code_status',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_code_status' ),
						'desc'         => __( 'Auto-create the special coupon for the abandoned cart to send over the emails.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-discount-type'                 => [
						'type'         => 'select',
						'label'        => __( 'Discount Type', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_discount_type',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_discount_type' ),
						'desc'         => __( 'Select the Discount Type.', 'woo-cart-abandonment-recovery' ),
						'options'      => [
							[
								'id'   => 'percent',
								'name' => __( 'Percentage Discount', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'fixed_cart',
								'name' => __( 'Fixed Cart Discount', 'woo-cart-abandonment-recovery' ),
							],
						],
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
								[
									'name'     => 'wcf_ca_coupon_code_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-coupon-amount'                 => [
						'type'         => 'number',
						'label'        => __( 'Coupon Amount', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_coupon_amount',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_amount' ),
						'desc'         => __( 'Consider cart abandoned after above entered minutes of item being added to cart and order not placed.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
								[
									'name'     => 'wcf_ca_coupon_code_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-coupon-expiry'                 => [
						'type'         => 'time',
						'label'        => __( 'Coupon Expires After', 'woo-cart-abandonment-recovery' ),
						'fields'       => [
							'wcf_ca_coupon_expiry'      => [
								'type'         => 'number',
								'label'        => '',
								'default_unit' => 30,
								'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_expiry' ),
								'name'         => 'wcf_ca_coupon_expiry',
								'autoSave'     => true,
							],
							'wcf_ca_coupon_expiry_unit' => [
								'type'         => 'select',
								'label'        => '',
								'name'         => 'wcf_ca_coupon_expiry_unit',
								'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_expiry_unit' ),
								'default_unit' => 'minute',
								'autoSave'     => true,
								'options'      => [
									[
										'id'   => 'hours',
										'name' => __( 'Hour(s)', 'woo-cart-abandonment-recovery' ),
									],
									[
										'id'   => 'days',
										'name' => __( 'Days(s)', 'woo-cart-abandonment-recovery' ),
									],
								],
							],
						],
						'desc'         => __( 'Set the expiry time for the coupon.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
								[
									'name'     => 'wcf_ca_coupon_code_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
				],
				'priority' => 10,
			],
			'coupon-settings'          => [
				'title'    => __( 'Coupon', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'coupon-settings',
				'fields'   => [
					'wcf-ca-auto-delete-coupons' => [
						'type'         => 'toggle',
						'label'        => __( 'Delete Coupons Automatically', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_auto_delete_coupons',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_auto_delete_coupons' ),
						'desc'         => __( 'This option will set a weekly cron to delete all expired and used coupons automatically in the background.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-delete-coupons'      => [
						'type'         => 'button',
						'label'        => __( 'Delete Coupons Manually', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_delete_coupons',
						'value'        => __( 'Delete', 'woo-cart-abandonment-recovery' ),
						'desc'         => __( 'This will delete all expired and used coupons that were created by Woo Cart Abandonment Recovery.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
				],
				'priority' => 20,
			],
			'email-settings'           => [
				'title'    => __( 'Email', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'email-settings',
				'fields'   => [
					'wcf-ca-from-name'   => [
						'type'         => 'text',
						'label'        => __( '"From" Name', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_from_name',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_from_name', get_bloginfo( 'name' ) ),
						'desc'         => __( 'Name will appear in email sent.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-from-email'  => [
						'type'         => 'email',
						'label'        => __( '"From" Address', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_from_email',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_from_email', get_bloginfo( 'admin_email' ) ),
						'desc'         => __( 'Email which send from.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-reply-email' => [
						'type'         => 'email',
						'label'        => __( '"Reply To" Address', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_reply_email',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_reply_email', get_bloginfo( 'admin_email' ) ),
						'desc'         => __( 'When a user clicks reply, which email address should that reply be sent to?', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
				],
				'priority' => 30,
			],
			'recovery-report-settings' => [
				'title'    => __( 'Recovery Report', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'recovery-report-settings',
				'fields'   => [
					'wcf-ca-send-recovery-report' => [
						'type'         => 'toggle',
						'label'        => __( 'Send recovery report emails', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_send_recovery_report_emails_to_admin',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_send_recovery_report_emails_to_admin', 'on' ),
						'desc'         => __( 'Enable sending recovery report emails.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-admin-email'          => [
						'type'         => 'textarea',
						'label'        => __( 'Email Address', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_admin_email',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_admin_email', get_option( 'admin_email' ) ),
						'desc'         => __( 'Email address to send recovery report emails. For multiple emails, add each email address per line.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_send_recovery_report_emails_to_admin',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
				],
				'priority' => 40,
			],
			'gdpr-settings'            => [
				'title'    => __( 'GDPR', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'gdpr-settings',
				'fields'   => [
					'wcf-ca-gdpr-status'  => [
						'type'         => 'toggle',
						'label'        => __( 'Enable GDPR Integration', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_gdpr_status',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_gdpr_status' ),
						'desc'         => __( 'By enabling this, it will show up confirmation text below the email id on checkout page.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-gdpr-message' => [
						'type'         => 'text',
						'label'        => __( 'GDPR Message', 'woo-cart-abandonment-recovery' ),
						'desc'         => '',
						'name'         => 'wcf_ca_gdpr_message',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_gdpr_message' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_gdpr_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
				],
				'priority' => 50,
			],
			'advanced-settings'        => [
				'title'    => __( 'Advanced', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'advanced-settings',
				'fields'   => [
					'wcf-ca-global-param'       => [
						'type'         => 'textarea',
						'label'        => __( 'UTM parameters', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_global_param',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_global_param' ),
						'desc'         => __( 'The UTM parameters will be appended to the checkout page links which is available in the recovery emails. For multiple parameters, add each parameter per line.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					// TODO: Remove this after new UI is enabled by default.
					'cartflows_ca_use_new_ui'   => [
						'type'         => 'ui_switch',
						'label'        => __( 'Use Legacy Interface', 'woo-cart-abandonment-recovery' ),
						'name'         => 'cartflows_ca_use_new_ui',
						'value'        => wcf_ca()->utils->wcar_get_option( 'cartflows_ca_use_new_ui' ),
						'desc'         => __( 'Switch back to legacy user interface.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-delete-plugin-data' => [
						'type'         => 'toggle',
						'label'        => __( 'Delete Plugin Data', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_delete_plugin_data',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_delete_plugin_data' ),
						'desc'         => __( 'Enabling this option will delete the plugin data while deleting the Plugin.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'cf-analytics-optin'        => [
						'type'         => 'toggle',
						'label'        => __( 'Help Improve Cart Abandonment', 'woo-cart-abandonment-recovery' ),
						'name'         => 'cf_analytics_optin',
						'value'        => wcf_ca()->utils->wcar_get_option( 'cf_analytics_optin' ),
						'desc'         => sprintf(
									/* translators: %1$s: Start Link Node and $2%s End Link Node. */
							__( 'Collect non-sensitive information from your website, such as the PHP version and features used, to help us fix bugs faster, make smarter decisions, and build features that actually matter to you. %1$sLearn more%2$s', 'woo-cart-abandonment-recovery' ),
							'<a href="https://my.cartflows.com/usage-tracking/?utm_source=dashboard&utm_medium=woo-cart-abandonment-recovery&utm_campaign=docs" target="_blank" class="wcar-link no-underline text-flamingo-400 font-medium">',
							'</a>'
						),
						'is_fullwidth' => true,
					],
				],
				'priority' => 60,
			],
		];

		return apply_filters( 'wcar_admin_settings_fields', $settings );
	}

	/**
	 * Get integration fields.
	 */
	public static function get_integration_fields() {

		$integrations = [
			'webhook-integration' => [
				'title'    => __( 'Webhook', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'webhook',
				'fields'   => [
					'wcf-ca-zapier-tracking-status'        => [
						'type'         => 'toggle',
						'label'        => __( 'Enable Webhook', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_zapier_tracking_status',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_zapier_tracking_status' ),
						'desc'         => __( 'Allows you to trigger webhook automatically upon cart abandonment and recovery.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
					],
					'wcf-ca-zapier-cart-abandoned-webhook' => [
						'type'         => 'webhook-url',
						'label'        => __( 'Webhook URL', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_zapier_cart_abandoned_webhook',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_zapier_cart_abandoned_webhook' ),
						'desc'         => __( 'Add the Webhook URL below.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-coupon-code-status'            => [
						'type'         => 'toggle',
						'label'        => __( 'Create Coupon Code', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_coupon_code_status',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_code_status' ),
						'desc'         => __( 'Auto-create the special coupon for the abandoned cart to send over the emails.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-discount-type'                 => [
						'type'         => 'select',
						'label'        => __( 'Discount Type', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_discount_type',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_discount_type' ),
						'desc'         => __( 'Select the Discount Type.', 'woo-cart-abandonment-recovery' ),
						'options'      => [
							[
								'id'   => 'percent',
								'name' => __( 'Percentage Discount', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'fixed_cart',
								'name' => __( 'Fixed Cart Discount', 'woo-cart-abandonment-recovery' ),
							],
						],
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
								[
									'name'     => 'wcf_ca_coupon_code_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-coupon-amount'                 => [
						'type'         => 'number',
						'label'        => __( 'Coupon Amount', 'woo-cart-abandonment-recovery' ),
						'name'         => 'wcf_ca_coupon_amount',
						'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_amount' ),
						'desc'         => __( 'Consider cart abandoned after above entered minutes of item being added to cart and order not placed.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
								[
									'name'     => 'wcf_ca_coupon_code_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
					'wcf-ca-coupon-expiry'                 => [
						'type'         => 'time',
						'label'        => __( 'Coupon Expires After', 'woo-cart-abandonment-recovery' ),
						'fields'       => [
							'wcf_ca_coupon_expiry'      => [
								'type'         => 'number',
								'label'        => '',
								'default_unit' => 30,
								'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_expiry' ),
								'name'         => 'wcf_ca_coupon_expiry',
								'autoSave'     => true,
							],
							'wcf_ca_coupon_expiry_unit' => [
								'type'         => 'select',
								'label'        => '',
								'name'         => 'wcf_ca_coupon_expiry_unit',
								'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_ca_coupon_expiry_unit' ),
								'default_unit' => 'minute',
								'autoSave'     => true,
								'options'      => [
									[
										'id'   => 'hours',
										'name' => __( 'Hour(s)', 'woo-cart-abandonment-recovery' ),
									],
									[
										'id'   => 'days',
										'name' => __( 'Days(s)', 'woo-cart-abandonment-recovery' ),
									],
								],
							],
						],
						'desc'         => __( 'Set the expiry time for the coupon.', 'woo-cart-abandonment-recovery' ),
						'is_fullwidth' => true,
						'conditions'   => [
							'fields' => [
								[
									'name'     => 'wcf_ca_zapier_tracking_status',
									'operator' => '==',
									'value'    => 'on',
								],
								[
									'name'     => 'wcf_ca_coupon_code_status',
									'operator' => '==',
									'value'    => 'on',
								],
							],
						],
					],
				],
				'priority' => 10,
			],
			// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// 'sms' => [
			// 'title'    => __( 'SMS', 'woo-cart-abandonment-recovery' ),
			// 'slug'     => 'sms',
			// 'fields'   => [
			// 'wcf-sms-tracking-status' => [
			// 'type'         => 'toggle',
			// 'label'        => __( 'Enable Webhook', 'woo-cart-abandonment-recovery' ),
			// 'name'         => 'wcf_sms_tracking_status',
			// 'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_sms_tracking_status' ),
			// 'desc'         => __( 'Allows you to trigger webhook automatically upon cart abandonment and recovery.', 'woo-cart-abandonment-recovery' ),
			// 'is_fullwidth' => true,
			// ],
			// ],
			// 'priority' => 20,
			// ],
			// 'whatsapp' => [
			// 'title'    => __( 'WhatsApp', 'woo-cart-abandonment-recovery' ),
			// 'slug'     => 'whatsapp',
			// 'fields'   => [
			// 'wcf-whatsapp-tracking-status' => [
			// 'type'         => 'toggle',
			// 'label'        => __( 'Enable Webhook', 'woo-cart-abandonment-recovery' ),
			// 'name'         => 'wcf_whatsapp_tracking_status',
			// 'value'        => wcf_ca()->utils->wcar_get_option( 'wcf_whatsapp_tracking_status' ),
			// 'desc'         => __( 'Allows you to trigger webhook automatically upon cart abandonment and recovery.', 'woo-cart-abandonment-recovery' ),
			// 'is_fullwidth' => true,
			// ],
			// ],
			// 'priority' => 30,
			// ],
			'ottokit-integration' => [
				'title'    => __( 'OttoKit', 'woo-cart-abandonment-recovery' ),
				'slug'     => 'ottokit-integration',
				'fields'   => [
				// Ottokit is handled via SureTriggers embed, so no fields here for now.
				],
				'priority' => 40,
			],
		];

		return apply_filters( 'wcar_admin_integration_fields', $integrations );
	}

	/**
	 * Get email template fields.
	 */
	public static function get_email_template_fields() {
		$fields = [
			'is_activated'              => [
				'type'         => 'toggle',
				'label'        => __( 'Activate Template Now?', 'woo-cart-abandonment-recovery' ),
				'name'         => 'is_activated',
				'desc'         => '',
				'is_fullwidth' => true,
			],
			'template_name'             => [
				'type'         => 'text',
				'label'        => __( 'Template Name', 'woo-cart-abandonment-recovery' ),
				'name'         => 'template_name',
				'desc'         => '',
				'is_fullwidth' => true,
			],
			'email_subject'             => [
				'type'         => 'subject_field',
				'label'        => __( 'Email Subject', 'woo-cart-abandonment-recovery' ),
				'name'         => 'email_subject',
				'desc'         => __( 'Enter the email subject.', 'woo-cart-abandonment-recovery' ),
				'options'      => [
					[
						'text'  => 'Admin Firstname',
						'value' => '{{admin.firstname}}',
					],
					[
						'text'  => 'Coupon Code',
						'value' => '{{cart.coupon_code}}',
					],
					[
						'text'  => 'Customer First Name',
						'value' => '{{customer.firstname}}',
					],
					[
						'text'  => 'Customer Last Name',
						'value' => '{{customer.lastname}}',
					],
					[
						'text'  => 'Customer Full Name',
						'value' => '{{customer.fullname}}',
					],
					[
						'text'  => 'Cart Abandonment Date',
						'value' => '{{cart.abandoned_date}}',
					],
				],
				'is_fullwidth' => true,
			],
			'email_body'                => [
				'type'         => 'richtext',
				'id'           => 'email_body',
				'label'        => __( 'Email Body', 'woo-cart-abandonment-recovery' ),
				'name'         => 'email_body',
				'desc'         => __( 'Enter the email body.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
			],
			'email_send_time_frequency' => [
				'type'         => 'time',
				'label'        => __( 'Send This Email', 'woo-cart-abandonment-recovery' ),
				'fields'       => [
					'email_send_time'      => [
						'type'         => 'number',
						'label'        => '',
						'default_unit' => 30,
						'name'         => 'email_frequency',
					],
					'email_send_frequency' => [
						'type'         => 'select',
						'label'        => '',
						'name'         => 'email_frequency_unit',
						'default_unit' => 'minute',
						'options'      => [
							[
								'id'   => 'MINUTE',
								'name' => __( 'Minute(s)', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'HOUR',
								'name' => __( 'Hour(s)', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'DAY',
								'name' => __( 'Day(s)', 'woo-cart-abandonment-recovery' ),
							],
						],
					],
				],
				'desc'         => __( 'Time after cart is abandoned to send this email.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
			],
			'use_woo_email_style'       => [
				'type'         => 'toggle',
				'label'        => __( 'Use WooCommerce email style', 'woo-cart-abandonment-recovery' ),
				'name'         => 'use_woo_email_style',
				'desc'         => __( 'Email will be sent in WooCommerce email format.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
				'group'        => 'woo_style',
			],
			'send_test_email'           => [
				'type'         => 'test_email',
				'label'        => __( 'Send Test Email To', 'woo-cart-abandonment-recovery' ),
				'name'         => 'send_test_email',
				'desc'         => '',
				'is_fullwidth' => true,
			],
			'override_global_coupon'    => [
				'type'         => 'toggle',
				'label'        => __( 'Create Coupon Code', 'woo-cart-abandonment-recovery' ),
				'name'         => 'override_global_coupon',
				'desc'         => __( 'Auto-create a special coupon for the abandoned cart.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
				'group'        => 'coupon',
			],
			'discount_type'             => [
				'type'         => 'select',
				'label'        => __( 'Discount Type', 'woo-cart-abandonment-recovery' ),
				'name'         => 'discount_type',
				'desc'         => __( 'Select the Discount Type.', 'woo-cart-abandonment-recovery' ),
				'options'      => [
					[
						'id'   => 'percent',
						'name' => __( 'Percentage Discount', 'woo-cart-abandonment-recovery' ),
					],
					[
						'id'   => 'fixed_cart',
						'name' => __( 'Fixed Cart Discount', 'woo-cart-abandonment-recovery' ),
					],
				],
				'is_fullwidth' => true,
				'conditions'   => [
					'fields' => [
						[
							'name'     => 'override_global_coupon',
							'operator' => '==',
							'value'    => true,
						],
					],
				],
			],
			'coupon_amount'             => [
				'type'         => 'number',
				'label'        => __( 'Coupon Amount', 'woo-cart-abandonment-recovery' ),
				'name'         => 'coupon_amount',
				'desc'         => __( 'Amount for the coupon.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
				'conditions'   => [
					'fields' => [
						[
							'name'     => 'override_global_coupon',
							'operator' => '==',
							'value'    => true,
						],
					],
				],
			],
			'coupon_expiry'             => [
				'type'         => 'time',
				'label'        => __( 'Coupon Expires After', 'woo-cart-abandonment-recovery' ),
				'fields'       => [
					'coupon_expiry_date' => [
						'type'         => 'number',
						'label'        => '',
						'default_unit' => 30,
						'name'         => 'coupon_expiry_date',
					],
					'coupon_expiry_unit' => [
						'type'         => 'select',
						'label'        => '',
						'name'         => 'coupon_expiry_unit',
						'default_unit' => 'minute',
						'options'      => [
							[
								'id'   => 'hours',
								'name' => __( 'Hour(s)', 'woo-cart-abandonment-recovery' ),
							],
							[
								'id'   => 'days',
								'name' => __( 'Days(s)', 'woo-cart-abandonment-recovery' ),
							],
						],
					],
				],
				'is_fullwidth' => true,
				'conditions'   => [
					'fields' => [
						[
							'name'     => 'override_global_coupon',
							'operator' => '==',
							'value'    => true,
						],
					],
				],
				'group'        => 'coupon',
			],
			'free_shipping_coupon'      => [
				'type'         => 'toggle',
				'label'        => __( 'Free Shipping', 'woo-cart-abandonment-recovery' ),
				'name'         => 'free_shipping_coupon',
				'desc'         => __( 'Grant free shipping with this coupon.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
				'conditions'   => [
					'fields' => [
						[
							'name'     => 'override_global_coupon',
							'operator' => '==',
							'value'    => true,
						],
					],
				],
			],
			'individual_use_only'       => [
				'type'         => 'toggle',
				'label'        => __( 'Individual use only', 'woo-cart-abandonment-recovery' ),
				'name'         => 'individual_use_only',
				'desc'         => __( 'Coupon cannot be used in conjunction with other coupons.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
				'conditions'   => [
					'fields' => [
						[
							'name'     => 'override_global_coupon',
							'operator' => '==',
							'value'    => true,
						],
					],
				],
				'group'        => 'coupon',
			],
			'auto_coupon'               => [
				'type'         => 'toggle',
				'label'        => __( 'Auto apply coupon', 'woo-cart-abandonment-recovery' ),
				'name'         => 'auto_coupon',
				'desc'         => __( 'Automatically apply coupon at checkout.', 'woo-cart-abandonment-recovery' ),
				'is_fullwidth' => true,
				'conditions'   => [
					'fields' => [
						[
							'name'     => 'override_global_coupon',
							'operator' => '==',
							'value'    => true,
						],
					],
				],
			],
		];
		return apply_filters( 'wcar_admin_email_template_fields', $fields );
	}
}
