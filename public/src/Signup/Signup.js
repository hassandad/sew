import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import AsWriter from './AsWriter';
import AsCustomer from './AsCustomer';
class Signup extends Component {
    constructor() {
        super();

    }

    componentWillMount() {

    }

    componentDidMount() {

    }


    render() {
        return (
            <div className="col-sm-6 col-lg-6 signdiv">
                <ul className="nav nav-tabs">
                    <li className="active"><a href="#one" data-toggle="tab"><i className="icon-briefcase"></i> As Student</a></li>
                    <li><a href="#two" data-toggle="tab">As Writer</a></li>
                </ul>
                <div className="tab-content">
                    <div className="tab-pane active" id="one">
                        <div className="col-xs-12 col-sm-12 col-md-12">
                          <AsCustomer/>
                </div>
            </div>
                    <div className="tab-pane" id="two">
                        <div className="col-xs-12 col-sm-12 col-md-12">
                            <AsWriter/>
                        </div>
                    </div>
                    </div>
                    </div>
        );
    }
}

export default Signup