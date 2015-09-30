import React, { Component, PropTypes } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import * as PersonnelActions from '../actions/personnel';
import DataTable from '../components/DataTable';
import Pagination from '../components/Pagination';
import SearchBox from '../components/SearchBox';

class Personnel extends Component {
    constructor(props) {
        super(props);
        props.initPersonnelData();
    }

    render() {
        const header = {id: 'ID', name: '姓名', mobile: '电话', email: '邮箱', birth: '生日', height: 'Height', weight: 'Weight', _action: '操作'}
        const category = header;
        delete category.id;
        delete category._action;

        return (
            <div className="admin-content">
                <div className="am-cf am-padding border-bottom">
                    <div className="am-fl am-cf"><strong className="am-text-primary am-text-lg">数据列表</strong> / <small>企业列表</small></div>
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
                        <form className="am-form">
                            <DataTable 
                                header={ header } 
                                data={ this.props.personnel.data }
                                handleDeleteItem={ this.props.handleDeleteItem } />
                            <Pagination goto={ true } next={ true } last={ true } right={ true } handleGoPage={ this.props.handleGoPage } data={ this.props.personnel } />
                        </form>
                    </div>
                </div>
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
