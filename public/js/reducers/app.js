import * as ActionTypes from '../constants/ActionTypes';

const appState = {
    user: { name: 'username', permission: [] }
}

export default function app(state = appState, action) {
    switch (action.type) {
        case ActionTypes.RENDER_INIT_DATA:
            return Object.assign({}, appState, action.user );

        default:
            return state;
    }
}
