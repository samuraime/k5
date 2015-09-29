import React, { Component, Proptypes } from 'react';

class Item extends Component {
    goPage(event) {
        // console.log(event);
        event.preventDefault();
        if (!(this.props.active || this.props.disabled)) {
            this.props.handleGoPage(this.props.pageInfo);
        }
    }
    
    render() {
        return (
            <li onClick={ this.goPage.bind(this) } 
                className={ (this.props.active ? 'am-active' : '') + (this.props.disabled ? 'am-disabled' : '') }>
                <a>
                { this.props.children }
                </a>
            </li>
        );
    }
}

export default class Pagination extends Component {
    render() {
        const { total, per_page, current_page, last_page, next_page_url, prev_page_url, from, to } = this.props.data;
        const show_page_count = 10;
        const left_offset = Math.floor((show_page_count - 1) / 2);
        const right_offset = Math.ceil(show_page_count / 2);
        let start_page, end_page;

        if (last_page > show_page_count) {
            if (current_page - left_offset <= 0) {
                start_page = 1;
                end_page = show_page_count;
            } else if (current_page + right_offset > last_page ) {
                start_page = last_page - show_page_count;
                end_page = last_page;
            } else {
                start_page = current_page - left_offset;
                end_page = current_page + right_offset;
            }
        } else {
            start_page = 1;
            end_page = show_page_count;
        }

        let mainPagination = [];
        for (let i = start_page; i <= end_page; i++) {
            mainPagination.push(
                <Pagination.Item active={ i == current_page } pageInfo={ {page: i} } handleGoPage={ this.props.handleGoPage }>{ i }</Pagination.Item>
            );
        } 

        return(
            <ul className={ 'am-pagination' + (this.props.right ? ' am-pagination-right' : '') }>
                <Pagination.Item 
                    disabled={ current_page == 1 } 
                    pageInfo={ {page: current_page - 1} } 
                    handleGoPage={ this.props.handleGoPage }>
                    &laquo;
                </Pagination.Item>
                { mainPagination }
                <Pagination.Item 
                    disabled={ current_page == last_page} 
                    pageInfo={ {page: current_page + 1} } 
                    handleGoPage={ this.props.handleGoPage }>
                    &raquo;
                </Pagination.Item>
            </ul>
        );
    }
}

Pagination.Item = Item;