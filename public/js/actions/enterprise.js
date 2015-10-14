import * as ActionTypes from '../constants/ActionTypes';

function initDataCompleted(data) {
    return { type: ActionTypes.ENTERPRISE_INIT_DATA_COMPLETED, data};
}

export function initEnterpriseData() {
    return (dispatch) => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/enterprise/list',
            success: data => dispatch(initDataCompleted(data)),
            error: dispatch({ type: ActionTypes.ENTERPRISE_INIT_DATA_ERROR })
        })
    }
}

function loadDataCompleted(data) {
    return { type: ActionTypes.ENTERPRISE_LOAD_DATA_COMPLETED, data };
}

export function handleGoPage(pageInfo) {
    return dispatch => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/enterprise/list',
            data: pageInfo,
            success: data => dispatch(loadDataCompleted(data)),
            error: dispatch({ type: ActionTypes.ENTERPRISE_LOAD_DATA_ERROR })
        })
    }
}

function deleteItemCompleted(id) {
    return { type: ActionTypes.ENTERPRISE_DELETE_ITEM_COMPLETED, id };
}

export function handleDeleteItem(id) {
    return (dispatch) => {
        jQuery.ajax({
            type: 'DELETE',
            url: '/admin/enterprise',
            data: {_method: 'DELETE', id: id},
            success: data => dispatch(deleteItemCompleted(id)),
            error: () => dispatch({type: ActionTypes.ENTERPRISE_DELETE_ITEM_ERROR})
        })
    }
}

export function changeSearchParams(data) {
    return { type: ActionTypes.ENTERPRISE_CHANGE_SEARCH_PARAMS, data};
}

function searchCompleted(data) {
    return { type: ActionTypes.ENTERPRISE_SEARCH_COMPLETED, data };
}

export function handleSearch(pageInfo) {
    return dispatch => {
        jQuery.ajax({
            type: 'GET',
            url: '/admin/enterprise/list',
            data: pageInfo,
            success: data => {
                data.searchKey = pageInfo.searchKey;
                data.searchValue = pageInfo.searchValue;
                dispatch(searchCompleted(data));
            },
            error: () => dispatch({type: ActionTypes.ENTERPRISE_SEARCH_ERROR})
        })
    }
}