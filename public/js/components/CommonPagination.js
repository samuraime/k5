import React, { Component, Proptypes } from 'react';
import { Pagination } from 'amazeui-react';

export default class CommonPagination extends Component {
    refreshPage() {
        
    }

    render() {
        const { total, per_page, current_page, last_page, next_page_url, prev_page_url, from, to } = this.props.data;
        const show_page_count = 10;
        let start_page, end_page;
        let left_offset = Math.floor(show_page_count - 1) / 2;
        let right_offset = Math.ceil(show_page_count / 2);

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
                <Pagination.Item active={ i == current_page } onClick={ this.refreshPage }>{ i }</Pagination.Item>
            );
        } 

        return(
            <Pagination right="true">
                <Pagination.Item disabled={ current_page == 1 }>&laquo;</Pagination.Item>
                { mainPagination }
                <Pagination.Item disabled={ current_page == last_page }>&raquo;</Pagination.Item>
            </Pagination>
        );
    }
}