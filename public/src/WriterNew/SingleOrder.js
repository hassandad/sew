import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import BidModal from './BidModal';
import swal from 'sweetalert'
var userId;
var user = '';
class SingleOrder extends Component {
    constructor(props) {
        super(props);
        this.state = {
            auction : [],
            messages:[],
            user: [],
            orderId: this.props.id,
            newBid: [],
            files:[],
            count : 0,
            totalBids : 0,
            type:'',
            subject:'',
            subSubject:'',
            format:'',
            show:false,

            bidType:'',
            bidAmount:'',
            bidDescription:'',
            bidFile:'',
            bidId:'',
            image:'',
            image2:'',
            imageName:'',
            image2Name:'',


			message: ' ',
			username: '',
			lastPage:'',
            prevPage:null,
            
            show:false,
            revisionFile:'',
            file2:'',
            file2Name:'',
            revisionFileId:'',

            imageTitle:'',
            imageType:'',
        }
        this.getOrder = this.getOrder.bind(this);
        this.userSession = this.userSession.bind(this);
        this.newBid = this.newBid.bind(this);
        this.onBidTypeChange = this.onBidTypeChange.bind(this);
        this.getMessage = this.getMessage.bind(this);
        this.enter = this.enter.bind(this);
        this.check = this.check.bind(this);

        this.handleChangeImage = this.handleChangeImage.bind(this);
    this.handleChangeImage2 = this.handleChangeImage2.bind(this);
    this.handleChangeImage3 = this.handleChangeImage3.bind(this);

    }

    componentWillMount() {

        this.userSession();
        this.getOrder();

       



    }

