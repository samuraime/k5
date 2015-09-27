import * as ActionTypes from '../constants/ActionTypes';

const personnelState = {
    data: []
}

export default function personnel(state = personnelState, action) {
    switch (action.type) {
        case ActionTypes.INIT_PERSONNEL_DATA:
            return Object.assign({}, personnelState, action.data);

        default:
            return state;
    }
}
