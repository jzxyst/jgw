import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Header from './Header'
import Footer from './Footer'
import Dashboard from "./Dashbord";

export default class Root extends Component {
    // constructor(props) {
    //     super(props);
    //     this.state = {
    //         isOpen: false
    //     }
    // }
    // handleToggle() {
    //     this.setState({
    //         isOpen: !this.state.isOpen
    //     })
    // }
    render() {
        return (
            <div>
                {/*<Header/>*/}
                {/*<Footer/>*/}
                <Dashboard/>
            </div>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(
        <Root />,
        document.getElementById('root')
    );
}
