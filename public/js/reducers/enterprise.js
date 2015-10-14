import * as ActionTypes from '../constants/ActionTypes';

const enterpriseState = {
    data: []
}

export default function enterprise(state = enterpriseState, action) {
    switch (action.type) {
        case ActionTypes.ENTERPRISE_INIT_DATA_COMPLETED:
        case ActionTypes.ENTERPRISE_LOAD_DATA_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.ENTERPRISE_CHANGE_SEARCH_PARAMS: 
            return Object.assign({}, state, action.data);

        case ActionTypes.ENTERPRISE_SEARCH_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.ENTERPRISE_DELETE_ITEM_COMPLETED: 
            return Object.assign({}, state, {data: state.data.filter(item => item.id != action.id)});

        default:
            return state;
    }
}
