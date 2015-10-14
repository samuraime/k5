import * as ActionTypes from '../constants/ActionTypes';

const summaryState = {
    data: []
}

export default function summary(state = summaryState, action) {
    switch (action.type) {
        case ActionTypes.SUMMARY_INIT_DATA_COMPLETED:
        case ActionTypes.SUMMARY_LOAD_DATA_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.SUMMARY_CHANGE_SEARCH_PARAMS: 
            return Object.assign({}, state, action.data);

        case ActionTypes.SUMMARY_SEARCH_COMPLETED:
            return Object.assign({}, state, action.data);

        case ActionTypes.SUMMARY_DELETE_ITEM_COMPLETED: 
            return Object.assign({}, state, {data: state.data.filter(item => item.id != action.id)});

        default:
            return state;
    }
}
