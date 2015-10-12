import React, { Component, Proptypes } from 'react';
import { Button, Form, Input } from 'amazeui-react';

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

/**
 * 分页就是分页
 * @prop total bool 是否显示总条目个数
 * @prop goto bool 是否显示跳转指定页
 * @prop next bool 是否显示上下页
 * @prop last bool 是否显示首尾页
 * @prop blockCount int default 5 分页块显示的个数 
 * @prop centered bool 居中对齐
 * @prop right bool 右对齐
 * @prop title object{ first, last, next, prev, goto } 文本信息呗
 */
export default class Pagination extends Component {
    handleGoPage() {
        let pageInfo = {searchKey: this.props.data.searchKey, searchValue: this.props.data.searchValue}
        let page = this.refs.page.getValue();
        let perPage = this.refs.perPage.getValue();

        perPage > 0 && (pageInfo.perPage = perPage);
        page >= 1 && page <= this.props.data.last_page && (pageInfo.page = page);

        this.props.handleGoPage(pageInfo);
    }

    render() {
        const defaultTitle = {first: '第一页', last: '最末页', next: '下一页', prev: '上一页', goto: '转到'}
        const title = Object.assign({}, defaultTitle, this.props.title);
        const { total, per_page, current_page, last_page, next_page_url, prev_page_url, from, to } = this.props.data;
        const show_page_count = (this.props.blockCount || 5) > last_page ? last_page : (this.props.blockCount || 5);
        const left_offset = Math.floor((show_page_count - 1) / 2);
        const right_offset = Math.floor(show_page_count / 2);
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
                <Pagination.Item active={ i == current_page } pageInfo={ {page: i, searchKey: this.props.data.searchKey, searchValue: this.props.data.searchValue} } handleGoPage={ this.props.handleGoPage }>{ i }</Pagination.Item>
            );
        } 

        return(
            <div>
                <div className="am-g">
                    <Form inline className="am-fr" onSubmit={ () => this.handleGoPage() }>
                        { `共  ${total}  条记录, 每页显示` }
                        <Input ref="perPage" defaultValue={ per_page } placeholder={ per_page } />
                        { `条记录, 当前` }
                        <Input ref="page" defaultValue={ current_page } placeholder={ current_page }/>
                        { ` / ${last_page}  页` }
                        <input type="submit" className="am-hide"/>
                    </Form>
                </div>
                <div className="am-g">
                    <ul className={ 'am-pagination' + (this.props.right ? ' am-pagination-right' : '') + (this.props.centered ? ' am-pagination-centered' : '')}>
                        { this.props.last ? 
                            <Pagination.Item 
                                disabled={ current_page == 1 } 
                                pageInfo={ {page: 1} } 
                                handleGoPage={ this.props.handleGoPage }>
                                { defaultTitle.first }
                            </Pagination.Item> : ''
                        }
                        { this.props.next ? 
                            <Pagination.Item 
                                disabled={ current_page == 1 } 
                                pageInfo={ {page: current_page - 1} } 
                                handleGoPage={ this.props.handleGoPage }>
                                { defaultTitle.prev }
                            </Pagination.Item> : ''
                        }
                        { mainPagination }
                        { this.props.next ? 
                            <Pagination.Item 
                                disabled={ current_page == last_page } 
                                pageInfo={ {page: current_page + 1} } 
                                handleGoPage={ this.props.handleGoPage }>
                                { defaultTitle.next }
                            </Pagination.Item> : ''
                        }
                        { this.props.last ? 
                            <Pagination.Item 
                                disabled={ current_page == last_page } 
                                pageInfo={ {page: last_page} } 
                                handleGoPage={ this.props.handleGoPage }>
                                { defaultTitle.last }
                            </Pagination.Item> : ''
                        }
                    </ul>
                </div>
            </div>
        );
    }
}

Pagination.Item = Item;