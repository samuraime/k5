import React, { Component, Proptypes } from 'react';
import { Table, Button, ButtonGroup } from 'amazeui-react';

class Thead extends Component {
    renderThs() {
        let ths = [];
        for (let key in this.props.header) {
            ths.push(<th>{ this.props.header[key] }</th>);
        }

        return ths;
    }

    render() {
        return (
            <thead>
                <tr>
                    <th><input type="checkbox"/></th>
                    { this.renderThs() }
                </tr>
            </thead>
        );
    }
}

class Tr extends Component {
    renderTds() {
        if (this.props.header._action) {
            delete this.props.header._action;
        }

        let tds = [];
        for (let key in this.props.header) {
            tds.push(<td>{ this.props.data[key] }</td>);
        }

        return tds;
    }

    deleteItem() {
        this.props.handleDeleteItem(this.props.data.id);
    }

    render() {
        return (
            <tr>
                <td><input type="checkbox"/></td>
                { this.renderTds() }
                <td>
                    <ButtonGroup>
                        <Button amSize="xs"><span className="am-text-secondary am-icon-pencil-square-o"> 编辑</span></Button>
                        <Button amSize="xs"><span className="am-icon-copy"> 复制</span></Button>
                        <Button amSize="xs" onClick={ this.deleteItem.bind(this) }><span className="am-text-danger am-icon-trash-o"> 删除</span></Button>
                    </ButtonGroup>
                </td>
            </tr>
        );
    }
}

class Tbody extends Component {
    render() {
        return (
            <tbody>{ this.props.children }</tbody>
        );
    }
}

export default class DataTable extends Component {
    render() {
        return (
            <Table>
                <Thead header={ this.props.header } />
                <Tbody>
                    { this.props.data.map(item => 
                        <Tr data={ item } header={ this.props.header } handleDeleteItem={ this.props.handleDeleteItem }/>
                    ) }
                </Tbody>
            </Table>
        );
    }
}

DataTable.Thead = Thead;
DataTable.Tbody = Tbody;
DataTable.Tr = Tr;