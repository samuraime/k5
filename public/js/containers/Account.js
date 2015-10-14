import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as accountActions from '../actions/account';
import DataTable from '../components/DataTable';
import Pagination from '../components/Pagination';
import SearchBox from '../components/SearchBox';

class Account extends Component {
    constructor(props) {
        super(props);
        props.initAccountData();
        this.goPageWithInfo = this.goPageWithInfo.bind(this);
    }

    goPageWithInfo(pageInfo) {
        pageInfo = Object.assign({}, pageInfo, {searchKey: this.props.account.searchKey, searchValue: this.props.account.searchValue});
        this.props.handleGoPage(pageInfo);
    }

    render() {
        const header = {id: 'ID', name: '姓名', mobile: '电话', email: '邮箱', permission: '权限', _action: '操作'}
        const category = Object.assign({}, header);
        delete category.id;
        delete category._action;

        return (
            <div className="admin-content">
                <div className="am-cf am-padding border-bottom">
                    <div className="am-fl am-cf"><strong className="am-text-primary am-text-lg">系统管理</strong> / <small>账号管理</small></div>
                </div>
                <div className="am-g">
                    <div className="am-u-sm-12 am-u-md-6">
                        <div className="am-btn-toolbar">
                            <div className="am-btn-group am-btn-group-md">
                                <button type="button" className="am-btn am-btn-primary"><span className="am-icon-plus"></span> 新增</button>
                                <button type="button" className="am-btn am-btn-primary"><span className="am-icon-save"></span> 保存</button>
                                <button type="button" className="am-btn am-btn-primary"><span className="am-icon-trash-o"></span> 删除</button>
                            </div>
                        </div>
                    </div>
                    <SearchBox category={ category } handleSearch={ this.props.handleSearch }/>
                </div>
                <div className="am-g">
                    <div className="am-u-sm-12">
                        <DataTable 
                            header={ header } 
                            data={ this.props.account.data }
                            handleDeleteItem={ this.props.handleDeleteItem } />
                        <Pagination goto={ true } next={ true } last={ true } right={ true } handleGoPage={ this.goPageWithInfo } data={ this.props.account } />
                    </div>
                </div>
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

export default connect(mapStateToProps, mapDispatchToProps)(Account);
