import * as ActionTypes from '../constants/ActionTypes';

function initDataCompleted(data) {
    return { type: ActionTypes.PERSONNEL_INIT_DATA_COMPLETED, data};
}

export function initPersonnelData() {
    return (dispatch) => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/personnel/list',
            success: data => dispatch(initDataCompleted(data)),
            error: dispatch({ type: ActionTypes.PERSONNEL_INIT_DATA_ERROR })
        })
    }
}

function loadDataCompleted(data) {
    return { type: ActionTypes.PERSONNEL_LOAD_DATA_COMPLETED, data };
}

export function handleGoPage(pageInfo) {
    return dispatch => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/personnel/list',
            data: pageInfo,
            success: data => dispatch(loadDataCompleted(data)),
            error: dispatch({ type: ActionTypes.PERSONNEL_LOAD_DATA_ERROR })
        })
    }
}

function deleteItemCompleted(id) {
    return { type: ActionTypes.PERSONNEL_DELETE_ITEM_COMPLETED, id };
}

export function handleDeleteItem(id) {
    return (dispatch) => {
        jQuery.ajax({
            type: 'DELETE',
            url: '/admin/personnel',
            data: {_method: 'DELETE', id: id},
            success: data => dispatch(deleteItemCompleted(id)),
            error: () => dispatch({type: ActionTypes.PERSONNEL_DELETE_ITEM_ERROR})
        })
    }
}

function searchCompleted(data) {
    return { type: ActionTypes.PERSONNEL_SEARCH_COMPLETED, data };
}

export function handleSearch(pageInfo) {
    return dispatch => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/personnel',
            data: pageInfo,
            success: data => dispatch(searchCompleted(data)),
            error: () => dispatch({type: ActionTypes.PERSONNEL_SEARCH_ERROR})
        })
    }
}