import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router';

export default class LeftNavBar extends Component {
    render() {
        return (
            <ul>
                <li><Link to="/">index</Link></li>
                <li><Link to="/summary">summary</Link></li>
                <li><Link to="/manage">manage</Link></li>
            </ul>
        );
    }
}