import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as enterpriseActions from '../actions/enterprise';
import DataTable from '../components/DataTable';
import Pagination from '../components/Pagination';
import SearchBox from '../components/SearchBox';

class Enterprise extends Component {
    constructor(props) {
        super(props);
        props.initEnterpriseData();
        this.goPageWithInfo = this.goPageWithInfo.bind(this);
    }

    goPageWithInfo(pageInfo) {
        pageInfo = Object.assign({}, pageInfo, {searchKey: this.props.enterprise.searchKey, searchValue: this.props.enterprise.searchValue});
        this.props.handleGoPage(pageInfo);
    }

    render() {
        const header = {id: 'ID', name: '单位名', type: '单位性质', representative: '法人', area: '占地面积', registration_date: '注册日期', registration_address: '注册地址', office_address: '办公地址', staff_scale: '人员规模', operation_scale: '经营规模', _action: '操作'}
        const category = Object.assign({}, header);
        delete category.id;
        delete category._action;
        
        return (
            <div className="admin-content">
                <div className="am-cf am-padding border-bottom">
                    <div className="am-fl am-cf"><strong className="am-text-primary am-text-lg">企业信息</strong> / <small>企业列表</small></div>
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
                    <SearchBox { ...{category, searchKey: this.props.enterprise.searchKey, handleSearch: this.props.handleSearch, changeSearchParams: this.props.changeSearchParams} } />
                </div>
                <div className="am-g">
                    <div className="am-u-sm-12">
                        <DataTable 
                            header={ header } 
                            data={ this.props.enterprise.data }
                            handleDeleteItem={ this.props.handleDeleteItem } />
                        <Pagination goto={ true } next={ true } last={ true } right={ true } handleGoPage={ this.goPageWithInfo } data={ this.props.enterprise } />
                    </div>
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
  return {
    enterprise: state.enterprise
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators(enterpriseActions, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Enterprise);
