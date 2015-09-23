import * as ActionTypes from '../constants/ActionTypes';

const initialState = [];

export default function user(state = initialState, action) {
    switch (action.type) {
        case ActionTypes.ADD_ITEM:
            return [{
                id: state.reduce((maxId, todo) => Math.max(todo.id, maxId), -1) + 1,
                completed: false,
                text: action.text
            }, ...state];

        case ActionTypes.EDIT_ITEM:
            return state.filter(todo =>
                todo.id !== action.id
            );

        case ActionTypes.VIEW_ITEM:
            return state.map(todo =>
                todo.id === action.id ?
                    Object.assign({}, todo, { text: action.text }) :
                    todo
            );

        case ActionTypes.DELETE_ITEM:
            return state.filter(index => 
                index !== action.id
            );
            
        default:
            return state;
    }
}
