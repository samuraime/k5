import * as ActionTypes from '../constants/ActionTypes';

function initDataCompleted(data) {
    return { type: ActionTypes.PERSONNEL_INIT_DATA_COMPLETED, data};
}

export function initPersonnelData() {
    return (dispatch) => {
        jQuery.get('/admin/personnel/list', function(data) {
            dispatch(initDataCompleted(data));
        })
    }
}

function loadDataCompleted(data) {
    return { type: ActionTypes.PERSONNEL_LOAD_DATA_COMPLETED, data };
}

export function handleGoPage(pageInfo) {
    return (dispatch) => {
        jQuery.get('/admin/personnel/list', pageInfo, function(data) {
            dispatch(loadDataCompleted(data));
        })
    }
}

function deleteItemComplete(id) {
    return { type: ActionTypes.PERSONNEL_DELETE_ITEM_COMPLETED, id };
}

export function handleDeleteItem(id) {
    return (dispatch) => {
        jQuery.ajax({
            type: 'DELETE',
            url: '/admin/personnel',
            data: {_method: 'DELETE', id: id},
            success: data => {
                dispatch(deleteItemComplete(id));
            },
            error: () => {
                dispatch({type: ActionTypes.PERSONNEL_DELETE_ITEM_ERROR});
            }
        })
    }
}