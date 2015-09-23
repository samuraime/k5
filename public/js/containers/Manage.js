import React, { Component, PropTypes } from 'react';

export default class Manage extends Component {
    render() {
        return (
            <div>
                Manage
                {this.props.children}
            </div>
        );
    }
}