import React, { Component } from 'react';
import { ButtonToolbar, Selected } from 'amazeui-react';

/**
 * @prop category array
 */
export default class SearchBox extends Component {
    search() {
        // const searchKey = this.refs.searchCategory.getDOMNode().value;
        const searchValue = this.refs.searchValue.getDOMNode().value.trim();
        this.props.handleSearch({searchKey: this.props.searchKey, searchValue});
    }

    generateSelectedProps() {
        let data = [];
        for (let key in this.props.category) {
            data.push({value: key, label: this.props.category[key]});
        }

        return {
            data,
            placeholder: '搜索选项',
            onChange: searchKey => {
                this.props.changeSearchParams({searchKey});
            }
                
        };
    }

    render() {
        return (
            <div className="am-u-sm-12 am-u-md-6">
                <form onSubmit={ () => this.search() }>
                    <div className="am-form-group am-u-md-6">
                        <ButtonToolbar>
                            <Selected { ...this.generateSelectedProps() } />
                        </ButtonToolbar>
                    </div>
                    <div className="am-input-group am-u-md-6 am-input-group">
                        <input type="text" ref="searchValue" className="am-form-field" />
                        <span className="am-input-group-btn">
                          <button onClick={ () => this.search() } className="am-btn am-btn-default" type="button">搜索</button>
                        </span>
                    </div>
                </form>
            </div>
        );
    }
}