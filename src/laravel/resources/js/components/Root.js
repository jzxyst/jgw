import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Header from './Header'
import Footer from './Footer'

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
                <Header/>
                <Footer/>
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
