import { combineReducers } from 'redux';
import app from './app';
import personnel from './personnel';

const rootReducer = combineReducers({
  app,
  personnel
});

export default rootReducer;
