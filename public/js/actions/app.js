import * as ActionTypes from '../constants/ActionTypes';
import jQuery from 'jquery';

function initApp(user) {
  return { type: ActionTypes.APP_INIT_DATA_COMPLETED , user };
}

export function initAppData() {
    return (dispatch, getState) => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/session',
            success: data => dispatch(initApp(data)),
            error: dispatch({ type: ActionTypes.APP_INIT_DATA_ERROR })
        })
    };
}

