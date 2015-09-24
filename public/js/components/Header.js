import React, { Component, PropTypes } from 'react';

export default class Header extends Component {
    render() {
        const { user } = this.props;

        return (
            <header className="am-topbar admin-header">
                <div className="am-topbar-brand">
                    <strong>公司名称</strong>
                    <small>后台管理模板</small>
                </div>
                <button className="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
                    <span className="am-sr-only">导航切换</span>
                    <span className="am-icon-bars"></span>
                </button>
                <div className="am-collapse am-topbar-collapse" id="topbar-collapse">
                    <ul className="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                        <li className="am-header-information am-text-secondary"> 欢迎您登录</li>
                        <li className="am-dropdown" data-am-dropdown>
                            <a className="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                <span className="am-icon-users"></span> { user.name }
                                <span className="am-icon-caret-down"></span>
                            </a>
                            <ul className="am-dropdown-content">
                                <li>
                                    <a href="/admin/account/profile">
                                        <span className="am-icon-user"></span> 个人资料</a>
                                </li>
                                <li>
                                    <a href="/admin/account/password">
                                        <span className="am-icon-cog"></span> 修改密码</a>
                                </li>
                                <li>
                                    <a href="/auth/logout">
                                        <span className="am-icon-power-off"></span> 退出登录</a>
                                </li>
                            </ul>
                        </li>
                        <li className="am-hide-sm-only">
                            <a href="javascript:;" id="admin-fullscreen">
                                <span className="am-icon-arrows-alt"></span>
                                <span className="admin-fullText">开启全屏</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
        );
    }
}

Header.propTypes = {
  user: PropTypes.shape({
    id: PropTypes.number,
    name: PropTypes.string.isRequired,
  }).isRequired
};