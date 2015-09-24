import * as ActionTypes from '../constants/ActionTypes';
import jQuery from 'jquery';

export function initData(user) {
  return { type: ActionTypes.RENDER_INIT_DATA , user };
}

export function renderInitData() {
    return (dispatch, getState) => {
        jQuery.get('/admin/account/session', function(data) {
          dispatch(initData(data));
        });
    };
}