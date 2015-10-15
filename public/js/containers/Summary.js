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
