import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
var user = '';
var userId = '';
var myId = '';
class View extends Component {
    constructor(props) {
        super(props);
        this.state = {
            chats : [],
			messages : [],
			message: ' ',
			username: '',
			lastPage:'',
			prevPage:null,
        }
    this.getChat = this.getChat.bind(this);
	this.getMessage = this.getMessage.bind(this);
	this.enter = this.enter.bind(this);
	this.check = this.check.bind(this);    

    }

    componentWillMount() {
        this.getChat();
        axios.get('/api/getSession').then(res => {
            if(res.status === 200){
				myId = res.data.id;
                this.setState({
                    username: res.data.username
                });
            }
		});
		this.interval = setInterval(this.check, 5000);
    }

    // componentDidMount() {

	// }
	check()
	{
		axios.get('/api/chat/writer/get/count/'+userId).then(res => {
            if(res.status === 200){
				if(res.data > 0)
				{
					this.getMessage(userId,user);
				}
            }
		});
	}
	enter(value)
    {
        if (value.key == 'Enter') {
            this.sendMessage();
        }
    }
    getChat(){
        axios.get('/api/chat/get').then(res => {
            if(res.status === 200){
                this.setState({
                    chats: res.data
				});
				if (this.props.id) {
					axios.get('/api/writer/get/single/'+this.props.id).then(res => {
						if(res.status === 200){
							this.getMessage(this.props.id, res.data['0'].name)
							
						}
					});
				} else {
					this.getMessage(res.data['0'].id, res.data['0'].username)
				}
                
            }
		});
		
    }
    getMessage(id,name){
        user = name;
        userId = id;
        axios.get('/api/chat/message/get/'+id).then(res => {
            if(res.status === 200){
				axios.get(res.data.last_page_url).then(response => {
                this.setState({
					messages: response.data.data,
					prevPage:response.data.prev_page_url
				});
				if (response.data.data.length < 5) {
					this.next();
				}
			});
            }
		});
	}
	next()
	{
		axios.get(this.state.prevPage).then(response => {
			var arr =[];
			response.data.data.forEach(element => {
				arr.push(element);
			});
			this.state.messages.forEach(element => {
				arr.push(element);
			});
			this.setState({
				messages : arr,
				prevPage : response.data.prev_page_url
			});
		});
	}
	sendMessage()
    {
        var post = new URLSearchParams();
        post.append('message', this.state.message);
        post.append('writer_id', userId);
        axios.post('/api/chat/message/add',post).then(res => {
            if(res.status === 200){
				var arr = this.state.messages;
				var arrrr = {sender_id : myId, message : this.state.message};
                arr.push(arrrr);
                this.setState({
                    messages : arr
				});
			   //this. getMessage(userId,user);
			   $(ReactDOM.findDOMNode(this.refs.message)).val('');
            }
        })
    }
	
    render() {
        return (
            <div>

              <div className="sidebar sidebar-main sidebar-default sidebar-separate col-md-3">
				<div className="sidebar-content">

					{/* <!-- Sidebar search --> */}
						<div className="panel panel-flat">
							<div className="panel-body">
								<div className="tabbable">
									<ul className="nav nav-tabs nav-tabs-highlight">
										<li className="active"><h4>Chat</h4></li>							
									</ul>
								</div>
								<div>
									<ul className="order-menu">
                                    { this.state.chats.map((c,i) => {
                         return(
										<li key={i}><a onClick={this.getMessage.bind(this, c.id , c.username)} className="a-active">{c.username}<span style={{float:"right", background: "#90ab00", padding:4 , borderRadius: 15, color: "#FFF", textAlign: "center"}}>{this.state.count}</span></a></li>
                         )})}
									</ul>
								</div>
							</div>
						</div>
					{/* <!-- /sidebar search --> */}
				</div>
			</div> 

            <div className="content-wrappr col-md-9">
				{/* <!-- Sidebars overview --> */}
				<div className="panel panel-flat">
					<div className="panel-heading">
								<div className="tabbable">
								<ul className="nav nav-tabs nav-tabs-highlight">
									<li className="active"><h4>Messages</h4></li>	
                                    	<li className="active pull-right"><h4>{user}</h4></li>							
								</ul>
								</div>
					</div>
                   
					<div className="panel-body">
					{this.state.prevPage == null ? <span className="media-annotation display-block mt-10" style={{marginLeft:'40%', fontSize:16}}>Conversation Ended</span> 
					: <a onClick={this.next.bind(this)} title="Click Here"><span className="media-annotation display-block mt-10" style={{marginLeft:'40%', fontSize:16}}>Load More Conversation</span></a> }
											
						<div className="panel-body">
                        { this.state.messages.map((c,i) => {
                         return(
									<ul key={i} className="media-list chat-list content-group">
									
                                        {c.sender_id == userId ? <li className="media reversed">
											<div className="media-body">
												<div className="media-content">{c.message}</div>
												<span className="media-annotation display-block mt-10">{c.created_on}<a href="#"><i className="icon-pin-alt position-right text-muted"></i></a></span>
											</div>

											<div className="media-right">
												<a ><span style={{textAlign: 'center',  display: 'block'}}>{user}</span>
													<img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt=""/>
												</a>
											</div>
										</li>  : <li className="media">
											<div className="media-left">
												<a ><span style={{textAlign: 'center',  display: 'block'}}>{this.state.username}</span>
													<img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt=""/>
												</a>
											</div>

											<div className="media-body">
												<div className="media-content">{c.message}</div>
												<span className="media-annotation display-block mt-10">{c.created_on}<a href="#"><i className="icon-pin-alt position-right text-muted"></i></a></span>
											</div>
										</li> }
										

										
									</ul>
                                )
                    })}
			                    	<textarea name="enter-message" ref={'message'} onChange={(e) => this.setState({message : e.target.value})} onKeyPress={(e) => this.enter(e)} className="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>

								</div>
					
				
                         
					</div>
											
				</div>
				{/* <!-- /sidebars overview --> */}
			</div>
            </div>
        );

    }
}
export default View
