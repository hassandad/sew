import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import BidComments from './BidComments';
import Postive from "./Postive";
import swal from 'sweetalert';
import StarRatingComponent from 'react-star-rating-component';
var userId;
var user = '';
class Single extends Component {
    constructor(props) {
        super(props);
        this.state = {
            auction : [],
            messages:[],
            user: [],
            files:[],
            bids:[],
            orderId: this.props.id,
            newBid: [],
            count : 0,
            totalBids : 0,
            type:'',
            subject:'',
            subSubject:'',
            format:'',
            bidCount:'',
            status:'',
            writer:'None',
            commentCount:0,
            image2:'',
            image2Name:'',

            types:[],
            subjects:[],
            subSubjects:[],
            formats:[],

            topic:'',
            detail:'',
            type_id:'',
            subject_id:'',
            format_id:'',
            service:'',
            academic:'',
            deadline:'',
            rawdeadline:'',
            page:'',
            word:'',
            price:'',
            status:'',
            slide: false,
            slideId:'',

            writer_id:'',
            lastDate:'',
            remains:'',
            order_id:'',

            imageTitle:'',
            imageType:'',

            file2:'',
            reason:'',

            refund:'',

            rating:2,
            review:'',
        }
        this.getOrder = this.getOrder.bind(this);
        this.userSession = this.userSession.bind(this);
        this.getBids = this.getBids.bind(this);
        this.getCommentCount = this.getCommentCount.bind(this);
        this.getMessage = this.getMessage.bind(this);
        this.enter = this.enter.bind(this);
        this.check = this.check.bind(this);
        this.handleChangeImage2 = this.handleChangeImage2.bind(this);
    }

    componentWillMount() {
        this.getOrder();
        this.userSession();
        this.getBids();


    }

