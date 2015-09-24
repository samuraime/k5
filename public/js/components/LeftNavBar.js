import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router';

export default class LeftNavBar extends Component {
    render() {
        const { permissions } = this.props;
        const visiblePermissions = ['index', 'summary', 'enterprise', 'personnel', 'log', 'message', 'manage'];

        return (
            <div className="admin-sidebar am-offcanvas" id="admin-offcanvas">
                <div className="am-offcanvas-bar admin-offcanvas-bar">
                    <ul className="am-list admin-sidebar-list">
                        { 
                            permissions.filter(permission => 
                                visiblePermissions.find(visiblePermission => 
                                    visiblePermission == permission
                                )
                            ).map(permission => {
                                return (<li><Link to={ '/' + permission } classNameName="am-cf"><span className="am-icon-check am-icon-file-text"></span>{ permission }</Link></li>)
                            })
                        }
                    </ul>
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