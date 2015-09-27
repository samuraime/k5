import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import Header from '../components/Header';
import Footer from '../components/Footer';
import LeftNavBar from '../components/LeftNavBar';
import * as AppActions from '../actions/app';

class App extends Component {
  constructor(props) {
    super();
    props.initAppData();
  }

  render() {
    // console.log(this.props);
    return (
      <div>
        <Header user={ this.props.app.user }/>
          <div className="w1200 mt20">
            <div className="am-cf admin-main">
              <LeftNavBar permissions={ this.props.app.user.permission } />
              {this.props.children}
            </div>
          </div>
        <Footer />
      </div>
      );
  }
}

function mapStateToProps(state) {
  return {
    app: state.app
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators(AppActions, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(App);