    componentDidMount() {



        $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
        this.interval = setInterval(this.check, 5000);


    }
    getOrder(){
        axios.get('/api/orders/single/'+this.props.id).then(res => {
           this.setState({
               auction : res.data
           })
          this.getMessage(res.data[0].student_id);
          user = res.data[0].name;

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
        axios.get('/api/order/underRevision/'+this.props.id).then(res => {
            if(res.status === 200){
                if (res.data == 'error') {
                }
                else{
                    this.setState({ show: true, revisionFile:res.data.file ,revisionFileId:res.data.id});
                }
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
                        bidType : res.data[0].type,
                        bidAmount : res.data[0].amount,
                        bidDescription : res.data[0].message,
                        bidFile : res.data[0].file});
                        if(res.data[0].type === 2){
                            $(ReactDOM.findDOMNode(this.refs.bidAmount)).show();
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
        axios.get('/api/order/getFile/'+this.props.id).then(res => {
            if(res.status === 200){
                this.setState({
                    files: res.data,   
                });
            }
        });
           //     $(ReactDOM.findDOMNode(this.refs.bidEditModal)).modal('show')
           

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
        }else if(this.state.type === '1'){
            this.setState({amount:'0'});
            $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
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
            if(_state.bidAmount !== ''){
               post.append('amount', _state.bidAmount);
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
        sendFile(){
            
                    var _state = this.state;
                    var post = new URLSearchParams();
                    if (!_state.imageTitle) {
                        swal({
                            title: 'Warning',
                            text : 'Insert Image Title',
                            icon : 'error'
                        });
                    } else if(!_state.imageType){
                        swal({
                            title: 'Warning',
                            text : 'Insert Image Type',
                            icon : 'error'
                        });
                    } else if(!_state.image2Name){
                        swal({
                            title: 'Warning',
                            text : 'Insert Image ',
                            icon : 'error'
                        });
                    }
                    else {
                    post.append('order_id', this.props.id);
                    post.append('file', _state.image2);
                    post.append('fileName', _state.image2Name);
                    post.append('sender', _state.user.id);
                    post.append('title', _state.imageTitle);
                    post.append('type', _state.imageType);
                    axios.post('/api/order/sendFile',post).then(res => {
                        if(res.status === 200){
                            if(res.data.hasOwnProperty('success')){
                                swal({
                                    title: 'Success',
                                    text : 'File has been Send ',
                                    icon : 'success'
                                });
    
                                this.setState({
                                    type : '1',
                                    amount: 0,
                                    description : '',
                                });
                                setTimeout(()=> {
                                    window.location.reload();
                                },1000);
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
handleChangeImage3(evt) {
    
    var self = this;
    var file = evt.target.files[0];
    var reader  = new FileReader();
    self.setState({file2Name:file.name});
    reader.onload = function(upload) {
        self.setState({file2: upload.target.result});
    };
    reader.readAsDataURL(file); 
}
addFile() {
    $(ReactDOM.findDOMNode(this.refs.fileselect)).click(); 
}
addFile2() {
    $(ReactDOM.findDOMNode(this.refs.fileselect2)).click(); 
}
accpet(oid,aid){
    axios.get('/api/order/accept/'+oid+'/'+aid).then(res => {
        if(res.status === 200){
            swal({
                text: 'You have been successfully hired for the assignment' ,
                icon : 'success'
            })
            
            axios.get('/api/order/accept/notification/'+oid+'/'+aid).then(res => {});
            setTimeout(()=> {
                window.location.reload();
            },1000);
        }
    });
}
reject(oid,aid){
    axios.get('/api/order/reject/'+oid+'/'+aid).then(res => {
        if(res.status === 200){
            swal({
                text: 'The approval has been Rejected , bid again to get the order' ,
                icon : 'success'
            })
            setTimeout(()=> {
                window.location.href='/dashboard/writer/myOrder';
            },1000);
        }
    });
}
check()
{
    axios.get('/api/chat/writer/get/count/'+this.props.id).then(res => {
        if(res.status === 200){
            if(res.data > 0)
            {
                this.getMessage(userId);
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
getMessage(id){
    userId = id;
    axios.get('/api/chat/message/get/'+this.props.id).then(res => {
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
    post.append('order_id', this.props.id);
    axios.post('/api/chat/message/add',post).then(res => {
        if(res.status === 200){
            var arr = this.state.messages;
            var arrrr = {sender_id : this.state.user.id, message : this.state.message};
            arr.push(arrrr);
            this.setState({
                messages : arr
            });
           //this. getMessage(userId,user);
           $(ReactDOM.findDOMNode(this.refs.message)).val('');
        }
    })
}
sendFile2(){
    
            var _state = this.state;
            var post = new URLSearchParams();
            if (!_state.file2Name) {
                swal({
                    title: 'Warning',
                    text : 'Insert Image',
                    icon : 'error'
                });
            }
            else {
            post.append('order_id', this.props.id);
            post.append('file', _state.file2);
            post.append('fileName', _state.file2Name);
            post.append('sender', _state.user.id);
            post.append('id', _state.revisionFileId);
            post.append('title', 'i make the correction in this file');
            axios.post('/api/order/sendCorrectionFile',post).then(res => {
                if(res.status === 200){
                    if(res.data.hasOwnProperty('success')){
                        swal({
                            title: 'Success',
                            text : 'File has been Send ',
                            icon : 'success'
                        });
                        setTimeout(()=> {
                            window.location.reload();
                        },1000);
                    }
                }
              })
            }
}
refuseCorrection(){
    axios.get('/api/order/refuseCorrection/'+this.props.id).then(res => {
        if(res.status === 200){
            swal({
                text: 'The approval has been Rejected , Order has been refunded' ,
                icon : 'success'
            })
            setTimeout(()=> {
                window.location.reload();
            },1000);
        }
    });
}
approveRefund(){
    axios.get('/api/approveRefund/'+this.props.id).then(res => {
        if(res.status === 200){
            swal({
                text: 'The Assignment has been refunded' ,
                icon : 'success'
            })
            setTimeout(()=> {
                window.location.reload();
            },1000);
        }
    });
}
openFileModal(){
    $(ReactDOM.findDOMNode(this.refs.fileModal)).modal('show');
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
                            c.status == '0' ?  
                            <div className="panel panel-flat">
                            
                                <div className="panel-body" style={{backgroundColor:'#f9ea3847'}}>
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
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>${c.price}   You get ${Math.round(c.price - Math.ceil((20*c.price)/100))}</span></td></tr>
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
                                                                <span className="text-size-small text-muted display-block" style={{textTransform: "uppercase"}}> Assignment Added Date: <span style={{fontWeight: 'bold'}}>{c.a_created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table table-bordered table-striped table-hover bg-info-100" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assignment ID:</td>
                                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>{c.assignment_id} </span></td></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>Under Approval</span></td>
                                                        </tr>
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
            
                                <div className="panel-footer" style={{backgroundColor:'#f9ea3847'}}>
                                   
                                          <button ref={'bidBtn'} type="button" style={{marginRight:10}} onClick={this.openBidModal.bind(this)} onClick={this.reject.bind(this,c.id,c.assignment_id)} className="btn btn-danger heading-btn  pull-right btn-rounded">Reject</button>
                                          <button ref={'bidBtn'} type="button" style={{marginRight:10}} onClick={this.openBidModal.bind(this)} onClick={this.accpet.bind(this,c.id,c.assignment_id)} className="btn btn-success heading-btn  pull-right btn-rounded">Approved</button> 
                                     
                                </div>
                            
                            </div>
                            : c.status == '1' ?  


                           



                            <div className="panel panel-flat" style={{backgroundColor:'#1bdaf13b'}}>
                            
                                <div className="panel-body" style={{paddingBottom:0,backgroundColor:'#1bdaf13b'}}>
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
                                        
                                    </div>
                                </div>


                                {  c.refund == '1' ?
                                <div className="panel panel-flat" style={{margin:20}}>
                            
                                <div className="panel-body" style={{backgroundColor:'#e60000'}}>
                                <h4 style={{color:'white'}}><strong>Request For Refund</strong></h4>
                                </div>

                                <div className="panel-body">
                                <span style={{color: '#000', fontWeight: 'bold'}}>The Assignment Student is asking for Refund Click Approve For Remove Or Contact Us +21212112212 </span>
                                </div>
            
                                <div className="panel-footer">
                                   
                                          <button  type="button" style={{marginRight:10}} onClick={this.approveRefund.bind(this)}  className="btn btn-success heading-btn  pull-right btn-rounded">Approve Refund</button> 
                                </div>
                            
                            </div>
                            : <div/>}



                             { this.state.show ?
                                <div className="panel panel-flat" style={{margin:20}}>
                            
                                <div className="panel-body" style={{backgroundColor:'#f39c12'}}>
                                <h4 style={{color:'white'}}><strong>Request For Correction</strong></h4>
                                </div>

                                <div className="panel-body">
                                <span style={{color: '#000', fontWeight: 'bold'}}>The Assignment Student has set your File "{this.state.revisionFile}"  in under Revision because it was not the one that is required by the student so you should correct it OR if you think that your file is correct then you can Refuse to make Correction</span>
                                </div>
            
                                <div className="panel-footer">
                                   
                                          <button  type="button" style={{marginRight:10}} onClick={this.refuseCorrection.bind(this)}  className="btn btn-danger heading-btn  pull-right btn-rounded">Refuse To Make Correction</button>
                                          <button  type="button" style={{marginRight:10}} onClick={this.addFile2.bind(this)}  className="btn btn-success heading-btn  pull-right btn-rounded">Upload The Final Version</button> 
                                          <input type="file" style={{display: 'none'}} ref={'fileselect2'} className="file-styled-primary pull-right" onChange={this.handleChangeImage3} />
                                          { this.state.file2Name ? <button type="button" style={{marginRight:10}} onClick={this.sendFile2.bind(this)} className="btn btn-primary heading-btn  pull-right  btn-rounded">Send</button> : <div></div>}
                                </div>
                            
                            </div>
                            : <div/>}



                            
                                
                                <div className="panel-body">
									<div className="tabbable">
                                    <ul className="nav nav-tabs nav-tabs-solid">
                                    <li className="active"><a href="#solid-tab1" data-toggle="tab">Details</a></li>
                                    <li><a href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                    <li><a href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
                                            <div className="tab-content">
                                            <div className="tab-pane active" id="badges-tab1">
                                                <div className="col-md-12"><h5>Description</h5></div>
                                                <div className="table-responsive col-md-6">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{c.deadline} & ({c.country}  Remains)</span></td></tr>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>${c.price}   You get ${Math.round(c.price - Math.ceil((20*c.price)/100))}</span></td></tr>
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
                                                                <span  className="text-size-small text-muted display-block" style={{textTransform: "uppercase"}}> Assignment Assign on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table table-bordered table-striped table-hover bg-info-100" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assignment ID:</td>
                                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>{c.assignment_id} </span></td></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>In Progress</span></td>
                                                        </tr>
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

											<div className="tab-pane" id="solid-tab2">
                                            <div className="table-responsive col-md-12">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                            <th style={{textTransform: "uppercase"}}>Files</th>
                                                            <th style={{textTransform: "uppercase"}}>Title</th>
                                                            <th style={{textTransform: "uppercase"}}>Type</th>
                                                            <th style={{textTransform: "uppercase"}}>Sender</th>
                                                            <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                        </tr>
                                                        { this.state.files.map((f,i) => {
                                                             return(
                                                                 f.sender == this.state.user.id ?
                                                                 f.status == 0 ?
                                                        <tr key={i}><td>{i+1}</td>
                                                            <td><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                            <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                           </tr>
                                                           : <div/> : <div/>
                                                                         )})}
                                                        </tbody>
                                                    </table>
                                                </div>
											</div>

											<div className="tab-pane" id="solid-tab3">
                                            <div className="table-responsive col-md-12">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                            <th style={{textTransform: "uppercase"}}>Files</th>
                                                            <th style={{textTransform: "uppercase"}}>Title</th>
                                                            <th style={{textTransform: "uppercase"}}>Type</th>
                                                            <th style={{textTransform: "uppercase"}}>Sender</th>
                                                            <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                        </tr>
                                                        { this.state.files.map((f,i) => {
                                                             return(
                                                                 f.sender != this.state.user.id ?
                                                                 f.status == 0 ?
                                                        <tr key={i}><td>{i+1}</td>
                                                            <td><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                            <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                           </tr>
                                                           : <div/> : <div/>
                                                                         )})}
                                                        </tbody>
                                                    </table>
                                                </div>
											</div>




										</div>
									</div>
								</div>

                                <div className="panel-footer" style={{backgroundColor:'#1bdaf13b'}}>
                                <button ref={'bidBtn'} type="button" style={{marginLeft:10}} onClick={this.openFileModal.bind(this)}  className="btn btn-success heading-btn  pull-left btn-rounded">Attached File</button>
                                       
                                        {/* { this.state.image2 ? <button type="button" style={{marginRight:10}} onClick={this.sendFile.bind(this)} className="btn btn-primary heading-btn  pull-right  btn-rounded">Send</button> : <div></div>}
                                      <input type="file" ref={'fileselect'} style={{display: 'none'}} className="file-styled-primary pull-right" onChange={this.handleChangeImage2} />
                                      <button type="button" style={{marginRight:10}} onClick={this.addFile.bind(this)} className="btn btn-primary heading-btn  pull-right btn-rounded">Add File</button> */}
                                </div>
                            
                            </div>
                            : c.status == '2' ? 
                            <div className="panel panel-flat" style={{backgroundColor:'#e31ae647'}}>
                            
                                <div className="panel-body" style={{paddingBottom:0,backgroundColor:'#e31ae647'}}>
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
                                        
                                    </div>
                                </div>
                                

                                {  c.refund == '1' ?
                                <div className="panel panel-flat" style={{margin:20}}>
                            
                                <div className="panel-body" style={{backgroundColor:'#e60000'}}>
                                <h4 style={{color:'white'}}><strong>Request For Refund</strong></h4>
                                </div>

                                <div className="panel-body">
                                <span style={{color: '#000', fontWeight: 'bold'}}>The Assignment Student is asking for Refund Click Approve For Remove Or Contact Us +21212112212 </span>
                                </div>
            
                                <div className="panel-footer">
                                   
                                          <button  type="button" style={{marginRight:10}} onClick={this.approveRefund.bind(this)}  className="btn btn-success heading-btn  pull-right btn-rounded">Approve Refund</button> 
                                </div>
                            
                            </div>
                            : <div/>}





                                { this.state.show ?
                                <div className="panel panel-flat" style={{margin:20}}>
                            
                                <div className="panel-body" style={{backgroundColor:'#f39c12'}}>
                                <h4 style={{color:'white'}}><strong>Request For Correction</strong></h4>
                                </div>

                                <div className="panel-body">
                                <span style={{color: '#000', fontWeight: 'bold'}}>The Assignment Student has set your File "{this.state.revisionFile}"  in under Revision because it was not the one that is required by the student so you should correct it OR if you think that your file is correct then you can Refuse to make Correction</span>
                                </div>
            
                                <div className="panel-footer">
                                   
                                          <button  type="button" style={{marginRight:10}} onClick={this.refuseCorrection.bind(this)}  className="btn btn-danger heading-btn  pull-right btn-rounded">Refuse To Make Correction</button>
                                          <button  type="button" style={{marginRight:10}} onClick={this.addFile2.bind(this)}  className="btn btn-success heading-btn  pull-right btn-rounded">Upload The Final Version</button> 
                                          <input type="file" style={{display: 'none'}} ref={'fileselect2'} className="file-styled-primary pull-right" onChange={this.handleChangeImage3} />
                                          { this.state.file2Name ? <button type="button" style={{marginRight:10}} onClick={this.sendFile2.bind(this)} className="btn btn-primary heading-btn  pull-right  btn-rounded">Send</button> : <div></div>}
                                </div>
                            
                            </div>
                            : <div/>}






















            
                                
                               
                                <div className="panel-body">
									<div className="tabbable">
                                    <ul className="nav nav-tabs nav-tabs-solid">
                                    <li className="active"><a href="#solid-tab1" data-toggle="tab">Details</a></li>
                                    <li><a href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                    <li><a href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                     </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
                                            <div className="tab-content">
                                            <div className="tab-pane active" id="badges-tab1">
                                                <div className="col-md-12"><h5>Description</h5></div>
                                                <div className="table-responsive col-md-6">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{c.deadline} & ({c.country} Remains)</span></td></tr>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>${c.price}   You get ${Math.round(c.price - Math.ceil((20*c.price)/100))}</span></td></tr>
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
                                                            </p><table className="table table-bordered table-striped table-hover bg-info-100" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assignment ID:</td>
                                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>{c.id} </span></td></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>Under Revision</span></td>
                                                            </tr>
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

											<div className="tab-pane" id="solid-tab2">
                                            <div className="table-responsive col-md-12">
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                                 <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                    <th style={{textTransform: "uppercase"}}>Files</th>
                                                    <th style={{textTransform: "uppercase"}}>Title</th>
                                                    <th style={{textTransform: "uppercase"}}>Type</th>
                                                    <th style={{textTransform: "uppercase"}}>Sender</th>
                                                    <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                </tr>
                                                { this.state.files.map((f,i) => {
                                                     return(
                                                         f.sender == this.state.user.id ?
                                                         f.status == 0 ?
                                                <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                    <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                    <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                   </tr>
                                                   : <div/>  : <div/>
                                                                 )})}
                                                </tbody>
                                            </table>
                                        </div>
											</div>

											<div className="tab-pane" id="solid-tab3">
                                            <div className="table-responsive col-md-12">
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                                <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                    <th style={{textTransform: "uppercase"}}>Files</th>
                                                    <th style={{textTransform: "uppercase"}}>Title</th>
                                                    <th style={{textTransform: "uppercase"}}>Type</th>
                                                    <th style={{textTransform: "uppercase"}}>Sender</th>
                                                    <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                </tr>
                                                { this.state.files.map((f,i) => {
                                                     return(
                                                         f.sender != this.state.user.id ?
                                                         f.status == 0 ?
                                                <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                    <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                    <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                   </tr>
                                                   : <div/>  : <div/>
                                                                 )})}
                                                </tbody>
                                            </table>
                                        </div>
                                                </div>

											
										</div>
									</div>
								</div>
                                <div className="panel-footer" style={{backgroundColor:'#e31ae647'}}>
                                <button ref={'bidBtn'} type="button" style={{marginLeft:10}} onClick={this.openFileModal.bind(this)}  className="btn btn-success heading-btn  pull-left btn-rounded">Attached File</button>
                                
                                      {/* { this.state.image2 ? <button type="button" style={{marginRight:10}} onClick={this.sendFile.bind(this)} className="btn btn-primary heading-btn  pull-right  btn-rounded">Send</button> : <div></div>}
                                      <input type="file" style={{display: 'none'}} ref={'fileselect'} className="file-styled-primary pull-right" onChange={this.handleChangeImage2} />
                                      <button type="button" style={{marginRight:10}} onClick={this.addFile.bind(this)} className="btn btn-primary heading-btn  pull-right  btn-rounded">Add File</button> */}
                                </div>
                            
                            </div>
                            : c.status == '3' ?  
                            <div className="panel panel-flat" style={{backgroundColor:'#f4433661'}}>
                            
                                <div className="panel-body" style={{paddingBottom:0,backgroundColor:'#f4433661'}}>
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
                                       
                                    </div>
                                </div>
            
                               
                                <div className="panel-body">
									<div className="tabbable">
                                    <ul className="nav nav-tabs nav-tabs-solid">
                                    <li className="active"><a href="#solid-tab1" data-toggle="tab">Details</a></li>
                                    <li><a href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                    <li><a href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                   </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
                                            <div className="tab-content">
                                            <div className="tab-pane active" id="badges-tab1">
                                                <div className="col-md-12"><h5>Description</h5></div>
                                                <div className="table-responsive col-md-6">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{c.deadline}</span></td></tr>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>${c.price}   You get ${Math.round(c.price - Math.ceil((20*c.price)/100))}</span></td></tr>
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
                                                                <span className="text-size-small text-muted display-block" style={{textTransform: "uppercase"}}> Assignment Assigned on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table table-bordered table-striped table-hover bg-info-100" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assignment ID:</td>
                                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>{c.id} </span></td></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                           <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>Being Refunded</span></td>
                                                             </tr>
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

											<div className="tab-pane" id="solid-tab2">
                                            <div className="table-responsive col-md-12">
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                               <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                    <th style={{textTransform: "uppercase"}}>Files</th>
                                                    <th style={{textTransform: "uppercase"}}>Title</th>
                                                    <th style={{textTransform: "uppercase"}}>Type</th>
                                                    <th style={{textTransform: "uppercase"}}>Sender</th>
                                                    <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                </tr>
                                                { this.state.files.map((f,i) => {
                                                     return(
                                                         f.sender == this.state.user.id ?
                                                         f.status == 0 ?
                                               <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                    <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                    <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                   </tr>
                                                   : <div/> : <div/>
                                                                 )})}
                                                </tbody>
                                            </table>
                                        </div>
											</div>

											<div className="tab-pane" id="solid-tab3">
                                            <div className="table-responsive col-md-12">
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                                <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                    <th style={{textTransform: "uppercase"}}>Files</th>
                                                    <th style={{textTransform: "uppercase"}}>Title</th>
                                                    <th style={{textTransform: "uppercase"}}>Type</th>
                                                    <th style={{textTransform: "uppercase"}}>Sender</th>
                                                    <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                </tr>
                                                { this.state.files.map((f,i) => {
                                                     return(
                                                         f.sender != this.state.user.id ?
                                                         f.status == 0 ?
                                                <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                    <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                    <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                   </tr>
                                                   : <div/>  : <div/>
                                                                 )})}
                                                </tbody>
                                            </table>
                                        </div>
											</div>

										</div>
									</div>
								</div>
                                {/* <div className="panel-footer" >
                                   
                                       <button ref={'bidBtn'} type="button" style={{marginLeft:10}} onClick={this.openBidModal.bind(this)}  className="btn btn-success heading-btn  pull-left">View All File</button>
                                     
                                </div> */}
                            </div>
                            : 
                            <div className="panel panel-flat" style={{backgroundColor:'#27ef2d5e'}}>
                            
                                <div className="panel-body" style={{paddingBottom:0,backgroundColor:'#27ef2d5e'}}>
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
                                        
                                    </div>
                                </div>
            
                             
                                <div className="panel-body">
									<div className="tabbable">
										<ul className="nav nav-tabs nav-tabs-solid">
											<li className="active"><a href="#solid-tab1" data-toggle="tab">Details</a></li>
											<li><a href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                            <li><a href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                        </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
											<div className="tab-content">
                                            <div className="tab-pane active" id="badges-tab1">
                                                <div className="col-md-12"><h5>Description</h5></div>
                                                <div className="table-responsive col-md-6">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{c.deadline}</span></td></tr>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>${c.price}   You get ${Math.round(c.price - Math.ceil((20*c.price)/100))}</span></td></tr>
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
                                                                <span className="text-size-small text-muted display-block" style={{textTransform: "uppercase"}}> Assignment Assigned on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table table-bordered table-striped table-hover bg-info-100" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assignment ID:</td>
                                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>{c.id} </span></td></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                           <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000', fontWeight: 'bold'}}>Finished</span></td>
                                                        </tr>
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

											<div className="tab-pane" id="solid-tab2">
                                            <div className="table-responsive col-md-12">
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                                 <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                    <th style={{textTransform: "uppercase"}}>Files</th>
                                                    <th style={{textTransform: "uppercase"}}>Title</th>
                                                    <th style={{textTransform: "uppercase"}}>Type</th>
                                                    <th style={{textTransform: "uppercase"}}>Sender</th>
                                                    <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                </tr>
                                                { this.state.files.map((f,i) => {
                                                     return(
                                                         f.sender == this.state.user.id ?
                                                         f.status == 0 ?
                                                <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                    <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                    <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                   </tr>
                                                   : <div/>   : <div/>
                                                                 )})}
                                                </tbody>
                                            </table>
                                        </div>
											</div>

											<div className="tab-pane" id="solid-tab3">
                                            <div className="table-responsive col-md-12">
                                            <table className="table table-bordered table-striped table-hover bg-info-100">
                                                <tbody>
                                                <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                    <th style={{textTransform: "uppercase"}}>Files</th>
                                                    <th style={{textTransform: "uppercase"}}>Title</th>
                                                    <th style={{textTransform: "uppercase"}}>Type</th>
                                                    <th style={{textTransform: "uppercase"}}>Sender</th>
                                                    <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                </tr>
                                                { this.state.files.map((f,i) => {
                                                     return(
                                                         f.sender != this.state.user.id ?
                                                         f.status == 0 ?
                                                <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                    <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                    <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.type}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                    <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                   </tr>
                                                   : <div/>   : <div/>
                                                                 )})}
                                                </tbody>
                                            </table>
                                        </div>
											</div>

											
										</div>
									</div>
								</div>
                                {/* <div className="panel-footer" >
                                   
                                        <button ref={'bidBtn'} type="button" style={{marginLeft:10}} onClick={this.openBidModal.bind(this)}  className="btn btn-success heading-btn  pull-left">View All File</button>
                                     
                                </div> */}
                            </div>
                        
              
                         )})}
                <div ref={'bidModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                            <BidModal newBid={this.newBid} user={this.state.user} orderId={this.state.orderId} selector={selection}/>
                    </div>
                </div>
            </div>
                </div>






                <div ref={'fileModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                    <div className="modal-content">
                <div className="modal-header">
                   
                <div className="col-md-12"><h5 style={{textTransform: "uppercase"}}>Upload Files</h5></div>
                </div>
                <div className="modal-body">
                <div className="col-md-12">
                <div className="form-group">
                <label style={{textTransform: "uppercase"}} className="display-block text-semibold">Type : </label>
                <label className="radio-inline ">
                    <input type="radio" value="DRAFT" onChange={(e) => this.setState({imageType : e.target.value})} name="radio-inline-right" className="styled"/>
                    DRAFT
                </label>
                <label className="radio-inline ">
                    <input type="radio" value="COMPELETED PAPER" onChange={(e) => this.setState({imageType : e.target.value})} name="radio-inline-right" className="styled"/>
                    COMPELETED PAPER
                </label>
                <label className="radio-inline ">
                    <input type="radio" value="SUPPORTIVE MATERIAL" onChange={(e) => this.setState({imageType : e.target.value})} name="radio-inline-right" className="styled"/>
                    SUPPORTIVE MATERIAL
                </label>
            </div>
								</div>
                                <div className="col-md-12" style={{marginBottom:10}}>
                                <button type="button" className="btn btn-primary btn-rounded pull-left" onClick={this.addFile.bind(this)}>ADD File</button>
                                <input type="file"  ref={'fileselect'} style={{display: 'none'}} onChange={this.handleChangeImage2} />
                                </div>
                <div className="col-md-12" style={{marginBottom:10}}>
                                                <label style={{textTransform: "uppercase"}}>Title</label>
                                                <input type="text"  onChange={(e) => this.setState({imageTitle : e.target.value})}  className="form-control"/>
        
                </div>                    
                </div>
                
                <div className="modal-footer" >
                <button type="button" onClick={this.sendFile.bind(this)} className="btn btn-primary  btn-rounded ">Send</button>
                    <button type="button" className="btn btn-secondary  btn-rounded" data-dismiss="modal">Cancel</button>
                 </div>
                </div>
                    </div>
                </div>



                <div ref={'bidEditModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                    <div className="modal-content">
                <div className="modal-header">
                   
                </div>
                <div className="modal-body">
                <div className="col-md-12"><h5>All Files</h5></div>
                                                <div className="table-responsive col-md-12">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                            <th style={{textTransform: "uppercase"}}>Files</th>
                                                            <th style={{textTransform: "uppercase"}}>Sender</th>
                                                            <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                        </tr>
                                                        { this.state.files.map((f,i) => {
                         return(
                                                        <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                            <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                            <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                        </tr>
                         )})}
                                                        </tbody>
                                                    </table>
                                                </div>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                 </div>
                </div>
                    </div>
                </div>







                <div className="page-header">
                    <div className="page-header-content col-md-10 cnt-cnt">
                        <div className="page-title">
                            <h4 style={{textTransform: "uppercase"}}>
                                <span className="text-semibold">Chat With {user}</span></h4>
                        </div>
                    </div>
                </div>

                <div className="content-wrappr">
			
                <div className="row">
            <div className="col-md-10 cnt-cnt">
            	{/* <!-- Sidebars overview --> */}
				<div className="panel panel-flat">
					<div className="panel-heading">
								<div className="tabbable">
								<ul className="nav nav-tabs nav-tabs-highlight">
									<li className="active"><h4 style={{textTransform: "uppercase"}}>Messages</h4></li>	
                                    	<li className="active pull-right"><h4 >{user}</h4></li>							
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
												<div style={{textTransform: "uppercase"}} className="media-content">{c.message}</div>
												<span style={{textTransform: "uppercase"}} className="media-annotation display-block mt-10">{c.created_on}<a href="#"><i className="icon-pin-alt position-right text-muted"></i></a></span>
											</div>

											<div className="media-right">
												<a href="assets/images/placeholder.jpg"><span style={{textAlign: 'center',  display: 'block',textTransform: "uppercase"}}>{user}</span>
													<img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt=""/>
												</a>
											</div>
										</li>  : <li className="media">
											<div className="media-left">
												<a href="assets/images/placeholder.jpg"><span style={{textAlign: 'center',  display: 'block',textTransform: "uppercase"}}>{this.state.username}</span>
													<img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt=""/>
												</a>
											</div>

											<div className="media-body">
												<div style={{textTransform: "uppercase"}} className="media-content">{c.message}</div>
												<span style={{textTransform: "uppercase"}} className="media-annotation display-block mt-10">{c.created_on}<a href="#"><i className="icon-pin-alt position-right text-muted"></i></a></span>
											</div>
										</li> }
										

										
									</ul>
                                )
                    })}
			                    	<textarea name="enter-message" ref={'message'} onChange={(e) => this.setState({message : e.target.value})} onKeyPress={(e) => this.enter(e)} className="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>

					
				
                         
					</div>
											
				</div>
				{/* <!-- /sidebars overview --> */}
			</div>						</div>
            </div>						</div>
            
            </div>

        )
    }

}

export default SingleOrder;
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
