import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as summaryActions from '../actions/summary';
import DataTable from '../components/DataTable';
import Pagination from '../components/Pagination';
import SearchBox from '../components/SearchBox';

class Summary extends Component {
    constructor(props) {
        super(props);
        // props.initSummaryData();
        this.goPageWithInfo = this.goPageWithInfo.bind(this);
    }

    goPageWithInfo(pageInfo) {
        pageInfo = Object.assign({}, pageInfo, {searchKey: this.props.summary.searchKey, searchValue: this.props.summary.searchValue});
        this.props.handleGoPage(pageInfo);
    }

    render() {
        const header = {id: 'ID', name: '姓名', mobile: '电话', email: '邮箱', birth: '生日', height: '身高', weight: '体重', _action: '操作'}
        const category = Object.assign({}, header);
        delete category.id;
        delete category._action;
        
        return (
            <div className="admin-content">
                <div className="am-cf am-padding border-bottom">
                    <div className="am-fl am-cf"><strong className="am-text-primary am-text-lg">数据汇总</strong></div>
                </div>
                <ul className="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
                    <li>
                        <a href="#" className="am-text-success">
                            <span className="am-icon-btn am-icon-file-text"></span>
                            <br />新增人才
                            <br />2300</a>
                    </li>
                    <li>
                        <a href="#" className="am-text-warning">
                            <span className="am-icon-btn am-icon-briefcase"></span>
                            <br />新增企业
                            <br />308</a>
                    </li>
                    <li>
                        <a href="#" className="am-text-danger">
                            <span className="am-icon-btn am-icon-recycle"></span>
                            <br />昨日访问
                            <br />80082</a>
                    </li>
                    <li>
                        <a href="#" className="am-text-secondary">
                            <span className="am-icon-btn am-icon-user-md"></span>
                            <br />在线用户
                            <br />3000</a>
                    </li>
                </ul>
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
                    <SearchBox { ...{category, searchKey: this.props.summary.searchKey, handleSearch: this.props.handleSearch, changeSearchParams: this.props.changeSearchParams} } />
                </div>
                <div className="am-g">
                    <div className="am-u-sm-12">
                        <DataTable 
                            header={ header } 
                            data={ this.props.summary.data }
                            handleDeleteItem={ this.props.handleDeleteItem } />
                        <Pagination goto={ true } next={ true } last={ true } right={ true } handleGoPage={ this.goPageWithInfo } data={ this.props.summary } />
                    </div>
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
  return {
    summary: state.summary
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators(summaryActions, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Summary);
