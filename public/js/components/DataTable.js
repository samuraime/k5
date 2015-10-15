import React, { Component, Proptypes } from 'react';
import { History } from 'react-router';
import { Table, Button, ButtonGroup, Modal, ModalTrigger, Icon } from 'amazeui-react';

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
    mixins: [History]
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

    renderDeleteModal() {
        return (
            <Modal type="confirm" title="删除确认">
            你确定删除此条记录吗?
            </Modal>
        );
    }

    render() {
        console.log(this.history);
        return (
            <tr>
                <td><input type="checkbox"/></td>
                { this.renderTds() }
                <td>
                    <Button amSize="xs" onClick={ () => History.pushState(null, '/') }><span className="am-text-secondary am-icon-pencil-square-o"> 编辑</span></Button>
                    <Button amSize="xs"><span className="am-icon-copy"> 复制</span></Button>
                    <ModalTrigger modal={ this.renderDeleteModal() } onConfirm={ () => this.props.handleDeleteItem(this.props.data.id) }>
                        <Button amSize="xs"><span className="am-text-danger am-icon-trash-o"> 删除</span></Button>
                    </ModalTrigger>
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
            <Table className="table-main" { ...{hover: true, striped: true, responsive: true} }>
                <Thead header={ this.props.header } />
                <Tbody>
                    { this.props.data.map(item => 
                        <Tr data={ item } 
                            header={ this.props.header } 
                            handleEditItem={ this.props.handleEditItem } 
                            handleDeleteItem={ this.props.handleDeleteItem } >
                        </Tr>
                    ) }
                </Tbody>
            </Table>
        );
    }
}

DataTable.Thead = Thead;
DataTable.Tbody = Tbody;
DataTable.Tr = Tr;