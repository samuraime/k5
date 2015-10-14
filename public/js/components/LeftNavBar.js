import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router';
import { List, ListItem } from 'amazeui-react';

export default class LeftNavBar extends Component {
    render() {
        const { permissions } = this.props;

        return (
            <div className="admin-sidebar am-offcanvas" id="admin-offcanvas">
                <div className="am-offcanvas-bar admin-offcanvas-bar">
                    <List className="admin-sidebar-list">
                        <ListItem className={ permissions.indexOf('summary') != -1 ? '' : 'am-hide' }>
                            <Link to="/summary">
                                   <span className="am-icon-area-chart"> 数据汇总</span>
                            </Link>
                        </ListItem>
                        <ListItem className={ permissions.indexOf('enterprise') != -1 ? '' : 'am-hide' }>
                            <Link to="/enterprise">
                                <span className="am-icon-file"> 企业信息</span>
                            </Link>
                        </ListItem>
                        <ListItem className={ permissions.indexOf('personnel') != -1 ? '' : 'am-hide' }>
                            <Link to="/personnel">
                                <span className="am-icon-file"> 人才信息</span>
                            </Link>
                        </ListItem>
                        <ListItem className={ permissions.indexOf('log') != -1 ? '' : 'am-hide' + ' admin-parent'}>
                            <a data-am-collapse="{target: '#collapse-nav1'}">
                                <span className="am-icon-calendar"> 日志记录</span>
                                <span className="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <List className="am-collapse admin-sidebar-sub" id="collapse-nav1">
                                <ListItem>
                                    <Link to="/log/visit">
                                        <span className="am-icon-table"> 回访日志</span>
                                    </Link>
                                </ListItem>
                            </List>
                        </ListItem>
                        <ListItem className={ permissions.indexOf('message') != -1 ? '' : 'am-hide' }>
                            <Link to="/message">
                                <span className="am-icon-pencil-square-o"> 留言管理</span>
                            </Link>
                        </ListItem>
                        <ListItem className={ (permissions.indexOf('account') != -1 || permissions.indexOf('article') != -1) ? '' : 'am-hide' + ' admin-parent'}>
                            <a data-am-collapse="{target: '#collapse-nav2'}">
                                <span className="am-icon-puzzle-piece"> 系统管理</span>
                                <span className="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <List className="am-collapse admin-sidebar-sub" id="collapse-nav2">
                                <ListItem className={ permissions.indexOf('article') != -1 ? '' : 'am-hide'}>
                                    <Link to="/article">
                                        <span className="am-icon-list-alt"> 前台文章</span>
                                    </Link>
                                </ListItem>
                                <ListItem className={ permissions.indexOf('account') != -1 ? '' : 'am-hide'}>
                                    <Link to="/account">
                                        <span className="am-icon-table"> 账号管理</span>
                                    </Link>
                                </ListItem>
                            </List>
                        </ListItem>
                    </List>
                    <div className="am-panel am-panel-default admin-sidebar-panel">
                        <div className="am-panel-bd">
                            <p>
                                <span className="am-icon-bookmark"></span> 公告</p>
                            <p>时光静好，与君语；细水流年，与君同。</p>
                        </div>
                    </div>
                    <div className="am-panel am-panel-default admin-sidebar-panel">
                        <div className="am-panel-bd">
                            <p>
                                <span className="am-icon-tag"></span> wiki</p>
                            <p>Welcome to the Amaze UI wiki!</p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}