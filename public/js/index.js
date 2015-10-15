import 'babel-core/polyfill';
import React from 'react';
import { Router, Route, IndexRoute } from 'react-router';
import { Provider } from 'react-redux';
import configureStore from './store/configureStore';
import App from './containers/App';
import Index from './containers/Index';
import Summary from './containers/Summary';
import Enterprise from './containers/Enterprise';
import Personnel from './containers/Personnel';
import Message from './containers/Message';
import Log from './containers/Log';
// import Manage from './containers/Manage';
import Account from './containers/Account';
import AccountEdit from './containers/AccountEdit';

const store = configureStore();

store.subscribe(() =>
  console.log(store.getState())
);

React.render(
    <Provider store={store}>
    {() => (
        <Router>
            <Route path="/" component={ App }>
                <IndexRoute component={ Index } />
                <Route path="/index" component={ Index } />
                <Route path="/summary" component={ Summary } />
                <Route path="/enterprise" component={ Enterprise } />
                <Route path="/personnel" component={ Personnel } />
                <Route path="/log" component={ Log } />
                <Route path="/message" component={ Message } />
                <Route path="/account" component={ Account } />
                <Route path="/account/edit" component={AccountEdit} />
            </Route>
        </Router>
    )}
    </Provider>,
    document.body
);