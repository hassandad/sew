import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import './signup.css';
import axios from 'axios';
import swal from 'sweetalert'

class AsCustomer extends Component {
    constructor() {
        super();
        this.state = {
            email : '',
            password : '',
            username : '',
            type : 1,
            tac : false
        }
        this.confirmPassword = this.confirmPassword.bind(this);
        this.termAccept = this.termAccept.bind(this);
        this.sendData = this.sendData.bind(this);
    }

    componentWillMount() {

    }

    componentDidMount() {
        $(ReactDOM.findDOMNode(this.refs.confPass)).hide();
    }
    confirmPassword(e){
        var confPass = e.target.value;
        if(confPass.length > 0){
            if(this.state.password !== confPass){
                $(ReactDOM.findDOMNode(this.refs.confPass)).show();
            }else{
                $(ReactDOM.findDOMNode(this.refs.confPass)).hide();
            }
        }else{
            $(ReactDOM.findDOMNode(this.refs.confPass)).hide();
        }


    }
    termAccept(e){
        var target = e.target;
        var value = target.type === 'checkbox' ? target.checked : target.value;
        this.setState({tac : value});
    }
    signup(){
        const _state = this.state;
        if(_state.email === '' || _state.username === '' ||  _state.password === ''){
            swal({
                text : 'All fields are required',
                icon : 'warning'
            });
        }else if(!_state.tac){
            swal({
                text: 'Please accept our Terms & Conditions to continue',
                icon : 'warning'
            });
        }else{
            this.sendData();
        }
    }
    sendData(){
        swal({
            text: 'registering you up, Please wait..'
        });
        var post = new URLSearchParams();
        post.append('email', this.state.email);
        post.append('username', this.state.email);
        post.append('password', this.state.password);
        post.append('type', this.state.type);
        axios.post('/api/createUser',post).then(res => {
            if(res.status === 200){
                swal.close();
                if(res.data.hasOwnProperty('success')){
                    swal({
                        text : res.data.msg,
                        icon: 'success'
                    });
                }else if(res.data.hasOwnProperty('error')){
                    swal({
                        text : res.data.msg,
                        icon: 'error'
                    });
                }
            }
        })
    }
    render() {
        return (
            <div>
                <div className="register-form">
                    <h2>Sign Up <small>as student</small></h2>
                    <hr className="colorgraph"/>

                    <div className="form-group">
                        <input type="email"  onChange={(e) => this.setState({ email : e.target.value })} id="email" className="form-control input-lg" placeholder="Email Address" tabIndex="4"/>
                    </div>
                    <div className="form-group">
                        <input type="text" onChange={(e) => this.setState({username : e.target.value})} id="email" className="form-control input-lg" placeholder="User Name" tabIndex="4"/>
                    </div>
                    <div className="form-group">
                        <input type="password" onChange={(e) => this.setState({ password : e.target.value})} className="form-control input-lg" id="exampleInputPassword1" placeholder="Password"/>
                    </div>
                    <div className="form-group">
                        <input type="password" className="form-control input-lg" id="exampleInputPassword1" onChange={this.confirmPassword} placeholder="Retype Password"/>
                        <span ref={'confPass'} className={'notmatch'}>Password do not match</span>
                    </div>

                    <div className="row">
                        <div className="col-xs-6 col-sm-6 col-md-6">
												<span className="button-checkbox">
							                        <input type="checkbox" name="t_and_c" id="t_and_c" className="" onChange={this.termAccept}/> I Accept <a href="#"> User Agreement</a>
												</span>
                        </div>
                    </div>

                    <hr className="colorgraph"/>
                    <div className="row">
                        <div className="col-xs-12 col-md-6"><button onClick={this.signup.bind(this)} className="btn btn-primary btn-block btn-lg" tabIndex="7">Sign Up</button></div>
                        <div className="col-xs-12 col-md-6">Already have an account? <br/><a href="/login">Sign In</a></div>
                    </div>
                </div>
            </div>
        );
    }
}

export default AsCustomer