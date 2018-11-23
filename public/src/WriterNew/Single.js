import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import BidModal from './BidModal';
import AssignmentBids from './AssignmentBids'
import swal from 'sweetalert'
var userId;
var t = 0;
class Single extends Component {
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
            subSubject:'',
            format:'',
            show:false,

            bidType:'',
            bidAmount:'',
            amountFee:0,
            amountTotal:0,
            bidDescription:'',
            bidFile:'',
            bidId:'',
            image:'',
            image2:'',
            imageName:'',
            image2Name:'',

            elligable:true,
            warning:'',
        }
        this.getOrder = this.getOrder.bind(this);
        this.userSession = this.userSession.bind(this);
        this.newBid = this.newBid.bind(this);
        this.checkAmount = this.checkAmount.bind(this);
        this.onBidTypeChange = this.onBidTypeChange.bind(this);

        this.handleChangeImage = this.handleChangeImage.bind(this);
    this.handleChangeImage2 = this.handleChangeImage2.bind(this);

    }

    componentWillMount() {

        this.userSession();
        this.getOrder();

       



    }

    componentDidMount() {



        $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
        $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).hide();
        $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).hide();



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
        axios.get('/api/assignment/getFormat/'+res.data[0].format_id).then(res => {
            if(res.status === 200){
                this.setState({
                   format: res.data[0].name,   
                });
            }
        });
        })
       
    }
    userSession(){
        axios.get('/api/getSession').then(res => {

            axios.get('/api/checkIfBidExists/'+res.data.id+'/'+this.props.id).then(res => {
                if (res.data.length > 0) {
                    this.setState({show:true,
                        bidId : res.data[0].id,
                        type : res.data[0].type,
                        bidAmount : res.data[0].amount,
                        bidDescription : res.data[0].message,
                        bidFile : res.data[0].file});
                        if(res.data[0].type === 2){
                            $(ReactDOM.findDOMNode(this.refs.bidAmount)).show();
                            $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).show();
                            $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).show();
                        }
                }
                else
                {
                    this.setState({show:false});
                }
              
                
            });
            this.setState({
                user : res.data
            })

        })
    }
    openBidModal(){
            if(this.state.show){
                $(ReactDOM.findDOMNode(this.refs.bidEditModal)).modal('show')
            }else{
                $(ReactDOM.findDOMNode(this.refs.bidModal)).modal('show')
            }

    }
    newBid(newBid){
        this.setState({newBid: newBid});
}
onBidTypeChange(e){
    this.setState({
        type : e.target.value
    },() => {
        if(this.state.type === '2'){
            $(ReactDOM.findDOMNode(this.refs.bidAmount)).show();
            $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).show();
            $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).show();
        }else if(this.state.type === '1'){
            this.setState({bidAmount:'0',warning:'',elligable:true,amountFee:'0',amountTotal:'0'});
            $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
            $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).hide();
            $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).hide();
        }
    });
 }
sendBid(){
    
            var _state = this.state;
            var post = new URLSearchParams();
            post.append('assignment_id', _state.bidId);
            post.append('type', _state.type);
            post.append('message', _state.bidDescription);
            post.append('image', _state.image);
            post.append('imageName', _state.imageName);
            if(t !== ''){
               post.append('amount', t);
           }
            axios.post('/api/order/updateBid',post).then(res => {
              if(res.status === 200){
                  if(res.data.hasOwnProperty('success')){
                      swal({
                          title: 'Success',
                          text : res.data.msg,
                          icon : 'success'
                      });
                      setTimeout(()=> {
                        window.location.reload();
                    },1000);
                      
                      $(ReactDOM.findDOMNode(this.refs.bidModal)).modal('hide')
                      this.setState({
                          type : '1',
                          amount: 0,
                          description : '',
                      });
                  }
              }
            })
        }
        addFile() {
            $(ReactDOM.findDOMNode(this.refs.fileselect)).click(); 
        }
        addFile2() {
            $(ReactDOM.findDOMNode(this.refs.fileselect2)).click(); 
        }
        sendFile(){
            
                    var _state = this.state;
                    var post = new URLSearchParams();
                    post.append('type','1');
                    post.append('message', 'i send you a file check this');
                   
                    post.append('amount', '0');

                    if (this.state.show) {

                         post.append('assignment_id', _state.bidId);
                        post.append('image', _state.image2);
                        post.append('imageName', _state.image2Name);
                        axios.post('/api/order/updateBid',post).then(res => {
                            if(res.status === 200){
                                if(res.data.hasOwnProperty('success')){
                                    swal({
                                        title: 'Success',
                                        text : res.data.msg,
                                        icon : 'success'
                                    });
                                    setTimeout(()=> {
                                      window.location.reload();
                                  },1000);
                                    
                                    $(ReactDOM.findDOMNode(this.refs.bidModal)).modal('hide')
                                    this.setState({
                                        type : '1',
                                        amount: 0,
                                        description : '',
                                    });
                                }
                            }
                          })
                    } else {
                        
                        post.append('assignment_id', this.props.id);
                        post.append('file', _state.image2);
                        post.append('imageName', _state.image2Name);
                        axios.post('/api/order/placeBid',post).then(res => {
                            if(res.status === 200){
                                if(res.data.hasOwnProperty('success')){
                                    swal({
                                        title: 'Success',
                                        text : res.data.msg,
                                        icon : 'success'
                                    });

                                    setTimeout(()=> {
                                        window.location.reload();
                                    },1000);
                                    this.setState({
                                        type : '1',
                                        amount: 0,
                                        description : '',
                                    });
                                }
                            }
                          })
                    }
                    
                }
