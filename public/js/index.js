import React from 'react';
import { Router, Route, IndexRoute } from 'react-router';
import { Provider } from 'react-redux';
import configureStore from './store/configureStore';
import App from './containers/App';
import Index from './containers/Index';
import Summary from './containers/Summary';
import Manage from './containers/Manage';
import ManageUser from './containers/ManageUser';

const store = configureStore();

React.render(
    <Provider store={store}>
    {() => (
        <Router>
            <Route path="/" component={App}>
                <IndexRoute component={Index} />
                <Route path="/summary" component={Summary} />
                <Route path="/manage" component={Manage}>
                    <Route path="/manage/user" component={ManageUser} />
                </Route>
            </Route>
        </Router>
    )}
    </Provider>,
    document.getElementById('root')
);