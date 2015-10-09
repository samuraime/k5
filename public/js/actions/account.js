import * as ActionTypes from '../constants/ActionTypes';

function initDataCompleted(data) {
    return { type: ActionTypes.ACCOUNT_INIT_DATA_COMPLETED, data};
}

export function initAccountData() {
    return (dispatch) => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/account/list',
            success: data => dispatch(initDataCompleted(data)),
            error: dispatch({ type: ActionTypes.ACCOUNT_INIT_DATA_ERROR })
        })
    }
}

function loadDataCompleted(data) {
    return { type: ActionTypes.ACCOUNT_LOAD_DATA_COMPLETED, data };
}

export function handleGoPage(pageInfo) {
    return dispatch => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/account/list',
            data: pageInfo,
            success: data => dispatch(loadDataCompleted(data)),
            error: dispatch({ type: ActionTypes.ACCOUNT_LOAD_DATA_ERROR })
        })
    }
}

function deleteItemCompleted(id) {
    return { type: ActionTypes.ACCOUNT_DELETE_ITEM_COMPLETED, id };
}

export function handleDeleteItem(id) {
    return (dispatch) => {
        jQuery.ajax({
            type: 'DELETE',
            url: '/admin/account',
            data: {_method: 'DELETE', id: id},
            success: data => dispatch(deleteItemCompleted(id)),
            error: () => dispatch({type: ActionTypes.ACCOUNT_DELETE_ITEM_ERROR})
        })
    }
}

function searchCompleted(data) {
    return { type: ActionTypes.ACCOUNT_SEARCH_COMPLETED, data };
}

export function handleSearch(pageInfo) {
    return dispatch => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/account/list',
            data: pageInfo,
            success: data => {
                data.searchKey = pageInfo.searchKey;
                data.searchValue = pageInfo.searchValue;
                dispatch(searchCompleted(data));
            },
            error: () => dispatch({type: ActionTypes.ACCOUNT_SEARCH_ERROR})
        })
    }
}