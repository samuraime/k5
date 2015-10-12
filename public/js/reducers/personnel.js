import * as ActionTypes from '../constants/ActionTypes';

const personnelState = {
    data: []
}

export default function personnel(state = personnelState, action) {
    switch (action.type) {
        case ActionTypes.PERSONNEL_INIT_DATA_COMPLETED:
        case ActionTypes.PERSONNEL_LOAD_DATA_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.PERSONNEL_CHANGE_SEARCH_PARAMS: 
            return Object.assign({}, state, action.data);

        case ActionTypes.PERSONNEL_SEARCH_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.PERSONNEL_DELETE_ITEM_COMPLETED: 
            return Object.assign({}, state, {data: state.data.filter(item => item.id != action.id)});

        default:
            return state;
    }
}
