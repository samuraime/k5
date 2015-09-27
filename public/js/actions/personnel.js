import * as ActionTypes from '../constants/ActionTypes';

function initPersonnel(data) {
    return { type: ActionTypes.INIT_PERSONNEL_DATA, data};
}

export function initPersonnelData() {
    return (dispatch) => {
        jQuery.get('/admin/personnel/list', function(data) {
            dispatch(initPersonnel(data));
        })
    }
}