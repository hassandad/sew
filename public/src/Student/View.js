import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import Type from './Type'
import BidCount from './BidCount'
import Bid from './Bid'
import { Popup } from 'semantic-ui-react'
var counter = 0;
class View extends Component {
    constructor() {
        super();
        this.state = {
            iconStar : false,
            orders : [],
            allOrders : [],
            next:'',
            prev: null,
			slide:false,
			orderId:'',
			type:'',
			count:'',
			countAuction:'',
			countProgress:'',
			countWarranty:'',
			countCompeleted:'',
        }
	this.getOrders = this.getOrders.bind(this);
    

    }

    componentWillMount() {
        this.getOrders();
    }

    // componentDidMount() {

    // }
    getOrders(){
        axios.get('/api/assignment/get').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                });
            }
        });
        axios.get('/api/assignment/getMyAll').then(res => {
            if(res.status === 200){
                this.setState({  allOrders: res.data  });
            }
		});
		axios.get('/api/assignment/getCount').then(res => {
            if(res.status === 200){
                this.setState({
                  count: res.data
                });
            }
		});
		axios.get('/api/assignment/getAuctionCount').then(res => {
            if(res.status === 200){
                this.setState({
					countAuction:res.data
                });
            }
		});
		axios.get('/api/assignment/getProgressCount').then(res => {
            if(res.status === 200){
                this.setState({
					countProgress:res.data
                });
            }
		});
		axios.get('/api/assignment/getWarrantyCount').then(res => {
            if(res.status === 200){
                this.setState({
					countWarranty:res.data
                });
            }
		});
		axios.get('/api/assignment/getCompeletedCount').then(res => {
            if(res.status === 200){
                this.setState({
					countCompeleted:res.data
                });
            }
        });
	}
	getAuction(){
        axios.get('/api/assignment/getAuction').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
	}
	getProgress(){
        axios.get('/api/assignment/getProgress').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
	}
	getWarranty(){
        axios.get('/api/assignment/getWarranty').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
	}
	getCompeleted(){
        axios.get('/api/assignment/getCompeleted').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
    }
    next(){
        axios.get(this.state.next).then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url,
                    prev: res.data.prev_page_url
                });
            }
        });
       
    }
    prev(){
        axios.get(this.state.prev).then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url,
                    prev: res.data.prev_page_url
                });
            }
        });
       
    }
    openBids(id){
		if (id == this.state.orderId) {
			this.setState({
				slide : false});
				this.setState({
					orderId : ''});
		}
		else
		{
		this.setState({orderId : id});
        var _this = this;
        _this.setState({
			slide : true});
		}
        // },() => {
        //     if(this.state.slide){
        //         $(ReactDOM.findDOMNode(this.refs.bids)).slideDown( "slow", function() {
        //           //  $(ReactDOM.findDOMNode(_this.refs.arrowButton)).addClass('rotate-180');
        //         });
        //     }else{
        //         $(ReactDOM.findDOMNode(this.refs.bids)).slideUp( "slow", function() {
        //           //  $(ReactDOM.findDOMNode(_this.refs.arrowButton)).removeClass('rotate-180');
        //         });
        //     }
        // });

    }
    showOrder(id)
    {
        location.href='/dashboard/student/singleOrder/'+id;
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
										<li className="active"><h4 style={{textTransform: "uppercase"}}>Order Tags</h4></li>							
									</ul>
								</div>
								<div>
									<ul className="order-menu">
										<li><a style={{textTransform: "uppercase"}} onClick={this.getOrders.bind(this)} className="a-active">All Orders<span style={{float:"right", background: "#90ab00", padding:4 , borderRadius: 15, color: "#FFF", textAlign: "center"}}>{this.state.count}</span></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.getAuction.bind(this)}>Auction <Popup trigger={	<span style={{float:"right", background: "#da0484", padding:4 , borderRadius: 15, color: "#FFF", textAlign: "center"}}>{this.state.countAuction}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '0' ?  <div><a key={i} target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.getProgress.bind(this)}>In Progress <Popup trigger={	<span style={{float:"right", background: "#ff0000", padding:4 , borderRadius: 15, color: "#FFF", textAlign: "center"}}  >{this.state.countProgress}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '1' ?  <div><a key={i} target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.getWarranty.bind(this)}>Under Warranty <Popup trigger={	<span style={{float:"right", background: "#00bcd4", padding:4 , borderRadius: 15, color: "#FFF", textAlign: "center"}}  >{this.state.countWarranty}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '2' ?  <div><a key={i} target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.getCompeleted.bind(this)}>Completed <Popup trigger={	<span style={{float:"right", background: "#ff7043", padding:4 , borderRadius: 15, color: "#FFF", textAlign: "center"}}  >{this.state.countCompeleted}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '3' ?  <div><a key={i} target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
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
									<li className="active"><h4 style={{textTransform: "uppercase"}}>All Orders</h4></li>							
								</ul>
								</div>
					</div>
                   
					<div className="panel-body">
                    { this.state.orders.map((c,i) => {
                         return(
                        <div key={i}>
						<div className="content-group-lg">
                        {c.status == '0' ? 
                        <div className="panel panel-flat" style={{backgroundColor:'#f9ea3847'}}>
                        <div className="panel-body" style={{padding:0}}>
                            <div className="col-md-12">
                                <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}} >{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/></span>
                            
                            </div>										
                        </div>
                    <div className="panel panel-flat">
                        <div className="panel-heading" >
                            <span ><span  className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase",textTransform: "uppercase"}}>Added {c.created_on}</span></span>
                            <span style={{marginLeft: 25}}><span  className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline} </span>
                            <span><span  className="btn-success btn-rounded" style={{padding: 7, marginLeft: 10}}><i className="icon-book"></i></span><span style={{marginLeft: 10,color: "#8c8c8c",textTransform: "uppercase", fontWeight: "bold",textTransform: "uppercase"}}>Auction</span></span>
                               </span>
                                {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span>
                         */}
                            <div className="heading-elements">
                                <ul className="icons-list">
                                    <li><span></span><a style={{textTransform: "uppercase"}} data-action="collapse" onClick={this.openBids.bind(this,c.id)} style={{float: "right"}}></a><span> Bids :  <BidCount id={c.id}/> </span></li>
                                </ul>
                            </div>
                        </div>
                        {this.state.slide ?
                        c.id === this.state.orderId ? 
                            <Bid id={c.id} status={c.status}/> :<div></div> : <div></div>}
                    </div>
                    </div>
                        : c.status == '1' ? 
                        <div className="panel panel-flat" style={{backgroundColor:'#1bdaf13b'}}>
                        <div className="panel-body" style={{padding:0}}>
                            <div className="col-md-12">
                                <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}} >{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/></span>
                            
                            </div>										
                        </div>
                    <div className="panel panel-flat">
                        <div className="panel-heading" >
                            <span ><span  className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase",textTransform: "uppercase"}}>Added {c.created_on}</span></span>
                            <span style={{marginLeft: 25}}><span  className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline} </span>
                            <span><span  className=" btn-info btn-rounded" style={{background: "#da0484",padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase",textTransform: "uppercase"}}>In Progress</span></span> 
                               </span>
                                {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span>
                         */}
                            <div className="heading-elements">
                                <ul className="icons-list">
                                    <li><span></span><a data-action="collapse" onClick={this.openBids.bind(this,c.id)} style={{float: "right"}}></a><span > Bids :  <BidCount id={c.id}/> </span></li>
                                </ul>
                            </div>
                        </div>
                        {this.state.slide ?
                        c.id === this.state.orderId ? 
                            <Bid id={c.id} status={c.status}/> :<div></div> : <div></div>}
                    </div>
                    </div>
                        : c.status == '2' ? 
                        <div className="panel panel-flat" style={{backgroundColor:'#e31ae647'}}>
                        <div className="panel-body" style={{padding:0}}>
                            <div className="col-md-12">
                                <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}} >{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/></span>
                            
                            </div>										
                        </div>
                    <div className="panel panel-flat">
                        <div className="panel-heading" >
                            <span ><span  className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Added {c.created_on}</span></span>
                            <span style={{marginLeft: 25}}><span  className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase", fontWeight: "bold"}}>Deadline {c.deadline} </span>
                         <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Under Warranty</span></span> 
                                </span>
                                {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span>
                         */}
                            <div className="heading-elements">
                                <ul className="icons-list">
                                    <li><span></span><a data-action="collapse" onClick={this.openBids.bind(this,c.id)} style={{float: "right"}}></a><span> Bids :  <BidCount id={c.id}/> </span></li>
                                </ul>
                            </div>
                        </div>
                        {this.state.slide ?
                        c.id === this.state.orderId ? 
                            <Bid id={c.id} status={c.status}/> :<div></div> : <div></div>}
                    </div>
                    </div>
                        : 
                        <div className="panel panel-flat" style={{backgroundColor:'#27ef2d5e'}}>
                        <div className="panel-body" style={{padding:0}}>
                            <div className="col-md-12">
                                <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/student/singleOrder/'+c.id} style={{fontWeight: "bold"}} >{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/></span>
                            
                            </div>										
                        </div>
                    <div className="panel panel-flat">
                        <div className="panel-heading" >
                            <span ><span  className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Added {c.created_on}</span></span>
                            <span style={{marginLeft: 25}}><span  className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase", fontWeight: "bold"}}>Deadline {c.deadline} </span>
                           <span><span  className=" btn-info btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span> 
                                </span>
                                {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span>
                         */}
                            <div className="heading-elements">
                                <ul className="icons-list">
                                    <li><span></span><a data-action="collapse" onClick={this.openBids.bind(this,c.id)} style={{float: "right"}}></a><span> Bids :  <BidCount id={c.id}/> </span></li>
                                </ul>
                            </div>
                        </div>
                        {this.state.slide ?
                        c.id === this.state.orderId ? 
                            <Bid id={c.id} status={c.status}/> :<div></div> : <div></div>}
                    </div>
                    </div>
                        }
						
						</div>
						<hr style={{marginTop: -10,marginBottom:10,border: 0,borderTop:"2px solid #00bcd4"}}></hr>
					</div>
                         )
                    })}
					</div>
						<div className="panel-footer">
								<div className="heading-elements">
								{this.state.prev == null ?  <button onClick={this.prev.bind(this)} className="btn btn-success btn-rounded heading-btn  pull-left" disabled="disabled">Previous</button> 
                :  <button onClick={this.prev.bind(this)} className="btn btn-success btn-rounded heading-btn  pull-left">Previous</button>}
                {this.state.next == null ?  <button onClick={this.next.bind(this)} className="btn btn-success btn-rounded heading-btn  pull-right" disabled="disabled">Next</button> 
                :  <button onClick={this.next.bind(this)} className="btn btn-success btn-rounded heading-btn  pull-right">Next</button>}
               
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
