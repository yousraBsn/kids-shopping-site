import { useState, useEffect } from 'react';
import { Drawer, Button, toast } from '@bsf/force-ui';
import { CheckIcon } from '@heroicons/react/24/outline';
import { __ } from '@wordpress/i18n';
import parse from 'html-react-parser';

import { doApiFetch } from '@Store';

import SettingsDrawerBody from '@Components/followUpEmails/EmailTemplatesDrawerBody';
import SkeletonLoader from '@Components/common/skeletons/SkeletonLoader';

const EmailTemplatesDrawer = ( { open, setOpen, template, onSave } ) => {
	const [ formState, setFormState ] = useState( {
		template_name: '',
		email_subject: '',
		email_body: `<p>Hi {{customer.firstname}}!</p>
			<p>We're having trouble processing your recent purchase. Would you mind completing it?</p>
			<p>Here's a link to continue where you left off: </p>
			<p><a href="{{cart.checkout_url}}" target="_blank" rel="noopener"> Continue Your Purchase Now </a></p>
			<p>Kindly,<br>
			{{admin.firstname}}<br>
			{{admin.company}}<br>
			{{cart.unsubscribe}}</p>`,
		email_frequency: 1,
		email_frequency_unit: 'MINUTE',
		is_activated: false,
		override_global_coupon: false,
		discount_type: 'percent',
		coupon_amount: '',
		coupon_expiry_date: 10,
		coupon_expiry_unit: 'days',
		use_woo_email_style: false,
		auto_coupon: false,
		free_shipping_coupon: false,
		individual_use_only: false,
		enable_email_rule_engine: false,
		email_rule_engine: [],
	} );

	const [ isSubmitting, setIsSubmitting ] = useState( false );
	const [ isLoading, setIsLoading ] = useState( true );
	const [ errors, setErrors ] = useState( {} );

	useEffect( () => {
		setIsLoading( true );
		if ( template ) {
			setFormState( {
				...template,
			} );
		} else {
			// Reset form for new template with default values
			setFormState( {
				template_name: '',
				email_subject: '',
				email_body: `<p>Hi {{customer.firstname}}!</p>
					<p>We're having trouble processing your recent purchase. Would you mind completing it?</p>
					<p>Here's a link to continue where you left off: </p>
					<p><a href="{{cart.checkout_url}}" target="_blank" rel="noopener"> Continue Your Purchase Now </a></p>
					<p>Kindly,<br>
					{{admin.firstname}}<br>
					{{admin.company}}<br>
					{{cart.unsubscribe}}</p>`,
				email_frequency: 10,
				email_frequency_unit: 'MINUTE',
				is_activated: false,
				override_global_coupon: false,
				discount_type: 'percent',
				coupon_amount: '',
				coupon_expiry_date: 1,
				coupon_expiry_unit: 'days',
				use_woo_email_style: false,
				auto_coupon: false,
				free_shipping_coupon: false,
				individual_use_only: false,
				enable_email_rule_engine: false,
				email_rule_engine: [],
			} );
		}
		setErrors( {} );
		setIsLoading( false );
	}, [ template ] );

	const handleChange = ( name, value ) => {
		setFormState( ( prev ) => {
			return { ...prev, [ name ]: value };
		} );

		// Clear error for this field if it exists
		if ( errors[ name ] ) {
			setErrors( { ...errors, [ name ]: null } );
		}
	};

	const validateForm = () => {
		const newErrors = {};

		if ( ! formState.template_name.trim() ) {
			newErrors.template_name = 'Template name is required';
		}

		if ( ! formState.email_subject.trim() ) {
			newErrors.email_subject = 'Email subject is required';
		}

		if ( ! formState.email_body.trim() ) {
			newErrors.email_body = 'Email body is required';
		}

		setErrors( newErrors );
		if ( Object.keys( newErrors ).length !== 0 ) {
			toast.error( 'Error!', {
				description: parse( Object.values( newErrors ).join( '<br>' ) ),
			} );
			return false;
		}

		return true;
	};

	const handleSubmit = () => {
		if ( ! validateForm() ) {
			return;
		}

		setIsSubmitting( true );

		const formData = new window.FormData();

		// Set the full option name in the form data
		formData.append( 'wcf_template_name', formState.template_name );
		formData.append( 'wcf_email_subject', formState.email_subject );
		formData.append( 'wcf_email_body', formState.email_body );
		formData.append( 'wcf_email_frequency', formState.email_frequency );
		formData.append(
			'wcf_email_frequency_unit',
			formState.email_frequency_unit
		);
		formData.append(
			'wcf_activate_email_template',
			formState.is_activated ? '1' : ''
		);
		formData.append(
			'wcf_override_global_coupon',
			formState.override_global_coupon ? '1' : ''
		);
		formData.append( 'wcf_discount_type', formState.discount_type );
		formData.append( 'wcf_coupon_amount', formState.coupon_amount );
		formData.append(
			'wcf_coupon_expiry_date',
			formState.coupon_expiry_date
		);
		formData.append(
			'wcf_coupon_expiry_unit',
			formState.coupon_expiry_unit
		);
		formData.append(
			'wcf_use_woo_email_style',
			formState.use_woo_email_style ? '1' : ''
		);
		formData.append( 'wcf_auto_coupon', formState.auto_coupon ? '1' : '' );
		formData.append(
			'wcf_free_shipping_coupon',
			formState.free_shipping_coupon ? '1' : ''
		);
		formData.append(
			'wcf_individual_use_only',
			formState.individual_use_only ? '1' : ''
		);

		// Add rule engine fields
		formData.append(
			'wcf_enable_email_rule_engine',
			formState.enable_email_rule_engine ? '1' : ''
		);
		formData.append(
			'wcf_email_rule_engine',
			JSON.stringify( formState.email_rule_engine || [] )
		);

		// Add template ID if editing
		if ( template?.id ) {
			formData.append( 'id', template.id );
			formData.append( 'action', 'wcar_update_email_template' );
			formData.append(
				'security',
				cart_abandonment_admin?.update_email_template_nonce
			);
		} else {
			formData.append( 'action', 'wcar_save_email_template' );
			formData.append(
				'security',
				cart_abandonment_admin?.save_email_template_nonce
			);
		}

		const ajaxUrl = cart_abandonment_admin?.ajax_url || window.ajaxurl;
		// Make API call
		doApiFetch(
			ajaxUrl,
			formData,
			'POST',
			( response ) => {
				if ( response.success ) {
					// Call the parent's onSave callback with the updated template
					onSave( response.data.template );
					toast.success( 'Success!', {
						description: __(
							'Template saved successfully',
							'woo-cart-abandonment-recovery'
						),
					} );
				} else {
					toast.success( 'Error!', {
						description:
							response.data.message ||
							__(
								'Failed to save template',
								'woo-cart-abandonment-recovery'
							),
					} );
				}
			},
			( error ) => {
				toast.error( 'Error!', {
					description:
						error.message ||
						__(
							'Failed to save template',
							'woo-cart-abandonment-recovery'
						),
				} );
			},
			true
		).finally( () => {
			setIsSubmitting( false );
		} );
	};

	const truncateText = ( text, maxLength = 60 ) => {
		return text.length > maxLength
			? text.slice( 0, maxLength ) + '...'
			: text;
	};

	return (
		<Drawer
			open={ open }
			design="simple"
			exitOnEsc
			position="right"
			scrollLock
			setOpen={ () => setOpen( ( prev ) => ! prev ) }
			transitionDuration={ 0.2 }
			className="z-[100000]"
		>
			<Drawer.Panel className="w-full md:w-4/5 lg:w-2/5">
				<Drawer.Header className="flex flex-col gpa-2">
					<div className="flex items-center justify-between">
						{ isLoading ? (
							<>
								<SkeletonLoader height="1rem" width="30%" />
								<div className="flex items-center gap-3">
									<SkeletonLoader
										height="2rem"
										width="5rem"
									/>
									<Drawer.CloseButton as="span" />
								</div>
							</>
						) : (
							<>
								<Drawer.Title className="text-lg text-gray-900">
									{ truncateText(
										formState?.template_name
											? formState.template_name
											: 'New Email Template'
									) }
								</Drawer.Title>
								<div className="flex items-center gap-3">
									<Button
										className="whitespace-nowrap hidden xs:flex"
										icon={
											<CheckIcon
												className="h-4 w-4"
												aria-label="icon"
												role="img"
											/>
										}
										iconPosition="left"
										size="sm"
										tag="button"
										type="button"
										variant="primary"
										onClick={ handleSubmit }
										disabled={ isSubmitting }
									>
										{ isSubmitting
											? 'Saving...'
											: 'Save Changes' }
									</Button>
									<Drawer.CloseButton as="span" />
								</div>
							</>
						) }
					</div>
					<Button
						className="xs:hidden"
						icon={
							<CheckIcon
								className="h-4 w-4"
								aria-label="icon"
								role="img"
							/>
						}
						iconPosition="left"
						size="sm"
						tag="button"
						type="button"
						variant="primary"
						onClick={ handleSubmit }
						disabled={ isSubmitting }
					>
						{ isSubmitting ? 'Saving...' : 'Save Changes' }
					</Button>
				</Drawer.Header>
				<Drawer.Body className="overflow-x-hidden">
					{ isLoading ? (
						<div className="space-y-4">
							<SkeletonLoader height="2rem" className="mb-6" />
							<SkeletonLoader height="1.5rem" width="50%" />
							<SkeletonLoader height="3rem" />
							<SkeletonLoader height="1.5rem" width="70%" />
							<SkeletonLoader height="8rem" />
							<SkeletonLoader height="1.5rem" width="60%" />
							<SkeletonLoader height="3rem" />
							<SkeletonLoader height="1.5rem" width="40%" />
							<SkeletonLoader height="3rem" />
						</div>
					) : (
						<>
							{ errors.submit && (
								<div className="mb-4 rounded-md bg-red-50 p-4">
									<div className="flex">
										<div className="ml-3">
											<h3 className="text-sm font-medium text-red-800">
												{ errors.submit }
											</h3>
										</div>
									</div>
								</div>
							) }
							<SettingsDrawerBody
								formState={ formState }
								handleChange={ handleChange }
								errors={ errors }
								isLoading={ isSubmitting }
							/>
						</>
					) }
				</Drawer.Body>
			</Drawer.Panel>
			<Drawer.Backdrop />
		</Drawer>
	);
};

export default EmailTemplatesDrawer;
