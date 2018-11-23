import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import swal from 'sweetalert'
class Login extends Component {
    constructor() {
        super();
        this.state = {
            email : '',
            password : '',
            resetEmail : '',
            style : [],
        }
        this.termsCheck = this.termsCheck.bind(this);
        this.setResetRequest = this.setResetRequest.bind(this);
        this.enter = this.enter.bind(this);


    }

    componentWillMount() {

    }

    componentDidMount() {

    }
    enter(value)
    {
        if (value.key == 'Enter') {
            this.loginUser();
        }
    }
    loginUser(){
        var _state = this.state;
        if(_state.email === '' || _state.password === ''){
            swal(
                {text: 'All fields are required',
                    icon : 'warning'}
            );
        }else{
        var post = new URLSearchParams();
        post.append('email', this.state.email);
        post.append('password', this.state.password);
        axios.post('/api/login',post).then(res => {
           if(res.status === 200){
               if(res.data.hasOwnProperty('success')){
                   setTimeout(()=> {
                       window.location.href = '/checkUser'
                   },1000);
               }else if(res.data.hasOwnProperty('error')){
                   swal({
                       text: res.data.msg,
                       icon : 'error'
                   })

               }
           }
        });
        }
    }

    termsCheck(e){
        var target = e.target;
        var value = target.type === 'checkbox' ? target.checked : target.value;
        console.log(value);
    }
    resetModal(){
        $(ReactDOM.findDOMNode(this.refs.resetModal)).modal('show');
    }
    setResetRequest(e){
        var tar = e.target;
            this.setState({resetEmail : tar.value});
    }
    sendResetRequest(){
        if(this.state.resetEmail === ''){
            this.refs.resetEmail.style.borderColor = 'red';
        }else{
            var post = new URLSearchParams();
            post.append('email', this.state.resetEmail);
            axios.post('/api/resetPassword',post).then(res => {
                if(res.status === 200){
                    if(res.data.hasOwnProperty('success')){
                        $(ReactDOM.findDOMNode(this.refs.resetModal)).modal('hide');
                        swal({
                            text : res.data.msg,
                            icon : 'success',
                        })
                    }else if(res.data.hasOwnProperty('error')){
                        swal({
                            text : res.data.msg,
                            icon : 'error',
                        })

                    }else if(res.data.hasOwnProperty('noEmail')){
                        swal({
                            text : res.data.msg,
                            icon : 'error',
                        })
                    }
                }

            })
            this.refs.resetEmail.style.borderColor = '';
        }
    }
    render() {
        return (
            <div className="register-form">
                <h2>Sign in <small>manage your account</small></h2>
                <hr className="colorgraph"/>

                    <div className="form-group">
                        <input type="email" onChange={(e) => this.setState({email : e.target.value})} onKeyPress={(e) => this.enter(e)} id="email" className="form-control input-lg" placeholder="Email Address" tabIndex="4"/>
                    </div>
                    <div className="form-group">
                        <input type="password" onChange={(e) => this.setState({ password : e.target.value})} onKeyPress={(e) => this.enter(e)} className="form-control input-lg" id="exampleInputPassword1" placeholder="Password"/>
                    </div>

                    <div className="row">
                        <div className="col-xs-4 col-sm-3 col-md-3">
					<span className="button-checkbox">
						<button type="button" onClick={this.resetModal.bind(this)} className="btn" data-color="info" tabIndex="7">Forgot your Username or Password?</button>
                        <input type="checkbox" onChange={(e) => this.termsCheck(e)} name="t_and_c" id="t_and_c" className="hidden" value="1"/>
					</span>
                        </div>
                    </div>

                    <hr className="colorgraph"/>
                        <div className="row">
                            <div className="col-xs-12 col-md-6"><button onClick={this.loginUser.bind(this)} className="btn btn-primary btn-block btn-lg" tabIndex="7">Sign in</button></div>
                            <div className="col-xs-12 col-md-6">Don't have an account? <a href="/signup">Register</a></div>
                        </div>
                <div ref={'resetModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="exampleModalLabel">Enter Email</h5>

                            </div>
                            <div className="modal-body">
                                <input ref={'resetEmail'} onChange={(e) => this.setResetRequest(e)} type="email" className="form-control input-lg" style={this.state.style}  placeholder="email"/>

                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onClick={this.sendResetRequest.bind(this)} className="btn btn-primary">Send Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Login