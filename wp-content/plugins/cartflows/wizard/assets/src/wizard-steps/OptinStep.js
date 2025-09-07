import React, { useState, useEffect, useCallback } from 'react';
import { useHistory } from 'react-router-dom';
import { sprintf, __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import parse from 'html-react-parser';
import { useStateValue } from '../utils/StateProvider';
import {
	ExclamationCircleIcon,
	ArrowRightIcon,
} from '@heroicons/react/24/outline';

import { CheckboxField } from '@WizardFields';

function OptinStep() {
	const history = useHistory();

	const [ requestError, setRequestError ] = useState( false );
	const [ { action_button }, dispatch ] = useStateValue();

	const [ formErrors, setFormErrors ] = useState( {
		name_error_message: '',
		email_error_message: '',
		error_class: '',
	} );

	const { name_error_message, email_error_message, error_class } = formErrors;

	const changeOptinButtonText = useCallback( ( data ) => {
		dispatch( {
			status: 'SET_NEXT_STEP',
			action_button: data,
		} );
	}, [] );

	const default_button_text = __( 'Save & Continue', 'cartflows' ),
		toggle_link_title = __(
			'Learn more about usage tracking',
			'cartflows'
		);

	useEffect( () => {
		// Set Foooter button text.
		changeOptinButtonText( {
			button_text: default_button_text,
			button_class: 'wcf-enrol-optin',
		} );
	}, [ changeOptinButtonText ] );

	const validateForm = function ( posted_data ) {
		let is_errors = false;
		const errors = {};

		if ( ! posted_data.name || '' === posted_data.name ) {
			errors.name_error_message = __( 'Please Enter Name', 'cartflows' );
			is_errors = true;
		}

		if ( ! posted_data.email || '' === posted_data.email ) {
			errors.email_error_message = __(
				'Please Enter Email ID',
				'cartflows'
			);
			is_errors = true;
		} else if (
			! /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(
				posted_data.email
			)
		) {
			errors.email_error_message = __(
				'Entered email address is not a valid email',
				'cartflows'
			);
			is_errors = true;
		}

		if ( is_errors ) {
			setFormErrors( {
				name_error_message: errors.name_error_message
					? errors.name_error_message
					: '',
				email_error_message: errors.email_error_message
					? errors.email_error_message
					: '',
				error_class:
					'!border-red-500 focus:!ring-red-100 focus:!border-red-500',
			} );
		}

		return is_errors;
	};

	const submitOptinForm = function ( e ) {
		e.preventDefault();

		changeOptinButtonText( {
			button_text: __( 'Processing', 'cartflows' ),
			button_class: 'wcf-enrol-optin',
		} );

		dispatch( {
			status: 'PROCESSING',
		} );

		const ajaxData = new window.FormData();

		ajaxData.append( 'action', 'cartflows_user_onboarding' );
		ajaxData.append( 'security', cartflows_wizard.user_onboarding_nonce );

		const name = document.getElementById( 'wcf-user-name' ).value;
		const email = document.getElementById( 'wcf-user-email' ).value;
		const usage_tracking_enabled = document.querySelector(
			'input[type=checkbox][name="cf_analytics_optin"]'
		).checked;

		if ( validateForm( { name, email } ) ) {
			changeOptinButtonText( {
				button_text: default_button_text,
				button_class: 'wcf-enrol-optin',
			} );

			dispatch( {
				status: 'RESET',
			} );
			return;
		}

		ajaxData.append( 'user_fname', name );
		ajaxData.append( 'user_email', email );
		ajaxData.append(
			'usage_tracking',
			usage_tracking_enabled ? 'yes' : 'no'
		);

		apiFetch( {
			url: ajaxurl,
			method: 'POST',
			body: ajaxData,
		} ).then( ( response ) => {
			if ( response.data.success ) {
				history.push( {
					pathname: 'index.php',
					search: `?page=cartflow-setup&step=ready`,
				} );
				dispatch( {
					status: 'RESET',
				} );
			} else {
				setRequestError( response.data.message );
			}

			changeOptinButtonText( {
				button_text: default_button_text,
				button_class: 'wcf-enrol-optin',
			} );
		} );
	};

	return (
		<div className="wcf-container">
			<div className="wcf-row mt-12 !max-w-5xl">
				<div className="bg-white rounded text-center mx-auto px-11">
					<span className="text-sm font-medium text-primary-600 mb-10 text-center block tracking-[.24em] uppercase">
						{ __( 'Step 5 of 6', 'cartflows' ) }
					</span>
					<h1 className="wcf-step-heading mb-4">
						{ parse(
							sprintf(
								/* translators: %s: html tag*/
								__(
									"One last step. %s Let's setup email reports on how your store is doing.",
									'cartflows'
								),
								'<br />'
							)
						) }
					</h1>
					<p className="mt-4 text-[#4B5563] text-base">
						{ parse(
							sprintf(
								/* translators: %1$s: html tag, %2$s: html tag*/
								__(
									'Let CartFlows take the guesswork out of your checkout results. Each week your store will send %1$s you an email report with key metrics and insights. You also will receive emails from us to %2$s help your store sell more.',
									'cartflows'
								),
								'<br class="hidden lg:block" />',
								'<br class="hidden lg:block" />'
							)
						) }
					</p>
					<form action="#" className="max-w-lg mx-auto mt-10">
						<div className="wcf-form-fields sm:flex flex-col gap-5 text-left">
							<div className="w-full">
								<label
									htmlFor="wcf-user-name"
									className="text-slate-800 text-base font-semibold block"
								>
									{ __( 'First Name', 'cartflows' ) }
								</label>
								<div className="relative block">
									<input
										id="wcf-user-name"
										type="text"
										className={ `wcf-input !my-2 !px-3.5 !py-2.5 !shadow-sm block w-full !text-sm !border-gray-300 !rounded !text-gray-500 !placeholder-slate-400 focus:ring focus:!shadow-none ${
											error_class
												? error_class
												: 'focus:!ring-indigo-100 focus:!border-indigo-500'
										}` }
										placeholder={ __(
											'Please enter your name',
											'cartflows'
										) }
										defaultValue={
											cartflows_wizard.current_user_name
										}
									/>
									{ name_error_message && (
										<div className="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
											<ExclamationCircleIcon
												className="h-5 w-5 text-red-500"
												aria-hidden="true"
											/>
										</div>
									) }
								</div>
								{ name_error_message && (
									<>
										<span className="text-red-500 text-sm block">
											{ name_error_message }
										</span>
									</>
								) }
							</div>
							<div className="w-full">
								<label
									htmlFor="wcf-user-email"
									className="text-slate-800 text-base font-semibold block"
								>
									{ __( 'Email address', 'cartflows' ) }
								</label>
								<div className="relative block">
									<input
										id="wcf-user-email"
										type="email"
										className={ `wcf-input !my-2 !px-3.5 !py-2.5 !shadow-sm block w-full !text-sm !border-gray-300 !rounded !text-gray-500 !placeholder-slate-400 focus:ring focus:!shadow-none ${
											error_class
												? error_class
												: 'focus:!ring-indigo-100 focus:!border-indigo-500'
										}` }
										placeholder={ __(
											'Enter Your Email',
											'cartflows'
										) }
										defaultValue={
											cartflows_wizard.current_user_email
										}
									/>
									{ email_error_message && (
										<div className="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
											<ExclamationCircleIcon
												className="h-5 w-5 text-red-500"
												aria-hidden="true"
											/>
										</div>
									) }
								</div>

								{ email_error_message && (
									<>
										<span className="text-red-500 text-sm block">
											{ email_error_message }
										</span>
									</>
								) }
							</div>

							<div className="w-ful">
								<div className="relative block">
									<CheckboxField
										class="wcf-analytics_optin"
										name="cf_analytics_optin"
										value="yes"
										label={ __(
											'I agree to share usage data to help improve CartFlows.',
											'cartflows'
										) }
										desc={ sprintf(
											/* translators: %1$s: anchor tag start, %2$s: anchor tag close*/
											__(
												"We don't collect any personal information—just basic details like your PHP version, admin language, and which features you use. %1$sLearn more%2$s about what we collect and why.",
												'cartflows'
											),
											'<a href="https://my.cartflows.com/usage-tracking/" target="_blank" class="text-primary-500 hover:text-primary-600" title="' +
												toggle_link_title +
												'">',
											'</a>'
										) }
									/>
								</div>
							</div>
						</div>

						<div className="wcf-action-buttons mt-[40px] block w-full">
							{ requestError && (
								<span className="text-red-700 mb-2 text-sm block">
									{ requestError }
								</span>
							) }
							<button
								onClick={ submitOptinForm }
								className={ `wcf-wizard--button w-full ${
									action_button.button_class
										? action_button.button_class
										: ''
								}` }
							>
								{ action_button.button_text }
								<ArrowRightIcon
									className="w-5 ml-1.5 stroke-2"
									aria-hidden="true"
								/>
							</button>
						</div>
						<p className="wcf-tc-statement mt-6 text-sm text-[#4B5563]">
							{ parse(
								sprintf(
									/* translators: %1$s: Anchor tag one start, %2$s: Anchor tag one close, %3$s: Anchor tag two start, %4$s: Anchor tag two close. */
									__(
										'By continuing you agree to our %1$sTerms%2$s and %3$sPrivacy Policy%4$s.',
										'cartflows'
									),
									'<a href="https://cartflows.com/terms-and-conditions/?utm_source=dashboard&utm_medium=free-cartflows&utm_campaign=terms_conditions" target="_blank" class="text-primary-500 hover:text-primary-600">',
									'</a>',
									'<a href="https://cartflows.com/privacy-policy/?utm_source=dashboard&utm_medium=free-cartflows&utm_campaign=privacy_policy" target="_blank" class="text-primary-500 hover:text-primary-600">',
									'</a>'
								)
							) }
						</p>
					</form>
					{ /* { 'processing' !== settingsProcess && (
						<p className="mt-6 flex justify-center">
							<button
								onClick={ handleNextStep }
								className="p-2 font-normal text-gray-300 hover:text-gray-500 cursor-pointer"
							>
								{ __( 'Maybe Later', 'cartflows' ) }
							</button>
						</p>
					) } */ }
				</div>
			</div>
		</div>
	);
}

export default OptinStep;
