import * as ActionTypes from '../constants/ActionTypes';
import jQuery from 'jquery';

function initApp(user) {
  return { type: ActionTypes.INIT_APP_DATA , user };
}

export function initAppData() {
    return (dispatch, getState) => {
        jQuery.get('/admin/account/session', function(data) {
          dispatch(initApp(data));
        });
    };
}

