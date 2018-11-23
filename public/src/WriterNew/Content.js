import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import swal from 'sweetalert';
import { ToastContainer, toast } from 'react-toastify';
import LastMessage from './LastMessage';
var counter = 0;
var messageCounter = 0;
class Content extends Component {
    constructor() {
        super();
        this.state = {
            iconStar : false,
            chats : [],
            messages : [],
            notification : [],
            unread:'',
            notificationCount: 0 ,
            chatCount: 0 ,
        }
    this.getChatCount = this.getChatCount.bind(this);
    this.notification = this.notification.bind(this);
    this.chat = this.chat.bind(this);
    

    }

    componentWillMount() {
        this.interval = setInterval(this.notification, 5000);
        this.interval = setInterval(this.chat, 5000);
    }
    getChat(){
        this.setState({
            chatCount: '0'
        });
        axios.get('/api/chat/writer/get').then(res => {
            if(res.status === 200){
                this.setState({
                    chats: res.data
                });
                this.getChatCount(res.data['0'].id, res.data['0'].username)
            }
        });
        axios.get('/api/chat/message/getCount').then(res => {
            if(res.status === 200){
                this.setState({
                    unread: res.data
                });
            }
        });
        
    }

    getChatCount(id,name){
        axios.get('/api/chat/writer/get/count/'+id).then(res => {
            if(res.status === 200){
                this.setState({
                    messages: res.data
                });
            }
		});
    }
    getNotification(){
        this.setState({
            notificationCount: '0'
        });
        axios.get('/api/notification/writer/get').then(res => {
            if(res.status === 200){
                this.setState({
                    notification: res.data
                });
            }
		});
    }
    notification(){
        axios.get('/api/notification/writer/get/single').then(res => {
            if(res.status === 200){
                if(res.data == 'error')
                {
                }
                else{
                toast.success(<p>{res.data.notification}</p>);
                counter++;
                this.setState({notificationCount: counter});
                setTimeout(()=> {
                    axios.get('/api/notification/writer/update/single/'+res.data.id).then(res => {
                    });
                },4000);
                }
            }
		});
    }
    chat(){
        axios.get('/api/chat/get/singleWriter').then(res => {
            if(res.status === 200){
                if(res.data == 'error')
                {
                }
                else{
                toast.info(<p>{res.data.name +' Message you'}</p>);
                messageCounter++;
                this.setState({chatCount: messageCounter});
                axios.get('/api/chat/update/single/'+res.data.id).then(res => {
                });
                }
            }
		});
    }
    render() {
        return (
            <ul className="nav navbar-nav">
             <ToastContainer postion="bottom-left"/>
            <li className="dropdown">
                <a onClick={this.getNotification.bind(this)}  className="dropdown-toggle" data-toggle="dropdown">
                    <i className="icon-sphere" style={{fontSize:25}} ></i>
                    <span className="visible-xs-inline-block position-right" style={{textTransform: "uppercase"}}>Notifications</span>
                    <span className="badge bg-warning-400">{this.state.notificationCount}</span>
                </a>
    
                <div className="dropdown-menu dropdown-content">
                    <div className="dropdown-content-heading" style={{textTransform: "uppercase"}}>
                    Notifications
                        <ul className="icons-list">
                            <li><a href="#"><i className="icon-gear"></i></a></li>
                        </ul>
                    </div>
    
                    <ul className="media-list dropdown-content-body width-300">
                    { this.state.notification.map((c,i) => {
                         return(
                        <li className="media">
                            <div className="media-left"><img src="/writer/assets/images/placeholder.jpg" className="img-circle img-sm" alt=""/></div>
                            <div className="media-body">
                                <a href="#" className="media-heading text-semibold" style={{textTransform: "uppercase"}}>{c.name}</a>
                                <span className="display-block text-muted text-size-small" style={{textTransform: "uppercase"}}>{c.notification}</span>
                            </div>
                            <div className="media-right media-middle"><span className="status-mark border-success"></span></div>
                        </li>
    
                         )})}
                    </ul>
    
                    <div className="dropdown-content-footer">
                        <a href="/dashboard/writer/notification" data-popup="tooltip" title="All Notification"><i className="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
    
            <li className="dropdown">
                <a onClick={this.getChat.bind(this)} className="dropdown-toggle" data-toggle="dropdown">
                    <i className=" icon-envelop3" style={{fontSize:25}}></i>
                    <span className="visible-xs-inline-block position-right" style={{textTransform: "uppercase"}}>Messages</span>
                    <span className="badge bg-warning-400">{this.state.chatCount}</span>
                </a>
    
                <div className="dropdown-menu dropdown-content width-350">
                    <div className="dropdown-content-heading" style={{textTransform: "uppercase"}}>
                        Messages
                       
                    </div>
    
                    <ul className="media-list dropdown-content-body">
                    { this.state.chats.map((c,i) => {
                         return(
                        <li className="media">
                            <div className="media-left">
                                <img src="/user.png" className="img-circle img-sm" alt=""/>
                                {/* <span className="badge bg-danger-400 media-badge">5</span> */}
                            </div>
    
                            <div className="media-body">
                                <a href={"/dashboard/writer/myOrder/single/"+c.order_id} className="media-heading">
                                    <span className="text-semibold" style={{textTransform: "uppercase"}}>Order ID : {c.order_id}</span>
                                </a>
                                <LastMessage style={{textTransform: "uppercase"}}  id={c.order_id} />
                            </div>
                        </li>
                         )})}
    
                    </ul>
    
                    <div className="dropdown-content-footer">
                        <a href="/dashboard/writer/message" data-popup="tooltip" title="All messages"><i className="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
    
            {/* <li className="dropdown">
                <a href="#" className="dropdown-toggle" data-toggle="dropdown">
                    <i className=" icon-newspaper"></i>
                    <span className="visible-xs-inline-block position-right">News</span>
                    <span className="badge bg-warning-400">2</span>
                </a>
    
                <div className="dropdown-menu dropdown-content width-350">
                    <div className="dropdown-content-heading">
                        News
                       
                    </div>
    
                    <ul className="media-list dropdown-content-body">
                        <li className="media">
                            <div className="media-left">
                                <img src="/writer/assets/images/placeholder.jpg" className="img-circle img-sm" alt=""/>
                                <span className="badge bg-danger-400 media-badge">5</span>
                            </div>
    
                            <div className="media-body">
                                <a href="#" className="media-heading">
                                    <span className="text-semibold">Comming Soon</span>
                                    <span className="media-annotation pull-right">04:58</span>
                                </a>
    
                                <span className="text-muted">who knows, maybe that would be the best thing for me...</span>
                            </div>
                        </li>
    
                    </ul>
    
                    <div className="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All messages"><i className="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li> */}
        </ul>
        );

    }
}
export default Content
