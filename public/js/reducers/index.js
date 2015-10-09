import { combineReducers } from 'redux';
import app from './app';
import personnel from './personnel';
import account from './account';

const rootReducer = combineReducers({
  app,
  personnel,
  account
});

export default rootReducer;
