import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import BidComments from './BidComments';
import EditModal from './EditModal';
import Postive from "./Postive";


class Bids extends Component {
    constructor(props) {
        super(props);
        this.state = {
            bid : this.props.data,
            user: this.props.user,
            slide: false,
            commentCount: 0
        }
        this.openComments = this.openComments.bind(this);
        this.getCommentCount = this.getCommentCount.bind(this);
        this.newBid = this.newBid.bind(this);
    }

    componentWillMount() {
        this.getCommentCount();
    }

    componentDidMount() {

        $(ReactDOM.findDOMNode(this.refs.timeline)).hide();

    }
    getCommentCount(){

        axios.get('/api/getBidCommentsCount/'+this.state.bid.id).then(res => {
            this.setState({
                commentCount : res.data
            });
        })
    }
    openComments(){
        var _this = this;
        _this.setState({
            slide : !this.state.slide
        },() => {
            if(this.state.slide){
                $(ReactDOM.findDOMNode(this.refs.timeline)).slideDown( "slow", function() {
                    $(ReactDOM.findDOMNode(_this.refs.arrowButton)).addClass('rotate-180');
                });
            }else{
                $(ReactDOM.findDOMNode(this.refs.timeline)).slideUp( "slow", function() {
                    $(ReactDOM.findDOMNode(_this.refs.arrowButton)).removeClass('rotate-180');
                });
            }
        });

    }
    openEditModal(){
                $(ReactDOM.findDOMNode(this.refs.editModal)).modal('show')
    }
    newBid(newBid){
        this.setState({newBid: newBid});
}
delete()
{
    axios.get('/api/orders/deleteBid/'+this.state.bid.id).then(res => {
        if(res.status === 200){
            if(res.data.hasOwnProperty('success')){
                swal({
                    title: 'Success',
                    text : 'Your bid has been removed',
                    icon : 'success'
                });
                setTimeout(()=> {
                    location.reload()
                },1000);
       
            }
        }
    })
}

    render() {
        const bid = this.state.bid;
        const selection = ReactDOM.findDOMNode(this.refs.editModal);
        return (
            <div className="row">
                <div className="col-md-10 cnt-cnt">
                    <div className="panel panel-flat">
                        <div className="panel-body">
                            <div className="col-md-12">
                                <ul className="media-list">
                                    <li className="media">
                                    {bid.image ? <a href="#" className="media-left"><img src={"/profile/"+bid.image} className="img-circle img-md" alt style={{borderRadius: 0}} /></a>
                                    : <a href="#" className="media-left"><img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt style={{borderRadius: 0}} /></a> }
                                        
                                        <div className="media-body">
                                            <a href="#" style={{textTransform: "uppercase"}} className="media-heading text-semibold text-default">{bid.name}</a>
                                            <span style={{textTransform: "uppercase"}} className="text-size-small text-muted display-block"> Bid on: <span style={{fontWeight: 'bold'}}>{bid.created_on}</span>
                {/* <span>
                  <div className="text-nowrap">
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                  </div>
                  <a href="#">4.7</a>
                </span> */}
              </span></div>
                                        <div className="media-right media-middle">
                                            <ul className="icons-list text-nowrap">
                                                <li><span style={{fontSize:13 , border:0,paddingTop:11, paddingBottom:11, paddingRight:20, paddingLeft:20,textTransform: "uppercase"}} className="bid-placed">{bid.type === 1 ? 'Negotiable' : 'Bid'+' $'+bid.amount}</span></li>
                                                <li className="dropdown">
                                                    <div className="btn-group">
                                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                                        </button>
                                                       
                                                        {bid.user_id == this.state.user.id ?  <ul className="dropdown-menu dropdown-menu-right"> <li><a style={{textTransform: "uppercase"}} onClick={this.delete.bind(this)}><i className=" icon-minus3" /> Remove</a></li></ul>
                                                        :  <ul className="dropdown-menu dropdown-menu-right"> <li><a style={{textTransform: "uppercase"}} href="#"><i className=" icon-flag7" /> Complain</a></li> </ul>}
                                                           
                                                           
                                                        
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div className="col-md-12">
                                <p>{bid.message}</p>
                            </div>
                        </div>
                        <div ref={'editModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                            <EditModal newBid={this.newBid} selector={selection} id={bid.id} user={this.state.user} message={bid.message} type={bid.type} amount={bid.amount} />
                      </div>
                     </div>
                        <div className="panel panel-flat">
                            <div className="panel-heading" style={{backgroundColor: '#eeeded'}}>
                                <Postive user={this.state.user} bidId={bid.id}/>

                                <div className="heading-elements">
                                    <ul className="icons-list">
                                        <li><span /><a ref={'arrowButton'} onClick={this.openComments} data-action="collapse" style={{float: 'right'}} /><span> Comments: <span style={{fontWeight: 'bold'}}>{this.state.commentCount}</span></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div ref={'timeline'} className="panel panel-flat timeline-content">
                                {this.state.slide ?  <BidComments  user={this.state.user} bidId={bid.id} bidUser={bid.user_id} /> : <div></div>}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}

export default Bids;
