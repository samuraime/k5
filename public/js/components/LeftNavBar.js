import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router';

export default class LeftNavBar extends Component {
    render() {
        const { permissions } = this.props;
        const visiblePermissions = ['index', 'summary', 'enterprise', 'personnel', 'log', 'message', 'manage'];

        return (
            <ul>
            { 
                permissions.filter(permission => 
                    visiblePermissions.find(visiblePermission => 
                        visiblePermission == permission
                    )
                ).map(permission => {
                    return (<li><Link to={ '/' + permission }>{ permission }</Link></li>)
                })
            }
            </ul>
        );
    }
}