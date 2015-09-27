import React, { Component, Proptypes } from 'react';
import { Table } from 'amazeui-react';

export class PersonnelTable extends Component {
    renderBody() {
        
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
                    <th>证件编号</th>
                    <th>创建日期</th>
                    <th>操作</th>
                </thead>
                <tbody>
                {

                }
                </tbody>
            </Table>
        );
    }
}