import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

class BidComments extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: this.props.user.id,
            userRole: this.props.user.role,
            bid : this.props.bidId,
            bidDetails : [],
            message : '',
            date : moment(new Date()).format('YYYY-MM-DD'),
            comments: [],
            checkforCount : true,
        }
        this.getBidDetails = this.getBidDetails.bind(this);
        this.getBidComments = this.getBidComments.bind(this);
        this.getCommentCount = this.getCommentCount.bind(this);
        this.getlatestComment = this.getlatestComment.bind(this);
        this.enter = this.enter.bind(this);

    }

    componentWillMount() {
        this.getBidDetails();
        this.getBidComments();
        
    }

    componentDidMount() {
        this.interval =  setInterval(() => {
            this.getCommentCount();
        },2000);

    }
    getBidDetails(){
        axios.get('/api/getBidDetails/'+this.state.bid).then(res => {
            this.setState({
                bidDetails : res.data
            })

        })
    }
    enter(value)
    {
        if (value.key == 'Enter') {
            this.sendMessage();
        }
    }
    sendMessage(){
        if(this.state.message === ''){
            alert('empty message');
        }
        else if(this.props.user.id !== this.props.bidUser )
        {
            alert('you cant comment on other writer bid' );
        }
        else{
            var _state = this.state;
            var post = new URLSearchParams();
            post.append('user_id', _state.user);
            post.append('bid_id', _state.bid);
            post.append('role', _state.userRole);
            post.append('comment', _state.message);
            post.append('created', _state.date);

            axios.post('/api/orders/bidComment',post).then(res => {
                var arr = _state.comments;
                arr.push(res.data);
                this.setState({
                    comments : arr,
                    message: '',
                },() => {
                    ReactDOM.findDOMNode(this.refs.chatList).scrollTop = ReactDOM.findDOMNode(this.refs.chatList).scrollHeight;
                });

            });
        }
    }
    getBidComments(){
        axios.get('/api/getBidComments/'+this.state.bid).then(res => {
            this.setState({
                comments : res.data
            },() => {
                ReactDOM.findDOMNode(this.refs.chatList).scrollTop = ReactDOM.findDOMNode(this.refs.chatList).scrollHeight;
            })
        })
    }
    getCommentCount(){

        axios.get('/api/getBidCommentsCount/'+this.props.bidId).then(res => {
          var count  = res.data;
          if(count > this.state.comments.length){
                  this.props.commentCount(count);
                  this.getlatestComment();
          }
        })
    }
    getlatestComment(){
        axios.get('/api/getLatestBidComments/'+this.state.bid).then(res => {
            var arr = this.state.comments;
            arr.push(res.data);
            this.setState({
                comments : arr
            },() => {
                ReactDOM.findDOMNode(this.refs.chatList).scrollTop = ReactDOM.findDOMNode(this.refs.chatList).scrollHeight;
            });


        });
    }
    componentWillUnmount(){
        console.log('component is unmounted')
        clearInterval(this.interval)
    }
    render() {
        return (
            <div className="panel-body">
                <ul ref={'chatList'} className="media-list chat-list content-group">
                    <li className="media date-step">
                        <span>Today</span>
                    </li>
                    {
                        this.state.comments.map((c,i) => {
                            if(c.role === 1){
                                return(
                                    <li key={i} className="media reversed">
                                        <div className="media-body">
                                            <div style={{textTransform: "uppercase"}} className="media-content">{c.comment}</div>
                                            <span style={{textTransform: "uppercase"}} className="media-annotation display-block mt-10">Tue, 8:12 am <a href="#"><i className="icon-pin-alt position-right text-muted" /></a></span>
                                        </div>
                                        <div className="media-right">
                                            <a href="assets/images/placeholder.jpg"><span style={{textTransform: "uppercase"}}>{c.username}</span>
                                                <img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt />
                                            </a>
                                        </div>
                                    </li>
                                );
                            }else if(c.role === 2){
                                return(
                                    <li key={i} className="media">
                                        <div className="media-left">
                                            <a href="assets/images/placeholder.jpg"><span style={{width: '100%', textAlign: 'center', display: 'block',textTransform: "uppercase"}}>{c.username}</span>
                                                <img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt />
                                            </a>
                                        </div>
                                        <div className="media-body">
                                            <div style={{textTransform: "uppercase"}} className="media-content">{c.comment}</div>
                                            <span style={{textTransform: "uppercase"}} className="media-annotation display-block mt-10">Wed, 4:20 pm <a href="#"><i className="icon-pin-alt position-right text-muted" /></a></span>
                                        </div>
                                    </li>
                                )
                            }
                        })
                    }


                </ul>
                <textarea name="enter-message" onChange={(e) => this.setState({message : e.target.value})} onKeyPress={(e) => this.enter(e)} className="form-control content-group" rows={3} cols={1} placeholder="Enter your message..." value={this.state.message} />
            </div>
        )
    }

}

export default BidComments;
