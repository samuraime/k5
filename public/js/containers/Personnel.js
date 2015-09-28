import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as PersonnelActions from '../actions/personnel';
import { PersonnelTable } from '../components/Personnel';
import CommonPagination from '../components/CommonPagination';

class Personnel extends Component {
    constructor(props) {
        super(props);
        props.initPersonnelData();
    }

    refreshPage() {
    }

    render() {
        return (
            <div className="admin-content">
                <PersonnelTable data={ this.props.personnel.data } />
                <CommonPagination refreshPage={ this.refreshPage } data={ this.props.personnel } />
            </div>
        );
    }
}

function mapStateToProps(state) {
  return {
    personnel: state.personnel
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators(PersonnelActions, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Personnel);