handleChangeImage(evt) {
    
    var self = this;
    var file = evt.target.files[0];
    var reader  = new FileReader();
    self.setState({imageName:file.name});
    reader.onload = function(upload) {
        self.setState({image: upload.target.result});
    };
    reader.readAsDataURL(file); 
}
handleChangeImage2(evt) {
    
    var self = this;
    var file = evt.target.files[0];
    var reader  = new FileReader();
    self.setState({image2Name:file.name});
    reader.onload = function(upload) {
        self.setState({image2: upload.target.result});
    };
    reader.readAsDataURL(file); 
}
checkAmount(amount)
{   var commision = Math.ceil((20*amount)/100);
    t= Math.round(parseInt(amount) + commision) ;
    if (isNaN(t)) {
        t=0;
    }
    if (this.state.auction[0].price < t) {
        this.setState({elligable: false,warning:"Amount Exceeded",amountFee:commision + '  Commission',amountTotal:t + '  Total Bid'});
    } else if (t <= 0) {
        this.setState({elligable: false,warning:"Amount Must Be Greater Than 0",amountFee:commision + '  Commission',amountTotal:t + '  Total Bid'});
    } else {
        this.setState({elligable: true,warning:'',amountFee:commision + '  Commission',amountTotal:t + '  Total Bid'});
    }
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
                                <li className="active"><h4 style={{textTransform: "uppercase"}}>{c.topic}</h4></li>
                                {/* <li className="dropdown" style={{float: 'right'}}>
                                    <div className="btn-group">
                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                        </button>
                                        <ul className="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i className=" icon-flag7" /> Complain</a></li>
                                            <li><a href="#"><i className="icon-star-full2" /> Favorite</a></li>
                                        </ul>
                                    </div>
                                </li> */}
                            </ul>
                            <div className="tab-content">
                                <div className="tab-pane active" id="badges-tab1">
                                    <div className="col-md-12"><h5 style={{textTransform: "uppercase"}}>Description</h5></div>
                                    <div className="table-responsive col-md-6">
                                        <table className="table table-bordered table-striped table-hover bg-info-100">
                                            <tbody>
                                            <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{c.deadline}</span></td></tr>
                                            <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>${c.price}   You get ${Math.round(c.price - (Math.ceil((20*c.price)/100)))}</span></td></tr>
                                            <tr><td style={{textTransform: "uppercase"}}><i className="icon-box" /></td>
                                                <td style={{textTransform: "uppercase"}}>Subject</td><td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.subject}  {this.state.subSubject}</span></td>
                                            </tr>
                                            <tr><td style={{textTransform: "uppercase"}}><i className="icon-bookmark" /></td>
                                                <td style={{textTransform: "uppercase"}}>Paper Type:</td>
                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.type}</span></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className="col-md-6">
                                        <ul className="media-list">
                                            <li className="media">
                                                <a href="#" className="media-left"><img src="/user.png" className="img-circle img-md" alt /></a>
                                                <div className="media-body">
                                                    <a href="#" className="media-heading text-semibold text-default">{c.name}</a>
                                                    <span className="text-size-small text-muted display-block" style={{textTransform: "uppercase"}}> Assignment Added on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
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
                                                <tr><td style={{textTransform: "uppercase"}}>Assignment ID:</td>
                                                    <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.id} </span></td></tr>
                                                <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                    <td style={{textTransform: "uppercase"}}><span style={{color: '#fbc500', fontWeight: 'bold'}}>Auctions</span></td></tr>
                                                    <tr><td style={{textTransform: "uppercase"}}>File:</td>
                                                        <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}><a href={"/file/"+c.file} download>{c.file}</a></span></td>
                                                        </tr>
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
                                                <tr><td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}>Formatting Style:</td>
                                                    <td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.format}</span></td>
                                                    <td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}>Paper Length:</td>
                                                    <td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.page} Pages ({c.word} Words) Total= {c.page * c.word} words</span></td></tr>
                                                <tr><td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}>Academic Level:</td>
                                                    <td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.academic}</span></td>
                                                    <td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}>Paper Size:</td>
                                                    <td style={{border: '1px solid #d0d0d0'}}><span style={{color: '#000', fontWeight: 'bold',textTransform: "uppercase"}}>{c.word == '550' ? <p>Double Space</p>:<p>Single Space</p> }</span></td></tr>
                                               <tr><td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}>Type of Service:</td>
                                                    <td style={{border: '1px solid #d0d0d0',textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{c.service}</span></td></tr></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="panel-footer">
                        <div className="heading-elements">
                            {this.state.user.role === 1 ? <div/> : this.state.show ? <button ref={'bidBtn'} type="button" onClick={this.openBidModal.bind(this)}  className="btn btn-success heading-btn  pull-left btn-rounded">Bid Placed</button>
                            :  <button ref={'bidBtn'} type="button" onClick={this.openBidModal.bind(this)}  className="btn btn-success heading-btn  pull-left btn-rounded">Place a Bid</button> }
                          { this.state.image2 ? <button type="button" onClick={this.sendFile.bind(this)} className="btn btn-primary heading-btn  pull-right  btn-rounded">Send</button> : <div></div>}
                          <input type="file" ref={'fileselect'} style={{display: 'none'}} className="file-styled-primary pull-right" onChange={this.handleChangeImage2} />
                          <button type="button" className="btn btn-primary btn-rounded pull-right" onClick={this.addFile.bind(this)}>ADD File</button>
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





                <div ref={'bidEditModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                    <div className="modal-content">
                <div className="modal-header">
                    <div style={styles.headerUser}>
                        <div>
                            <img style={styles.avatar} src={'/user.png'}/>
                            <strong>{this.state.user.username}</strong>
                        </div>
                        <div>
                            <span style={{color: '#000', fontWeight: 'bold'}}>{this.state.warning}</span>
                        </div>
                        <div style={styles.headerUser}>
                        {this.state.bidFile == '' ? <div></div>
                        : <a href={"/file/"+this.state.bidFile} download> <button type="button" title="File"  className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                        <i className="icon-file-text2"></i>
                                </button></a>
                          }
                            <select onChange={(e) => this.onBidTypeChange(e)} className={'form-control'}>
                                <option value='2'>BID</option>
                                <option value='1'>NEGOTIABLE</option>
                            </select>
                            <input type="number"  ref={'bidAmount'} value={this.state.bidAmount} onChange={(e) => {this.setState({bidAmount:e.target.value}); this.checkAmount(e.target.value)}} className={'form-control'} placeholder={'Bid Amount'}/>
                        </div>
                    </div>
                </div>
                <div className="modal-body">
                <div className="form-group">
            <div className="col-md-6">
            <input ref={'bidAmountFee'} value={this.state.amountFee} className={'form-control'} placeholder={'Commission'}/>
            </div>
            <div className="col-md-6">
            <input ref={'bidAmountTotal'} value={this.state.amountTotal} className={'form-control'} placeholder={'Total'}/>
            </div>
            </div>
                    <textarea className={'form-control'} value={this.state.bidDescription} onChange={(e) => this.setState({bidDescription : e.target.value})}></textarea>
                </div>
                <div className="modal-footer">
                <button type="button" className="btn btn-primary btn-rounded pull-left" onClick={this.addFile2.bind(this)}>ADD File</button>
                <input type="file" ref={'fileselect2'} style={{display: 'none'}} className="file-styled-primary" onChange={this.handleChangeImage} />
                    <button type="button" className="btn btn-secondary  btn-rounded" data-dismiss="modal">Cancel</button>
                    {this.state.elligable ? <button type="button" className="btn btn-primary  btn-rounded" onClick={this.sendBid.bind(this)}>Update Bid</button>
                    : <button type="button" className="btn btn-primary  btn-rounded" disabled="disabled" >Update Bid</button>}
                </div>
                </div>
                    </div>
                </div>







                <div className="page-header">
                    <div className="page-header-content col-md-10 cnt-cnt">
                        <div className="page-title">
                            <h4 style={{textTransform: "uppercase"}}>
                                <span className="text-semibold">OFFERS FROM WRITERS</span> <span>({this.state.totalBids})</span></h4>
                        </div>
                    </div>
                </div>

                <AssignmentBids totalBids={(total) => this.setState({totalBids: total})} newBid={this.state.newBid} id={this.state.orderId} user={this.state.user}/>
            </div>

        )
    }

}

export default Single;
const styles = {
    panelBody: {
        display : 'flex',
        flexDirection: 'column'
    },
    title:{
        display: 'flex',
        flexDirection: 'row',
        alignItems: 'center'
    },
    titleBody : {
        display: 'flex',
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'space-between',
    },
    otherDetails : {
        display: 'flex',
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'space-between',
    },
    avatar : {
        width: 50,
        height: 50,
        marginRight: 10
    },
    headerUser: {
        display: 'flex',
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center'
    }
}