    componentDidMount() {

        this.interval = setInterval(this.check, 5000);



    }
    getOrder(){
        axios.get('/api/assignment/single/'+this.props.id).then(res => {
           this.setState({
               auction : res.data,
               topic : res.data[0].topic,
               type_id : res.data[0].type_id,
               subject_id : res.data[0].subject_id,
               format_id : res.data[0].format_id,
               service : res.data[0].service,
               academic : res.data[0].academic,
               deadline : res.data[0].deadline,
               rawdeadline : res.data[0].rawdeadline,
               page: res.data[0].page,
               word : res.data[0].word,
               price : res.data[0].price,
               detail : res.data[0].detail,
               status : res.data[0].status,
           })
           
           axios.get('/api/assignment/getType/'+res.data[0].type_id).then(res => {
            if(res.status === 200){
                this.setState({
                    type: res.data[0].name,   
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
        axios.get('/api/assignment/getSubject/'+res.data[0].subject_id).then(res => {
            if(res.status === 200){
                this.setState({
                    subject: res.data[0].name,
                    subSubject: res.data[0].subjectName,   
                });
            }
        });
        if(res.data[0].status != '0')
        {
            axios.get('/api/order/get/single/'+this.props.id).then(res => {
                if(res.status === 200){
                    this.setState({
                        order_id:res.data[0].oid,
                        remains:res.data[0].price,
                        writer_id:res.data[0].id,
                        refund:res.data[0].refund,
                        writer: res.data[0].username+'  on  '+ res.data[0].created_on   
                    });
                    this.getMessage(res.data[0].id);
                    user = res.data[0].username;
                }
            });
        }
        });
        axios.get('/api/assignment/getBidCount/'+this.props.id).then(res => {
            if(res.status === 200){
                this.setState({
                    bidCount: res.data,   
                });
            }
        });
       
    }
    getCommentCount(){
        
                axios.get('/api/getBidCommentsCount/'+this.state.bid.id).then(res => {
                    this.setState({
                        commentCount : res.data
                    });
                })
  }
  openComments(id){
                var _this = this;
                if (id === _this.state.slideId) {
                    _this.setState({
                        slide : false,
                        slideId : ''
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
                    
                } else {
                    _this.setState({
                        slide : true,
                        slideId : id
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
               
        
            }
    getBids()
    {
        axios.get('/api/assignment/getBid/'+this.props.id).then(res => {
            if(res.status === 200){
                this.setState({
                    bids: res.data,   
                });
            }
        });
    }
    hire(id,type,price)
    {
        axios.get('/api/order/checkAuction/'+this.props.id).then(res => {
            if (res.data == "error") {
                swal({
                    text: 'Assignment is not on the Auction State' ,
                    icon : 'error'
                })
            }
            else{
                axios.get('/api/order/checkHire/'+id+'/'+this.props.id).then(res => {
                    if (res.data == "error") {
                        swal({
                            text: 'Hiring request is already Sended to the Writer' ,
                            icon : 'error'
                        })
                    }
                    else{
                        if(type == '1')
                        {
                            swal({
                                text: 'Negotiate with the writer to set the Bid Price first' ,
                                icon : 'error'
                            })
                        }
                        else{
                        axios.get('/api/order/add/'+id+'/'+this.props.id+'/'+price).then(res => {
                            swal({
                                text: 'Writer Bid Has Been Hired in Amount $'+price ,
                                icon : 'success'
                            })
                            this.getOrder();
                            this.getBids();
                        });
                    }
                    }
                });
            }
        });
    }
    chat(id,message)
    {
        var post = new URLSearchParams();
        post.append('message', message);
        post.append('writer_id', id);
        axios.post('/api/chat/add',post).then(res => {
            if(res.status === 200){
               window.location.href="/dashboard/student/message"; 
            }
        })
    }
    update()
    {
        var post = new URLSearchParams();
        post.append('topic', this.state.topic);
        post.append('detail', this.state.detail);
        post.append('type_id', this.state.type_id);
        post.append('subject_id', this.state.subject_id);
        post.append('format_id', this.state.format_id);
        post.append('service', this.state.service);
        post.append('academic', this.state.academic);
        post.append('deadline', this.state.rawdeadline);
        post.append('page', this.state.page);
        post.append('word', this.state.word);
        post.append('price', this.state.price);
        if (this.state.topic == '') {
            swal({
                text: 'Enter the Topic First' ,
                icon : 'error'
            })
        } else {
        axios.post('/api/assignment/update/'+this.props.id,post).then(res => {
            if(res.status === 200){
                $(ReactDOM.findDOMNode(this.refs.editModal)).modal('hide');
                swal({
                    text: 'Assignment has been Updated' ,
                    icon : 'success'
                })
                this.getOrder();
            }
        })
        }
    }
    reject(id)
    {
        axios.get('/api/order/checkAuction/'+this.props.id).then(res => {
            if (res.data == "error") {
                swal({
                    text: 'Assignment is not on the Auction State' ,
                    icon : 'error'
                })
            }
            else{
        axios.get('/api/assignment/bid/reject/'+id).then(res => {
            swal({
                text: 'Writer Bid Has Been Rejected' ,
                icon : 'success'
            })
            this.getOrder();
            this.getBids();
        });
    }});
    }
    editShow()
    {
        axios.get('/api/order/checkAuction/'+this.props.id).then(res => {
            if (res.data == "error") {
                swal({
                    text: 'Assignment is not on the Auction State' ,
                    icon : 'error'
                })
            }
            else{
        $(ReactDOM.findDOMNode(this.refs.editModal)).modal('show');
        axios.get('/api/assignment/getAllType').then(res => {
            if(res.status === 200){
                this.setState({
                    types: res.data,   
                });
            }
        });
        axios.get('/api/assignment/getAllSubject').then(res => {
            if(res.status === 200){
                this.setState({
                    subjects: res.data,   
                });
            }
        });
        axios.get('/api/assignment/getAllSubSubject').then(res => {
            if(res.status === 200){
                this.setState({
                    subSubjects: res.data,   
                });
            }
        });
        axios.get('/api/assignment/getAllFormat').then(res => {
            if(res.status === 200){
                this.setState({
                    formats: res.data,   
                });
            }
        });
    }
});
    }
    userSession(){
        axios.get('/api/getSession').then(res => {
            this.setState({
                user : res.data
            })

        })
    }
    addFile() {
        $(ReactDOM.findDOMNode(this.refs.fileselect)).click(); 
    }
    check()
    {
        axios.get('/api/chat/writer/get/count/'+this.state.order_id).then(res => {
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
        axios.get('/api/chat/message/get/'+this.state.order_id).then(res => {
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
        post.append('order_id', this.state.order_id);
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
    openBidModal(){
        axios.get('/api/order/getFile/'+this.state.order_id).then(res => {
            if(res.status === 200){
                this.setState({
                    files: res.data,   
                });
            }
        });
           //     $(ReactDOM.findDOMNode(this.refs.bidEditModal)).modal('show')
           

    }
    openFileModal(){
                $(ReactDOM.findDOMNode(this.refs.fileModal)).modal('show')
           

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
                post.append('order_id', _state.order_id);
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
    sendFile2(){
        
                var _state = this.state;
                var post = new URLSearchParams();
                if (!_state.reason) {
                    swal({
                        title: 'Warning',
                        text : 'Insert Reason',
                        icon : 'error'
                    });
                } else if(!_state.file2){
                    swal({
                        title: 'Warning',
                        text : 'Select File',
                        icon : 'error'
                    });
                }
                else {
                post.append('order_id', _state.order_id);
                post.append('file', _state.file2);
                post.append('sender', _state.user.id);
                post.append('title', _state.reason);
                axios.post('/api/order/sendRevisionFile',post).then(res => {
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
    compeleted(){
        axios.get('/api/assignment/compeleted/'+this.props.id).then(res => {
            if(res.status === 200){
                swal({
                    text: 'Assignement has been Compeleted',
                    icon : 'success'
                })
                setTimeout(()=> {
                    $(ReactDOM.findDOMNode(this.refs.rattingModal)).modal('show');
                },1000);
                
            }
        });
    }
    askRefund(){
        axios.get('/api/askRefund/'+this.props.id+'/'+this.state.order_id).then(res => {
            if(res.status === 200){
                if (res.data == 'success') {
                    swal({
                        text: 'Request For Refund Is Successfull',
                        icon : 'success'
                    })
                    setTimeout(()=> {
                        window.location.reload();
                    },1000);    
                } else {
                    swal({
                        text: 'There is not any Final File Present',
                        icon : 'error'
                    })
                }
            }
        });
    }
    revision(){
        axios.get('/api/sendForRevision/'+this.state.order_id).then(res => {
            if(res.status === 200){
                if (res.data == 'success') {
                    swal({
                        text: 'Final File Send For Revision',
                        icon : 'success'
                    })
                    setTimeout(()=> {
                        window.location.reload();
                    },1000);    
                } else {
                    swal({
                        text: 'There is not any Final File Present',
                        icon : 'error'
                    })
                }
                
            }
        });
    }
    onStarClick(nextValue, prevValue, name) {
        this.setState({rating: nextValue});
      }
      review(value){
          if (value == 1) {
              if (!this.state.review) {
                swal({
                    text: 'Enter the review message',
                    icon : 'error'
                })
              } else {
                  
            var post = new URLSearchParams();
            post.append('rating', this.state.rating);
            post.append('review', this.state.review);
            axios.post('/api/review/'+this.state.order_id,post).then(res => {
                if(res.status === 200){
                    if (res.data == 'success') {
                        swal({
                            text: 'Writer Has been Reviwed',
                            icon : 'success'
                        })
                        setTimeout(()=> {
                            window.location.reload();
                        },1000);    
                    }
                }
            });
              }
          } else {
            swal({
                text: 'Writer Has not been Reviwed',
                icon : 'error'
            })
            setTimeout(()=> {
                window.location.reload();
            },1000); 
          }
        
    }
    render() {
        return (
            
            <div className="content-wrapper">
                <div className="row">
            <div className="col-md-10 cnt-cnt">
            { this.state.auction.map((c,i) => {
                         return(
                            c.status == '0' ?  
                <div className="panel panel-flat" style={{backgroundColor:'#f9ea3847'}}>
                    <div className="panel-body">
                        <div className="tabbable">
                            <ul className="nav nav-tabs nav-tabs-highlight">
                                <li className="active"><h4 style={{textTransform: "uppercase"}}>{c.topic}</h4></li>
                                <li className="dropdown" style={{float: 'right'}}>
                                    <div className="btn-group">
                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                        </button>
                                        <ul className="dropdown-menu dropdown-menu-right">
                                            <li><a style={{textTransform: "uppercase"}} onClick={this.editShow.bind(this)}><i className=" icon-pencil" /> Edit</a></li>
                                            {/* <li><a href="#"><i className="icon-minus3" /> Remove</a></li> */}
                                        </ul>
                                    </div>
                                </li>
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
                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>$ {c.price}</span></td></tr>
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
                                                <div className="media-body">
                                                    <a href="#" style={{textTransform: "uppercase"}} className="media-heading text-semibold text-default">Added By : Me</a>
                                                    <span style={{textTransform: "uppercase"}} className="text-size-small text-muted display-block"> Assignment Added on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                </div>
                                                <div className="media-right media-middle">
                                                    <ul className="icons-list text-nowrap">
                                                    </ul>
                                                </div>
                                            </li>
                                            <li className="media">
                                                <p className="aucp">
                                                </p><table className="table" style={{border: '1px solid #f2f2f2'}}>
                                                <tbody>
                                                <tr><td style={{textTransform: "uppercase"}}>Assigned To:</td>
                                                    <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.writer} </span></td></tr>
                                                <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>Auctions</span></td>
								
                                                   </tr>
                                                   <tr>
                                                    <td style={{textTransform: "uppercase"}}>File:</td>
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
                </div>
                :
                c.status == '1' ?  
                <div className="panel panel-flat" style={{backgroundColor:'#1bdaf13b'}}>
                    <div className="panel-body">
                        <div className="tabbable">
                            <ul className="nav nav-tabs nav-tabs-highlight">
                                <li className="active"><h4 style={{textTransform: "uppercase"}}>{c.topic}</h4></li>
                                <li className="dropdown" style={{float: 'right'}}>
                                    <div className="btn-group">
                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                        </button>
                                        <ul className="dropdown-menu dropdown-menu-right">
                                        <li style={{textTransform: "uppercase"}}><i className=" icon-menu7" style={{padding:7}}/>Change Status</li>
                                            <li><a style={{textTransform: "uppercase"}} onClick={this.compeleted.bind(this)} ><i className=" icon-pencil" />Compeleted</a></li>
                                            <li><a style={{textTransform: "uppercase"}} onClick={this.revision.bind(this)} ><i className=" icon-pencil" />Send For Revision</a></li>
                                            {this.state.refund == '1' ? 
                                            <li><a style={{textTransform: "uppercase"}}><i className=" icon-pencil" /> Refund is under approval</a></li>
                                            : <li><a style={{textTransform: "uppercase"}} onClick={this.askRefund.bind(this)}><i className=" icon-pencil" /> Ask Refund</a></li>}
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                           
                        </div>
                    </div>

                    <div className="panel-body">
									<div className="tabbable">
                                    <ul className="nav nav-tabs nav-tabs-solid">
                                    <li className="active"><a style={{textTransform: "uppercase"}} href="#solid-tab1" data-toggle="tab">Details</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab4" onClick={this.openBidModal.bind(this)} data-toggle="tab">Under Revision File</a></li>
                                </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
                                            <div className="tab-content">
                                            <div className="tab-pane active" id="badges-tab1">
                                                <div className="col-md-12"><h5 style={{textTransform: "uppercase"}}>Description</h5></div>
                                                <div className="table-responsive col-md-6">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{this.state.deadline} , {this.state.remains} Remains</span></td></tr>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>$ {c.price}</span></td></tr>
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
                                                            <div className="media-body">
                                                                <a href="#" style={{textTransform: "uppercase"}} className="media-heading text-semibold text-default">Added By : Me</a>
                                                                <span style={{textTransform: "uppercase"}} className="text-size-small text-muted display-block"> Assignment Added on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assigned To:</td>
                                                                <a href={"/dashboard/student/writerProfile/"+this.state.writer_id}><td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.writer} </span></td></a></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>In Progress</span></td>
                                            
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
                                                                 f.sender != this.state.user.id ?
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


                                                                                      <div className="tab-pane" id="solid-tab4">
                                            <div className="form-group"  style={{backgroundColor:"#f8f8f8"}}>
                                    <div className="row" style={{padding:20}}>
                                        <div className="col-sm-4">
                                            <label style={{textTransform: "uppercase"}}>Select File</label>
                                            <select className="form-control" onChange={(e) => this.setState({file2 : e.target.value})}>
                                                <optgroup label="Choose File">
                                                <option></option>
                                               { this.state.files.map((f,i) => {
                                                             return(
                                                                 f.sender != this.state.user.id ?
                                                                 f.status == 0 ?
                                                                 <option style={{textTransform: "uppercase"}} key={i} value={f.id}>{f.file}</option>
                                                           : <div/> : <div/>
                                                                         )})}
                                             </optgroup>
                                                </select>
                                        </div>

                                        <div className="col-sm-6">
                                            <label style={{textTransform: "uppercase"}}>Reason</label>
                                            <input type="text" value={this.state.reason} onChange={(e) => this.setState({reason : e.target.value})} placeholder="Enter Reason" className="form-control"/>
                                        </div>

                                        <div className="col-sm-2">
                                            <button style={{marginTop:30}} type="button" onClick={this.sendFile2.bind(this)} className="btn btn-primary  btn-rounded ">Send</button>
                                        </div>
                                    </div>
                                </div>
                                            <div className="table-responsive col-md-12">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                            <th style={{textTransform: "uppercase"}}>Files</th>
                                                            <th style={{textTransform: "uppercase"}}>Reason</th>
                                                            <th style={{textTransform: "uppercase"}}>Sender</th>
                                                            <th style={{textTransform: "uppercase"}}>Status</th>
                                                            <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                        </tr>
                                                        { this.state.files.map((f,i) => {
                                                             return(
                                                                f.status == 1 ?
                                                        <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                            <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                            <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                            {f.sender == this.state.user.id ?
                                                            <td style={{textTransform: "uppercase"}}>For Revision</td>
                                                            :  <td style={{textTransform: "uppercase"}}>Compeleted</td> }
                                                            <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                           </tr>
                                                           : <div/>
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
                                        {/* { this.state.image2 ? <button type="button" style={{marginRight:10}} onClick={this.sendFile.bind(this)} className="btn btn-primary heading-btn  pull-right">Send</button> : <div></div>}
                                      <input type="file" className="file-styled-primary pull-right" onChange={this.handleChangeImage2} /> */}
                                   
                    </div>
                </div>
                :
                c.status == '2' ?  
                <div className="panel panel-flat" style={{backgroundColor:'#e31ae647'}}>
                    <div className="panel-body">
                        <div className="tabbable">
                            <ul className="nav nav-tabs nav-tabs-highlight">
                                <li className="active"><h4 style={{textTransform: "uppercase"}}>{c.topic}</h4></li>
                                <li className="dropdown" style={{float: 'right'}}>
                                    <div className="btn-group">
                                        <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                            <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                        </button>
                                        <ul className="dropdown-menu dropdown-menu-right">
                                        <li><i style={{textTransform: "uppercase"}} className=" icon-menu7" style={{padding:7}}/>Change Status</li>
                                            <li><a style={{textTransform: "uppercase"}} onClick={this.compeleted.bind(this)}><i className=" icon-pencil" /> Compeleted</a></li>
                                            <li><a style={{textTransform: "uppercase"}} onClick={this.revision.bind(this)} ><i className=" icon-pencil" />Send For Revision</a></li>
                                            {this.state.refund == '1' ? 
                                            <li><a style={{textTransform: "uppercase"}}><i className=" icon-pencil" /> Refund is under approval</a></li>
                                            : <li><a style={{textTransform: "uppercase"}} onClick={this.askRefund.bind(this)}><i className=" icon-pencil" /> Ask Refund</a></li>}
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                    <div className="panel-body">
									<div className="tabbable">
                                    <ul className="nav nav-tabs nav-tabs-solid">
                                    <li className="active"><a style={{textTransform: "uppercase"}} href="#solid-tab1" data-toggle="tab">Details</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab4" onClick={this.openBidModal.bind(this)} data-toggle="tab">Under Revision File</a></li>
                                </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
                                            <div className="tab-content">
                                            <div className="tab-pane active" id="badges-tab1">
                                                <div className="col-md-12"><h5 style={{textTransform: "uppercase"}}>Description</h5></div>
                                                <div className="table-responsive col-md-6">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className=" icon-sort-time-asc" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Deadline:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>{c.deadline} , {this.state.remains} remains</span></td></tr>
                                                        <tr><td style={{textTransform: "uppercase"}}><i className="icon-price-tag" /></td>
                                                            <td style={{textTransform: "uppercase"}}>Customer Budget:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>$ {c.price}</span></td></tr>
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
                                                            <div className="media-body">
                                                                <a href="#" style={{textTransform: "uppercase"}} className="media-heading text-semibold text-default">Added By : Me</a>
                                                                <span style={{textTransform: "uppercase"}} className="text-size-small text-muted display-block"> Assignment Added on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assigned To:</td>
                                                            <a href={"/dashboard/student/writerProfile/"+this.state.writer_id}><td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.writer} </span></td></a></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>Under Warranty</span></td>
                                            
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
                                                                 f.sender != this.state.user.id ?
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


                                            <div className="tab-pane" id="solid-tab4">
                                            <div className="form-group"  style={{backgroundColor:"#f8f8f8"}}>
                                    <div className="row" style={{padding:20}}>
                                        <div className="col-sm-4">
                                            <label style={{textTransform: "uppercase"}}>Select File</label>
                                            <select className="form-control" onChange={(e) => this.setState({file2 : e.target.value})}>
                                                <optgroup label="Choose File">
                                                <option></option>
                                               { this.state.files.map((f,i) => {
                                                             return(
                                                                 f.sender != this.state.user.id ?
                                                                 f.status == 0 ?
                                                                 <option style={{textTransform: "uppercase"}} key={i} value={f.id}>{f.file}</option>
                                                           : <div/> : <div/>
                                                                         )})}
                                             </optgroup>
                                                </select>
                                        </div>

                                        <div className="col-sm-6">
                                            <label style={{textTransform: "uppercase"}}>Reason</label>
                                            <input type="text" value={this.state.reason} onChange={(e) => this.setState({reason : e.target.value})} placeholder="Enter Reason" className="form-control"/>
                                        </div>

                                        <div className="col-sm-2">
                                            <button style={{marginTop:30}} type="button" onClick={this.sendFile2.bind(this)} className="btn btn-primary  btn-rounded ">Send</button>
                                        </div>
                                    </div>
                                </div>
                                            <div className="table-responsive col-md-12">
                                                    <table className="table table-bordered table-striped table-hover bg-info-100">
                                                        <tbody>
                                                        <tr><th style={{textTransform: "uppercase"}}>No</th>
                                                            <th style={{textTransform: "uppercase"}}>Files</th>
                                                            <th style={{textTransform: "uppercase"}}>Reason</th>
                                                            <th style={{textTransform: "uppercase"}}>Sender</th>
                                                            <th style={{textTransform: "uppercase"}}>Status</th>
                                                            <th style={{textTransform: "uppercase"}}>Added Date</th>
                                                        </tr>
                                                        { this.state.files.map((f,i) => {
                                                             return(
                                                                f.status == 1 ?
                                                        <tr key={i}><td style={{textTransform: "uppercase"}}>{i+1}</td>
                                                            <td style={{textTransform: "uppercase"}}><a href={"/file/"+f.file} download>{f.file}</a></td>
                                                            <td style={{textTransform: "uppercase"}}>{f.title}</td>
                                                            <td style={{textTransform: "uppercase"}}>{f.username}</td>
                                                            {f.sender == this.state.user.id ?
                                                            <td style={{textTransform: "uppercase"}}>For Revision</td>
                                                            :  <td style={{textTransform: "uppercase"}}>Compeleted</td> }
                                                            <td style={{textTransform: "uppercase"}}>{f.created_on}</td>
                                                           </tr>
                                                           : <div/>
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
                    {/* { this.state.image2 ? <button type="button" style={{marginRight:10}} onClick={this.sendFile.bind(this)} className="btn btn-primary heading-btn  pull-right">Send</button> : <div></div>}
                                      <input type="file" className="file-styled-primary pull-right" onChange={this.handleChangeImage2} /> */}
                                   
                    </div>
                </div>
                :
                <div className="panel panel-flat"  style={{backgroundColor:'#27ef2d5e'}}>
                     <div className="panel-body">
                        <div className="tabbable">
                        <ul className="nav nav-tabs nav-tabs-highlight">
                            <li className="active"><h4 style={{textTransform: "uppercase"}}>{c.topic}</h4></li>
                            {/* <li className="dropdown" style={{float: 'right'}}>
                                <div className="btn-group">
                                    <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                        <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                    </button>
                                </div>
                            </li> */}
                        </ul>
                       
                    </div>
                    </div>
                    <div className="panel-body">
									<div className="tabbable">
                                    <ul className="nav nav-tabs nav-tabs-solid">
                                    <li className="active"><a style={{textTransform: "uppercase"}} href="#solid-tab1" data-toggle="tab">Details</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab2" onClick={this.openBidModal.bind(this)}  data-toggle="tab">Writers File</a></li>
                                    <li><a style={{textTransform: "uppercase"}} href="#solid-tab3" onClick={this.openBidModal.bind(this)} data-toggle="tab">Students File</a></li>
                                
                                </ul>

										<div className="tab-content">
											<div className="tab-pane active" id="solid-tab1">
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
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>$ {c.price}</span></td></tr>
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
                                                            <div className="media-body">
                                                                <a href="#" style={{textTransform: "uppercase"}} className="media-heading text-semibold text-default">Added By : Me</a>
                                                                <span style={{textTransform: "uppercase"}} className="text-size-small text-muted display-block"> Assignment Added on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span></span>
                                                            </div>
                                                            <div className="media-right media-middle">
                                                                <ul className="icons-list text-nowrap">
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li className="media">
                                                            <p className="aucp">
                                                            </p><table className="table" style={{border: '1px solid #f2f2f2'}}>
                                                            <tbody>
                                                            <tr><td style={{textTransform: "uppercase"}}>Assigned To:</td>
                                                            <a href={"/dashboard/student/writerProfile/"+this.state.writer_id}><td style={{textTransform: "uppercase"}}><span style={{color: '#000', fontWeight: 'bold'}}>{this.state.writer} </span></td></a></tr>
                                                            <tr><td style={{textTransform: "uppercase"}}>Stage of Competition:</td>
                                                            <td style={{textTransform: "uppercase"}}><span style={{color: '#e60000'}}>Compeleted</span></td>
                                            
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

										</div>
									</div>
								</div>
                         
                    {/* <div className="panel-footer"  style={{backgroundColor:'#27ef2d5e'}}>
                                         <button ref={'bidBtn'} type="button" style={{marginLeft:10}} onClick={this.openBidModal.bind(this)}  className="btn btn-success heading-btn  pull-left">View All File</button>
                                     
                    </div> */}
                </div>
                         )})}
                
            </div>
                </div>



        {this.state.status == '0' ?
        




<div>

        <div className="page-header">
        <div className="page-header-content col-md-10 cnt-cnt">
            <div className="page-title">
                <h4  style={{textTransform: "uppercase"}}>
                    <span className="text-semibold">Bids From Writers</span> <span>({this.state.bidCount})</span></h4>
            </div>
        </div>
    </div>
    

    { this.state.bids.map((c,i) => {
             return(
    <div key={i} className="row">
    <div className="col-md-10 cnt-cnt">
        <div className="panel panel-flat">
            <div className="panel-body">
                <div className="col-md-12">
                    <ul className="media-list">
                        <li className="media">
                        {c.image ? <a href={"/dashboard/student/writerProfile/"+c.user_id} className="media-left"><img src={"/profile/"+c.image} className="img-circle img-md" alt style={{borderRadius: 0}} /></a>
                        : <a href={"/dashboard/student/writerProfile/"+c.user_id} className="media-left"><img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt style={{borderRadius: 0}} /></a> }
                            
                            <div className="media-body">
                                <a href={"/dashboard/student/writerProfile/"+c.user_id} className="media-heading text-semibold text-default">{c.name}</a>
                                <span style={{textTransform: "uppercase"}} className="text-size-small text-muted display-block"> Bid on: <span style={{fontWeight: 'bold'}}>{c.created_on}</span>
    <span>
      {/* <div className="text-nowrap">
        <i className="icon-star-full2 text-size-base text-warning-300" />
        <i className="icon-star-full2 text-size-base text-warning-300" />
        <i className="icon-star-full2 text-size-base text-warning-300" />
        <i className="icon-star-full2 text-size-base text-warning-300" />
        <i className="icon-star-full2 text-size-base text-warning-300" />
      </div> */}
      <a></a>
    </span>
  </span></div>
                            <div className="media-right media-middle">
                                <ul className="icons-list text-nowrap">
                                { c.file ?  <li><a href={"/file/"+c.file} download><span style={{fontSize:13 , border:0,paddingTop:15, paddingBottom:11, paddingRight:20, paddingLeft:20}} className="bid-placed">File</span></a></li>
                                 :<div></div> 
                                 }   <li><span style={{fontSize:13 , border:0,paddingTop:15, paddingBottom:11, paddingRight:20, paddingLeft:20}} className="bid-placed">{c.type === 1 ? 'Negotiable' : 'Bid'+' $'+c.amount}</span></li>
                                      {this.state.status == '0' ? <div className="btn-group" style={{display:"-webkit-inline-box", marginLeft:10}}>
                                      {c.type == '2' ? <button  type="button" title="Hire" onClick={this.hire.bind(this, c.user_id,c.type,c.amount)} className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                             <i className="icon-file-check2"></i>
                             </button>
                             :
                             <button disabled="disabled" type="button" title="Hire" onClick={this.hire.bind(this, c.user_id,c.type,c.amount)} className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                             <i className="icon-file-check2"></i>
                             </button>}
                             {/* <button type="button" title="Chat"  onClick={this.chat.bind(this, c.user_id, c.message)} className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                             <i className="icon-comments"></i>
                             </button> */}
                             <button type="button" title="Reject" onClick={this.reject.bind(this, c.id)} className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                             <i className="icon-cancel-square"></i>
                             </button>
                             </div> 
                                         :   <div></div>
                                        }  


                                    {/* <li className="dropdown">
                                        <div className="btn-group">
                                            <button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle" data-toggle="dropdown">
                                                <i className="icon-menu7" /> &nbsp;<span className="caret" />
                                            </button>
                                            {this.state.status == '0' ?
                                           <ul className="dropdown-menu dropdown-menu-right"> {c.type == '2' ? <li><a onClick={this.hire.bind(this, c.user_id,c.type,c.amount)}><i className=" icon-file-check2" /> Hire</a></li>: <li></li>}<li><a onClick={this.chat.bind(this, c.user_id, c.message)}><i className=" icon-comments" /> Chat</a></li><li><a onClick={this.reject.bind(this, c.id)}><i className=" icon-cancel-square" /> Reject</a></li></ul>
                                            :   <ul className="dropdown-menu dropdown-menu-right"></ul>
                                        }  
                                            
                                        </div>
                                    </li> */}
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div className="col-md-12">
                    <p style={{textTransform: "uppercase"}}>{c.message}</p>
                </div>
            </div>
            <div className="panel panel-flat">
            <div className="panel-heading" style={{backgroundColor: '#eeeded'}}>
            <Postive user={this.state.user} bidId={c.id}/>

            <div className="heading-elements">
                <ul className="icons-list">
                    <li><span /><a ref={'arrowButton'} onClick={this.openComments.bind(this,c.id)} data-action="collapse" style={{float: 'right'}} /><span> Comments: <span style={{fontWeight: 'bold'}}>{this.state.commentCount}</span></span></li>
                </ul>
            </div>
        </div>
        <div ref={'timeline'} className="panel panel-flat timeline-content">
            {this.state.slide ? this.state.slideId == c.id ? <BidComments  user={this.state.user} bidId={c.id} bidUser={c.user_id} /> : <div></div> : <div></div>}
        </div>
            </div>
        </div>
    </div>
</div>
             )})}



</div>
             :



<div>

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
                                 <li className="active pull-right"><h4>{user}</h4></li>							
                         </ul>
                         </div>
             </div>
            
             <div className="panel-body">
             {this.state.prevPage == null ? <span style={{textTransform: "uppercase"}} className="media-annotation display-block mt-10" style={{marginLeft:'40%', fontSize:16}}>Conversation Ended</span> 
             : <a style={{textTransform: "uppercase"}} onClick={this.next.bind(this)} title="Click Here"><span className="media-annotation display-block mt-10" style={{marginLeft:'40%', fontSize:16}}>Load More Conversation</span></a> }
             
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
                                         <a href="assets/images/placeholder.jpg"><span style={{textAlign: 'center',  display: 'block'}}>{user}</span>
                                             <img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt=""/>
                                         </a>
                                     </div>
                                 </li>  : <li className="media">
                                     <div className="media-left">
                                         <a  href="assets/images/placeholder.jpg"><span style={{textAlign: 'center',  display: 'block'}}>{this.state.username}</span>
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
     </div>						</div> </div>
     
        }
       
          




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
















                <div ref={'fileModal'} className="modal fade" id="myModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                    <div className="modal-content">
                <div className="modal-header">
                   
                <div className="col-md-12"><h5>Upload Files</h5></div>
                </div>
                <div className="modal-body">
                <div className="col-md-12">
                <div className="form-group">
                <label className="display-block text-semibold">Type : </label>
                <label className="radio-inline " style={{textTransform: "uppercase"}}>>
                    <input type="radio" value="Guided Material" onChange={(e) => this.setState({imageType : e.target.value})} name="radio-inline-right" className="styled"/>
                    Guided Material
                </label>
            </div>
								</div>
                                <div className="col-md-12" style={{marginBottom:10}}>
                                <button type="button" className="btn btn-primary btn-rounded pull-left" onClick={this.addFile.bind(this)}>ADD File</button>
                                <input type="file"  ref={'fileselect'} style={{display: 'none'}} onChange={this.handleChangeImage2} />
                                </div>
                <div className="col-md-12" style={{marginBottom:10}}>
                                                <label style={{textTransform: "uppercase"}}>>Title</label>
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













<div ref={'editModal'} className="modal fade">
						<div className="modal-dialog modal-full">
							<div className="modal-content">
								<div className="modal-header bg-primary">
									<button type="button" className="close" data-dismiss="modal">&times;</button>
									<h5 className="modal-title">Edit Assignment</h5>
								</div>

                                <form action="javascript:void(0);">
                                <div className="modal-body">
                                    <div className="form-group">
                                        <div className="row">
                                            <div className="col-sm-6">
                                                <label style={{textTransform: "uppercase"}}>Assignment Topic</label>
                                                <input type="text" value={this.state.topic} onChange={(e) => this.setState({topic : e.target.value})} placeholder="Enter Assignment Topic" className="form-control"/>
                                            </div>

                                            <div className="col-sm-6">
                                                <label style={{textTransform: "uppercase"}}>Details</label>
                                                <input type="text" value={this.state.detail} onChange={(e) => this.setState({detail : e.target.value})} placeholder="Enter Brief Detail of Assignment" className="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="form-group">
                                    <div className="row">
                                        <div className="col-sm-4">
                                            <label style={{textTransform: "uppercase"}}>Paper Type</label>
                                            <select className="form-control" onChange={(e) => this.setState({type_id : e.target.value})}>
                                                <optgroup label="Choose Type">
                                            { this.state.types.map((c,i) => {
                                            return(
                                                <option style={{textTransform: "uppercase"}} value={c.id}>{c.name}</option>
                                               )})}
                                             </optgroup>
                                                </select>
                                        </div>

                                        <div className="col-sm-4">
                                            <label style={{textTransform: "uppercase"}}>Subject</label>
                                            <select className="form-control" onChange={(e) => this.setState({subject_id : e.target.value})}>
                                              
                                            { this.state.subjects.map((c,i) => {
                                            return(
                                                <optgroup label={c.name}>
                                                { this.state.subSubjects.map((s,i) => {
                                                    return(
                                                        s.subject_id == c.id ?
                                                            <option style={{textTransform: "uppercase"}} value={s.id}>{s.name}</option>
                                                            : <null/>
                                                        
                                                       )})}
                                                </optgroup>
                                               )})}
                                            
                                                </select>
                                        </div>

                                        <div className="col-sm-4">
                                            <label style={{textTransform: "uppercase"}}>Formatting Style</label>
                                            <select className="form-control" onChange={(e) => this.setState({format_id : e.target.value})}>
                                                <optgroup label="Choose Formats">
                                            { this.state.formats.map((c,i) => {
                                            return(
                                                <option style={{textTransform: "uppercase"}} value={c.id}>{c.name}</option>
                                               )})}
                                             </optgroup>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                    <div className="form-group">
                                        <div className="row">
                                            <div className="col-sm-4">
                                                <label style={{textTransform: "uppercase"}}>Type of Service</label>
                                                <select className="form-control" onChange={(e) => this.setState({service : e.target.value})}>
                                                <optgroup label="Choose Service">
                                                <option style={{textTransform: "uppercase"}} value="Custom Writing">Custom Writing</option>
                                                <option style={{textTransform: "uppercase"}} value="Editing">Editing</option>
                                                </optgroup>
                                                </select>
                                            </div>

                                            <div className="col-sm-4">
                                                <label style={{textTransform: "uppercase"}}>Academic level</label>
                                                <select className="form-control" onChange={(e) => this.setState({academic : e.target.value})}>
                                                <optgroup label="Choose Level">
                                                    <option style={{textTransform: "uppercase"}} value="Middle School">Middle School</option>
                                                    <option style={{textTransform: "uppercase"}} value="High School">High School</option>
                                                    <option style={{textTransform: "uppercase"}} value="Undergraduate/Bachelor">Undergraduate/Bachelor</option>
                                                    <option style={{textTransform: "uppercase"}} value="Masters">Masters</option>
                                                    <option style={{textTransform: "uppercase"}} value="PHP">PHD</option>
                                                </optgroup>
                                                
                                                </select>
                                             </div>

                                            <div className="col-sm-4">
                                                <label style={{textTransform: "uppercase"}}>Deadline</label>
                                                                    <div className="input-group">
											                        <span className="input-group-addon"><i className="icon-calendar22"></i></span>
											                        <input type="text" className="form-control daterange-single" value={this.state.rawdeadline} onChange={(e) => this.setState({rawdeadline : e.target.value})} />
										                            </div>
                                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <div className="row">
                                            <div className="col-sm-4">
                                                <label style={{textTransform: "uppercase"}}>Min. Pages</label>
                                                <input type="number" value={this.state.page} onChange={(e) => this.setState({page : e.target.value})} placeholder="Enter Pages no   , default=1" className="form-control"/>
                                            </div>

                                            <div className="col-sm-4">
                                                <label style={{textTransform: "uppercase"}}>Min. Words</label>
                                                <input type="number" value={this.state.word} onChange={(e) => this.setState({word : e.target.value})} placeholder="Enter Words no   , default=270"  className="form-control"/>
                                            </div>
                                            <div className="col-sm-4">
                                                <label style={{textTransform: "uppercase"}}>Price</label>
                                                <input type="number" value={this.state.price} onChange={(e) => this.setState({price : e.target.value})} placeholder="Enter Price   , default=15"  className="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div className="modal-footer">
                                    <button type="button" className="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" onClick={this.update.bind(this)} className="btn btn-primary">Update</button>
                                </div>
                            </form>
							</div>
						</div>
					</div>



<div ref={'rattingModal'} className="modal fade">
						<div className="modal-dialog">
							<div className="modal-content">
								<div className="modal-header bg-success">
									<button type="button" className="close" data-dismiss="modal">&times;</button>
									<h5 className="modal-title">Review The Writer</h5>
								</div>

                                <form action="javascript:void(0);">
                                <div className="modal-body">
                                    <div className="form-group">
                                        <div className="row">
                                            <div className="col-sm-6">
                                            <StarRatingComponent
                                            name="rate1" 
                                            starCount={5}
                                            value={this.state.rating}
                                            onStarClick={this.onStarClick.bind(this)}
                                            />
                                            </div>
                                            <div className="col-sm-6">
                                            {this.state.rating} / 5
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-sm-12">
                                                <label style={{textTransform: "uppercase"}}>Review</label>
                                                <input type="text" maxLength="255" onChange={(e) => this.setState({review : e.target.value})} placeholder="Enter Review Text" className="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div className="modal-footer">
                                    <button type="button" onClick={this.review.bind(this,2)} className="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" onClick={this.review.bind(this,1)} className="btn btn-primary">Review</button>
                                </div>
                            </form>
							</div>
						</div>
					</div>







            </div>

        )
    }

}

export default Single;
