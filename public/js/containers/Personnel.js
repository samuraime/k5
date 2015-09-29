import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as PersonnelActions from '../actions/personnel';
import DataTable from '../components/DataTable';
import Pagination from '../components/Pagination';

class Personnel extends Component {
    constructor(props) {
        super(props);
        props.initPersonnelData();
        this.handleGoPage = this.handleGoPage.bind(this);
        this.handleDeleteItem = this.handleDeleteItem.bind(this);
    }

    handleGoPage(pageInfo) {
        this.props.handleGoPage(pageInfo);
    }

    handleDeleteItem(id) {
        this.props.handleDeleteItem(id);
    }

    render() {
        const header = {id: 'ID', name: '姓名', mobile: '电话', email: '邮箱', birth: '生日', height: 'Height', weight: 'Weight', _action: '操作'}

        return (
            <div className="admin-content">
                <DataTable 
                    header={ header } 
                    data={ this.props.personnel.data }
                    handleDeleteItem={ this.handleDeleteItem } />
                <Pagination right={ true } handleGoPage={ this.handleGoPage } data={ this.props.personnel } />
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
