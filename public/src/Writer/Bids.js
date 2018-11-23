import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import BidComments from './BidComments'
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

    }

    componentWillMount() {
        this.getCommentCount
    }

    componentDidMount() {

        $(ReactDOM.findDOMNode(this.refs.timeline)).hide();

    }
    getCommentCount(){

        axios.get('/api/getBidCommentsCount/'+this.state.bid).then(res => {
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

    render() {
        const bid = this.state.bid;
        return (
            <div className="row">
                <div className="col-md-10 cnt-cnt">
                    <div className="panel panel-flat">
                        <div className="panel-body">
                            <div className="col-md-12">
                                <ul className="media-list">
                                    <li className="media">
                                        <a href="#" className="media-left"><img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt style={{borderRadius: 0}} /></a>
                                        <div className="media-body">
                                            <a href="#" className="media-heading text-semibold text-default">{bid.username}</a>
                                            <span className="text-size-small text-muted display-block"> Bid on: <span style={{fontWeight: 'bold'}}>12-Aug-2017</span>
                <span>
                  <div className="text-nowrap">
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                    <i className="icon-star-full2 text-size-base text-warning-300" />
                  </div>
                  <a href="#">4.7</a>
                </span>
              </span></div>
                                        <div className="media-right media-middle">
                                            <ul className="icons-list text-nowrap">
                                                <li><span className="bid-placed">{bid.type === 1 ? 'Negotiable' : 'Bid'+' '+bid.amount}</span></li>
                                                <li className="dropdown">
                                                    <div className="btn-group">
                                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                                        </button>
                                                        <ul className="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i className=" icon-flag7" /> Complain</a></li>
                                                            <li><a href="#"><i className=" icon-minus3" /> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div className="col-md-12">
                                <p>{bid.description}</p>
                            </div>
                        </div>
                        <div className="panel panel-flat">
                            <div className="panel-heading" style={{backgroundColor: '#eeeded'}}>
                                <Postive user={this.state.user} bidId={bid.bidId}/>

                                <div className="heading-elements">
                                    <ul className="icons-list">
                                        <li><span /><a ref={'arrowButton'} onClick={this.openComments} data-action="collapse" style={{float: 'right'}} /><span> Comments: <span style={{fontWeight: 'bold'}}>{this.state.commentCount}</span></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div ref={'timeline'} className="panel panel-flat timeline-content">
                                {this.state.slide ?  <BidComments commentCount={(total) => this.setState({commentCount : total})} user={this.state.user} bidId={bid.bidId}/> : <div></div>}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}

export default Bids;
