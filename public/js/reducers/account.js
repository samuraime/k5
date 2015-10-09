import * as ActionTypes from '../constants/ActionTypes';

const accountState = {
    data: []
}

export default function account(state = accountState, action) {
    switch (action.type) {
        case ActionTypes.ACCOUNT_INIT_DATA_COMPLETED:
        case ActionTypes.ACCOUNT_LOAD_DATA_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.ACCOUNT_SEARCH_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.ACCOUNT_DELETE_ITEM_COMPLETED: 
            return Object.assign({}, state, {data: state.data.filter(item => item.id != action.id)});

        default:
            return state;
    }
}
