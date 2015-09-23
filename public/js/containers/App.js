import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import jQuery from 'jquery';
import Header from '../components/Header';
import LeftNavBar from '../components/LeftNavBar';

export default class App extends Component {
  constructor(props) {
    super(props);
    jQuery.get('/admin/account/session', function(user) {
      console.log(user);
    });

  }

  render() {
    return (
      <div>
        <Header />
        <LeftNavBar />
        {this.props.children}
      </div>
      );
  }
}
