import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import { Pagination } from 'amazeui-react';
import * as PersonnelActions from '../actions/personnel';
import { PersonnelTable } from '../components/Personnel';

class Personnel extends Component {
    constructor(props) {
        super();
        props.initPersonnelData();
    }

    render() {
        return (
            <div className="admin-content">
                <PersonnelTable data={ this.props.personnel.data } />
                <Pagination data={ this.props.personnel } />
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
