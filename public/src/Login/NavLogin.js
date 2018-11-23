import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import swal from 'sweetalert';

class NavLogin extends Component {
    constructor() {
        super();
        this.state = {
            email: '',
            password: '',
        }
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
                //    // console.log(res.data.username);
                //    if(res.data.role === 2)
                //     {
                //         alert(res.data.role);
                //                 // setTimeout(()=> {
                //                 //             window.location.href = '/dashboard/writer/myOrder'
                //                 //         },2000);
                //     }
                //     else if(res.data.role === 1)
                //     {
                //                 setTimeout(()=> {
                //                             window.location.href = '/dashboard/student/myOrder'
                //                         },2000);
                //     }
                //     else{
                //         swal({
                //             text: 'Error',
                //             icon : 'error'
                //         })
                //     }
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

    render() {
        return (
            <div style={{display : 'flex',flexDirection: 'row', justifyContent: 'center', alignItems: 'center'}}>
                <li className="undiv"><input onKeyPress={(e) => this.enter(e)} onChange={(e) => this.setState({email : e.target.value})}   type="email" name="email" className="form-control signin" placeholder="Username"/></li>
                <li className="pssdiv"><input type="password"  onKeyPress={(e) => this.enter(e)} onChange={(e) => this.setState({ password : e.target.value})} name="email" className="form-control signin" placeholder="Password"/></li>
                <li className="sgndiv"><a href="#" onClick={this.loginUser.bind(this)}  className="btn-sign">SIGN IN</a></li>
                <li className="snupdiv"><a href="/signup" className="btn-signup">SIGN UP</a></li>
            </div>
        );
    }
}

export default NavLogin