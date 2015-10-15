import React, { Component, PropTypes } from 'react';

export default class Index extends Component {
    render() {
        return (
            <div className="admin-content">
                <div className="am-cf am-padding border-bottom">
                    <div className="am-fl am-cf"><strong className="am-text-primary am-text-lg">呵呵管理系统</strong></div>
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
            </div>
        );
    }
}