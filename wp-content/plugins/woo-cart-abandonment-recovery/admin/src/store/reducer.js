import { ActionTypes } from './types';

export const initialState = {
	data: '',
	loading: false,
	error: '',
	settingsData: {
		values: cart_abandonment_admin?.settings || {},
		fields: cart_abandonment_admin?.settings_fields || {},
	},
	dashboardData: '',
	isDashboardLoading: false,
	dashboardError: '',
	followUpData: '',
	productData: '',
};

export const reducer = ( state = initialState, action ) => {
	switch ( action.type ) {
		case ActionTypes.SET_DATA:
			return {
				...state,
				data: action.payload,
				loading: false,
				error: null,
			};
		case ActionTypes.UPDATE_DATA:
			return {
				...state,
				data: {
					...state.data,
					...action.payload,
				},
			};
		case ActionTypes.SET_SETTINGS_DATA:
			return {
				...state,
				settingsData: {
					...state.settingsData,
					values: action?.payload?.data || {},
				},
			};
		case ActionTypes.UPDATE_SETTINGS_DATA:
			return {
				...state,
				settingsData: {
					...state.settingsData,
					values: {
						...state.settingsData.values,
						[ action.payload.option ]: action.payload.value,
					},
				},
			};
		case ActionTypes.RESET_DATA:
			return initialState;
		case ActionTypes.FETCH_DASHBOARD_DATA_REQUEST:
			return {
				...state,
				isDashboardLoading: true,
				dashboardError: null,
			};
		case ActionTypes.FETCH_DASHBOARD_DATA_SUCCESS:
			return {
				...state,
				dashboardData: action.dashboardData,
				isDashboardLoading: action.isDashboardLoading,
				dashboardError: null,
			};
		case ActionTypes.FETCH_DASHBOARD_DATA_FAILURE:
			return {
				...state,
				isDashboardLoading: false,
				dashboardError: action.payload,
			};
		case ActionTypes.FETCH_FOLLOWUP_DATA_SUCCESS:
			return {
				...state,
				followUpData: action.followUpData,
			};
		case ActionTypes.FETCH_PRODUCT_DATA_SUCCESS:
			return {
				...state,
				productData: action.productData,
			};
		default:
			return state;
	}
};
