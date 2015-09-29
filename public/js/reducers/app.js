import * as ActionTypes from '../constants/ActionTypes';

const appState = {
    user: { name: '', permission: [] }
}

export default function app(state = appState, action) {
    switch (action.type) {
        case ActionTypes.APP_INIT_DATA_COMPLETED:
            return Object.assign({}, appState, action.user );

        default:
            return state;
    }
}
