import React, { Component, Proptypes } from 'react';
import { Table } from 'amazeui-react';

export class PersonnelTable extends Component {
    renderBody() {
        return this.props.data.map(item => {
            return (
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>{ item.id }</td>
                    <td>{ item.name }</td>
                    <td>{ item.enterprise_id }</td>
                    <td>{ item.mobile }</td>
                    <td>{ item.email }</td>
                    <td>{ item.created_at }</td>
                    <td></td>
                </tr>
            );
        });
    }
    
    render() {
        return (
            <Table>
                <thead>
                    <th><input type="checkbox"/></th>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>工作单位</th>
                    <th>电话</th>
                    <th>邮箱</th>
                    <th>创建日期</th>
                    <th>操作</th>
                </thead>
                <tbody>
                { this.renderBody() }
                </tbody>
            </Table>
        );
    }
}