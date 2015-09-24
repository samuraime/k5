import React, { Component, PropTypes } from 'react';

export default class Header extends Component {
    render() {
        const { user } = this.props;

        return (
            <header>这是header { user.name }</header>
        );
    }
}

Header.propTypes = {
  user: PropTypes.shape({
    id: PropTypes.string,
    name: PropTypes.string.isRequired,
    nickname: PropTypes.string.isRequired
  }).isRequired
};