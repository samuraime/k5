import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as accountActions from '../actions/account';

class AccountEdit extends Component {
    constructor(props) {
        super(props);
        // props.initAccountEditData();
        // this.goPageWithInfo = this.goPageWithInfo.bind(this);
        console.log(this.props);
    }

    render() {
        return (
            <div className="admin-content">
            修改账户
            </div>
        );
    }
}

function mapStateToProps(state) {
  return {
    account: state.account
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators(accountActions, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(AccountEdit);
