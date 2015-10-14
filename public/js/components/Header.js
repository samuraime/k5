import React, { Component, PropTypes } from 'react';
import { Form, Input, Modal, ModalTrigger } from 'amazeui-react';

export default class Header extends Component {
    constructor() {
        super();
        this.profileModal = (
            <Modal type="popup" title="个人资料" closeViaDimmer>
                <Form horizontal>
                    <Input type="text" label="用户名" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="text" label="显示名" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="email" label="邮箱" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="text" label="电话" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="submit" amStyle="primary" value="提交" wrapperClassName="am-u-sm-offset-2 am-u-sm-10" />
                </Form>
            </Modal>
        );
        this.passwordModal = (
            <Modal type="popup" title="修改密码" closeViaDimmer>
                <Form horizontal>
                    <Input type="password" label="旧密码" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="password" label="新密码" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="password" label="确认密码" labelClassName="am-u-sm-2" wrapperClassName="am-u-sm-10" />
                    <Input type="submit" amStyle="primary" value="提交" wrapperClassName="am-u-sm-offset-2 am-u-sm-10" />
                </Form>
            </Modal>
        );
    }

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
                        <li className="am-header-information"> 欢迎您登录</li>
                        <li className="am-dropdown" data-am-dropdown>
                            <a className="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                <span className="am-icon-users"></span> { user.name }
                                <span className="am-icon-caret-down"></span>
                            </a>
                            <ul className="am-dropdown-content">
                                <li>
                                    <ModalTrigger modal={ this.profileModal }>
                                    <a href="javascript:void(0)">
                                        <span className="am-icon-user"></span> 个人资料</a>
                                    </ModalTrigger>
                                </li>
                                <li>
                                    <ModalTrigger modal={ this.passwordModal }>
                                        <a href="javascript:void(0)">
                                            <span className="am-icon-cog"></span> 修改密码</a>
                                    </ModalTrigger>
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