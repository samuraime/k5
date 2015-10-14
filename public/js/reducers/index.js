import { combineReducers } from 'redux';
import app from './app';
import summary from './summary';
import personnel from './personnel';
import enterprise from './enterprise';
import account from './account';

const rootReducer = combineReducers({
  app,
  summary,
  personnel,
  enterprise,
  account
});

export default rootReducer;
