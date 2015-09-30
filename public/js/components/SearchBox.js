import React, { Component } from 'react';

/**
 * @prop category array
 */
export default class SearchBox extends Component {
    search() {
        const category = this.refs.searchCategory.getDOMNode().value;
        const value = this.refs.searchValue.getDOMNode().value.trim();
        if (category && value) {
            this.props.handleSearch({[category]: value});
        }
    }

    renderOptions() {
        let cates = [];
        for (let key in this.props.category) {
            cates.push(<option value={ key }>{ this.props.category[key] }</option>);
        }
        return cates;
    }

    render() {
        return (
            <div className="am-u-sm-12 am-u-md-3">
                <div className="am-form-group">
                    <select ref="searchCategory" data-am-selected="{btnSize: 'sm'}">
                        <option value="all">所有类别</option>
                        { this.renderOptions() }
                    </select>
                </div>
                <div className="am-input-group am-input-group-sm">
                    <input type="text" ref="searchValue" className="am-form-field" />
                    <span className="am-input-group-btn">
                      <button onClick={ () => this.search() } className="am-btn am-btn-default" type="button">搜索</button>
                    </span>
                </div>
            </div>
        );
    }
}