import * as ActionTypes from '../constants/ActionTypes';

export function addItem() {
  return { type: ActionTypes.ADD_ITEM };
}

export function viewItem(id) {
  return { type: ActionTypes.VIEW_ITEM, id };
}

export function editItem(id) {
  return { type: ActionTypes.EDIT_ITEM, id };
}

export function deleteItem(id) {
    return { type: ActionTypes.DELETE_ITEM, id };
}