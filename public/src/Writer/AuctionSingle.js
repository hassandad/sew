import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import BidModal from './BidModal';
import AuctionBids from './AuctionBids'
import swal from 'sweetalert'
class AuctionSingle extends Component {
    constructor(props) {
        super(props);
        this.state = {
            auction : [],
            user: [],
            orderId: this.props.id,
            newBid: [],
            count : 0,
            totalBids : 0,
            type:'',
            subject:'',
            subSubject:''
        }
        this.getOrder = this.getOrder.bind(this);
        this.userSession = this.userSession.bind(this);
        this.newBid = this.newBid.bind(this);

    }

    componentWillMount() {
        this.getOrder();
        this.userSession();



    }

    componentDidMount() {






    }
    getOrder(){
        axios.get('/api/assignment/single/'+this.props.id).then(res => {
           this.setState({
               auction : res.data
           })

           axios.get('/api/assignment/getType/'+res.data[0].type_id).then(res => {
            if(res.status === 200){
                this.setState({
                    type: res.data[0].name,   
                });
            }
        });
        axios.get('/api/assignment/getSubject/'+res.data[0].subject_id).then(res => {
            if(res.status === 200){
                this.setState({
                    subject: res.data[0].name,
                    subSubject: res.data[0].subjectName,   
                });
            }
        });
        })
       
    }
    userSession(){
        axios.get('/api/getSession').then(res => {
            this.setState({
                user : res.data
            })

        })
    }
    openBidModal(){
        axios.get('/api/checkIfBidExists/'+this.state.user.id+'/'+this.state.orderId).then(res => {
            if(res.data > 0){
                swal({
                    title: 'Sorry',
                    text: 'You have already posted a bid on this auction',
                    icon: 'warning'
                });
            }else{
                $(ReactDOM.findDOMNode(this.refs.bidModal)).modal('show')
            }
        });

    }
    newBid(newBid){
        this.setState({newBid: newBid});
}
    render() {
        const auction = this.state.auction;
        const selection = ReactDOM.findDOMNode(this.refs.bidModal);
        return (
            
            <div className="content-wrapper">
                <div className="row">
            <div className="col-md-10 cnt-cnt">
            { this.state.auction.map((c,i) => {
                         return(
                <div className="panel panel-flat">
                    <div className="panel-body">
                        <div className="tabbable">
                            <ul className="nav nav-tabs nav-tabs-highlight">
                                <li className="active"><h4>{c.topic}</h4></li>
                                <li className="dropdown" style={{float: 'right'}}>
                                    <div className="btn-group">
                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                        </button>
                                        <ul className="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i className=" icon-flag7" /> Complain</a></li>
                                            <li><a href="#"><i className="icon-star-full2" /> Favorite</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div className="tab-content">
                                <div className="tab-pane active" id="badges-tab1">
                                    <div className="col-md-12"><h5>Description</h5></div>
                                    <div className="table-responsive col-md-6">
                                        <table className="table table-bordered table-striped table-hover bg-info-100">
                                            <tbody>
                                            <tr><td><i className=" icon-sort-time-asc" /></td>
                                                <td>Deadline:</td>
                                                <td><span style={{color: '#e60000'}}>{c.deadline} Days</span></td></tr>
                                            <tr><td><i className="icon-price-tag" /></td>
                                                <td>Customer Budget:</td>
                                                <td><span style={{color: '#000', fontWeight: 'bold'}}>$ {c.price -2}</span></td></tr>
                                            <tr><td><i className="icon-box" /></td>
                                                <td>Subject</td><td><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.subject}  {this.state.subSubject}</span></td>
                                            </tr>
                                            <tr><td><i className="icon-bookmark" /></td>
                                                <td>Paper Type:</td>
                                                <td><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.type}</span></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className="col-md-6">
                                        <ul className="media-list">
                                            <li className="media">
                                                <a href="#" className="media-left"><img src="assets/images/placeholder.jpg" className="img-circle img-md" alt /></a>
                                                <div className="media-body">
                                                    <a href="#" className="media-heading text-semibold text-default">Margo Baker</a>
                                                    <span className="text-size-small text-muted display-block"> Assignment Added on: <span style={{fontWeight: 'bold'}}>12-Aug-2017</span></span>
                                                </div>
                                                <div className="media-right media-middle">
                                                    <ul className="icons-list text-nowrap">
                                                    </ul>
                                                </div>
                                            </li>
                                            <li className="media">
                                                <p className="aucp">
                                                </p><table className="table" style={{background: '#f2f2f2', border: '1px solid #f2f2f2'}}>
                                                <tbody>
                                                <tr><td>Assignment ID:</td>
                                                    <td><span style={{color: '#000', fontWeight: 'bold'}}>{c.id} </span></td></tr>
                                                <tr><td>Stage of Competition:</td>
                                                    <td><span style={{color: '#fbc500', fontWeight: 'bold'}}>Auctions</span></td></tr>
                                                </tbody>
                                            </table>
                                                <p />
                                            </li>
                                        </ul>
                                    </div>
                                    <div className="row col-md-11">
                                        <div className="table-responsive col-md-12" style={{margin: '0 auto'}}>
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                                <tr><td style={{border: '1px solid #d0d0d0'}}>Formatting Style:</td>
                                                    <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>MLA</span></td>
                                                    <td style={{border: '1px solid #d0d0d0'}}>Paper Length:</td>
                                                    <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.page} Pages ({c.word} Words)</span></td></tr>
                                                <tr><td style={{border: '1px solid #d0d0d0'}}>Academic Level:</td>
                                                    <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.academic}</span></td>
                                                    <td style={{border: '1px solid #d0d0d0'}}>Type of Service:</td>
                                                    <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.service}</span></td></tr></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div className="tab-pane" id="badges-tab2">
                                    <div className="table-responsive col-md-6">
                                        <table className="table table-bordered table-striped table-hover bg-info-100">
                                            <tbody>
                                            <tr><td style={{border: '1px solid #d0d0d0'}}>Format:</td>
                                                <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>MLA</span></td></tr>
                                            <tr><td style={{border: '1px solid #d0d0d0'}}>Academic Level:</td>
                                                <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>--</span></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className="table-responsive col-md-6">
                                        <table className="table table-bordered table-striped table-hover bg-info-100">
                                            <tbody>
                                            <tr><td style={{border: '1px solid #d0d0d0'}}>Volume of:</td>
                                                <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>5 Pages (500 Words)</span></td></tr>
                                            <tr><td style={{border: '1px solid #d0d0d0'}}>Type of Service:</td>
                                                <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold'}}>Custom Writing</span></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div className="tab-pane" id="badges-tab3">
                                    DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                                </div>
                                <div className="tab-pane" id="badges-tab4">
                                    Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="panel-footer">
                        <div className="heading-elements">
                            {this.state.user.role === 1 ? <div/> : <button ref={'bidBtn'} type="button" onClick={this.openBidModal.bind(this)}  className="btn btn-success heading-btn btn-xlg pull-left">Place a Bid</button> }
                            <button type="button" className="btn btn-primary heading-btn btn-xlg pull-right">Attach File</button>
                        </div>
                    </div>
                </div>
                         )})}
                <div ref={'bidModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                            <BidModal newBid={this.newBid} user={this.state.user} orderId={this.state.orderId} selector={selection}/>
                    </div>
                </div>
            </div>
                </div>

                <div className="page-header">
                    <div className="page-header-content col-md-10 cnt-cnt">
                        <div className="page-title">
                            <h4>
                                <span className="text-semibold">OFFERS FROM WRITERS</span> <span>({this.state.totalBids})</span></h4>
                        </div>
                    </div>
                </div>

                <AuctionBids totalBids={(total) => this.setState({totalBids: total})} newBid={this.state.newBid} id={this.state.orderId} user={this.state.user}/>
            </div>

        )
    }

}

export default AuctionSingle;
