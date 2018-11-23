import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import Type from './Type';
import swal from 'sweetalert';
import { Popup } from 'semantic-ui-react'
var counter = 0;
class View extends Component {
    constructor() {
        super();
        this.state = {
            iconStar : false,
            allOrders : [],
            orders : [],
            next:'',
            prev: null,
			slide:false,
			orderId:'',
			type:'',
			count:'',
			countRevision:'',
			countProgress:'',
			countRefunded:'',
            countFinish:'',
            countApproval:'',
            heading:'All Orders',
        }
	this.getWriterOrders = this.getWriterOrders.bind(this);
    

    }

    componentWillMount() {
        this.getWriterOrders();
    }

    // componentDidMount() {

    // }
    getWriterOrders(){
        this.setState({
            heading: 'All Orders'
        });
        axios.get('/api/order/get').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                });
            }
        });
        axios.get('/api/order/getMyAll').then(res => {
            if(res.status === 200){
                this.setState({  allOrders: res.data  });
            }
		});
		axios.get('/api/order/get/count').then(res => {
            if(res.status === 200){
                this.setState({
                  count: res.data
                });
            }
		});
		axios.get('/api/order/getRevision/count').then(res => {
            if(res.status === 200){
                this.setState({
					countRevision:res.data
                });
            }
		});
		axios.get('/api/order/getProgress/count').then(res => {
            if(res.status === 200){
                this.setState({
					countProgress:res.data
                });
            }
		});
		axios.get('/api/order/getRefunded/count').then(res => {
            if(res.status === 200){
                this.setState({
					countRefunded:res.data
                });
            }
		});
		axios.get('/api/order/getFinish/count').then(res => {
            if(res.status === 200){
                this.setState({
					countFinish:res.data
                });
            }
        });
        axios.get('/api/order/getApproval/count').then(res => {
            if(res.status === 200){
                this.setState({
					countApproval:res.data
                });
            }
        });
	}
	approval(){
        this.setState({
            heading: 'Order Under Approval'
        });
        axios.get('/api/order/getApproval').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
	}
	progress(){
        this.setState({
            heading: 'In Progress'
        });
        axios.get('/api/order/getProgress').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
	}
	revision(){
        this.setState({
            heading: 'Order In Revision'
        });
        axios.get('/api/order/getRevision').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
	}
	refunded(){
        this.setState({
            heading: 'Order being Refunded'
        });
        axios.get('/api/order/getRefunded').then(res => {
            if(res.status === 200){
                this.setState({
                    orders: res.data.data,
                    next: res.data.next_page_url
                   
                });
            }
        });
    }
    finish(){
        this.setState({
            heading: 'Finish Order'
        });
        axios.get('/api/order/getFinish').then(res => {
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
    accpet(oid,aid){
        axios.get('/api/order/accept/'+oid+'/'+aid).then(res => {
            if(res.status === 200){
                swal({
                    text: 'You have been successfully hired for the assignment' ,
                    icon : 'success'
                })
                this.getWriterOrders();
                axios.get('/api/order/accept/notification/'+oid+'/'+aid).then(res => {});
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
                this.getWriterOrders();
            }
        });
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
										<li><a style={{textTransform: "uppercase"}} onClick={this.getWriterOrders.bind(this)} className="a-active">All Orders<span style={{float:"right", background: "#90ab00", padding:4 , borderRadius: 15, color: "#333333", textAlign: "center"}}>{this.state.count}</span></a></li>
                                        <li><a style={{textTransform: "uppercase"}} onClick={this.progress.bind(this)}>In Progress <Popup trigger={	<span style={{float:"right", background: "#1bdaf17a", padding:4 , borderRadius: 15, color: "#333333", textAlign: "center"}}>{this.state.countProgress}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '1' ?  <div><a key={i} target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.revision.bind(this)}>Order In Revision <Popup trigger={	<span style={{float:"right", background: "#e31ae691", padding:4 , borderRadius: 15, color: "#333333", textAlign: "center"}}  >{this.state.countRevision}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '2' ?  <div><a key={i} target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.refunded.bind(this)}>Order Being Refunded <Popup trigger={	<span style={{float:"right", background: "#f443369e", padding:4 , borderRadius: 15, color: "#333333", textAlign: "center"}}  >{this.state.countRefunded}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '3' ?  <div><a key={i} target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} onClick={this.finish.bind(this)}>Finish Order <Popup trigger={	<span style={{float:"right", background: "#27ef2d87", padding:4 , borderRadius: 15, color: "#333333", textAlign: "center"}}  >{this.state.countFinish}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '4' ?  <div><a key={i} target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
                                        <li><a style={{textTransform: "uppercase"}} onClick={this.approval.bind(this)}>Order Under Approval <Popup trigger={	<span style={{float:"right", background: "#f5e5248c", padding:4 , borderRadius: 15, color: "#333333", textAlign: "center"}}>{this.state.countApproval}</span>   }    flowing  hoverable >
                                        { this.state.allOrders.map((c,i) => {
                                        return(
                                            c.status == '0' ?  <div><a key={i} target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a></div>
                                            : <div/>
                                        )})}
                                         </Popup></a></li>
										<li><a style={{textTransform: "uppercase"}} >Amount Earned</a></li>
										<li><a style={{textTransform: "uppercase"}}>Writing Guidelines</a></li>
										<li><a style={{textTransform: "uppercase"}} >My Credentials</a></li>
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
                                <li className="active"><h4 style={{textTransform: "uppercase"}}>{this.state.heading}</h4></li>						
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
									<span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/><span style={{float: "right",marginRight:10}}>${c.price}</span></span>
								
								</div>										
							</div>
						<div className="panel panel-flat">
							<div className="panel-heading" >
								<span ><span className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Assign {c.created_on}</span></span>
								<span style={{marginLeft: 25}}><span className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline}</span>
								{c.status == '0' ? <span><span className="btn-success btn-rounded" style={{padding: 7, marginLeft: 10}}><i className="icon-book"></i></span><span style={{marginLeft: 10,color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Order Under Approval</span><a onClick={this.accpet.bind(this,c.id,c.assignment_id)}><span title="Accept" className="btn-success btn-rounded" style={{float: "right", marginLeft: 10}}><i className="icon-check"></i></span></a><a onClick={this.reject.bind(this,c.id,c.assignment_id)}><span title="Reject" className="btn-danger btn-rounded" style={{float: "right",  marginLeft: 10}}><i className="icon-cross"></i></span></a></span>
									: c.status == '1' ? <span><span  className=" btn-info btn-rounded" style={{background: "#da0484",padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>In Progress</span></span> 
									: c.status == '2' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order In Revision</span></span> 
                                    : c.status == '3' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order Being Refunded</span></span>
                                    : <span><span  className=" btn-info btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span> }
									</span>
									{/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c"}}>Completed</span></span>
							 */}
							
							</div>
						</div>
						</div>

						: c.status == '1' ? 
                        
                        <div className="panel panel-flat" style={{backgroundColor:'#1bdaf13b'}}>
                        <div className="panel-body" style={{padding:0}}>
                            <div className="col-md-12">
                                <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/><span style={{float: "right",marginRight:10}}>${c.price}</span></span>
                            
                            </div>										
                        </div>
                    <div className="panel panel-flat">
                        <div className="panel-heading" >
                            <span ><span className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Assign {c.created_on}</span></span>
                            <span style={{marginLeft: 25}}><span className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline}</span>
                            {c.status == '0' ? <span><span className="btn-success btn-rounded" style={{padding: 7, marginLeft: 10}}><i className="icon-book"></i></span><span style={{marginLeft: 10,color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Order Under Approval</span><a onClick={this.accpet.bind(this,c.id,c.assignment_id)}><span title="Accept" className="btn-success btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-check"></i></span></a><a onClick={this.reject.bind(this,c.id,c.assignment_id)}><span title="Reject" className="btn-danger btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-cross"></i></span></a></span>
                                : c.status == '1' ? <span><span  className=" btn-info btn-rounded" style={{background: "#da0484",padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>In Progress</span></span> 
                                : c.status == '2' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order In Revision</span></span> 
                                : c.status == '3' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order Being Refunded</span></span>
                                : <span><span  className=" btn-info btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span> }
                                </span>
                                {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c"}}>Completed</span></span>
                         */}
                        
                        </div>
                    </div>
                    </div>

                    : c.status == '2' ? 
                    
                    <div className="panel panel-flat" style={{backgroundColor:'#e31ae647'}}>
                    <div className="panel-body" style={{padding:0}}>
                        <div className="col-md-12">
                            <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/><span style={{float: "right",marginRight:10}}>${c.price}</span></span>
                        
                        </div>										
                    </div>
                <div className="panel panel-flat">
                    <div className="panel-heading" >
                        <span ><span className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Assign {c.created_on}</span></span>
                        <span style={{marginLeft: 25}}><span className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline}</span>
                        {c.status == '0' ? <span><span className="btn-success btn-rounded" style={{padding: 7, marginLeft: 10}}><i className="icon-book"></i></span><span style={{marginLeft: 10,color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Order Under Approval</span><a onClick={this.accpet.bind(this,c.id,c.assignment_id)}><span title="Accept" className="btn-success btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-check"></i></span></a><a onClick={this.reject.bind(this,c.id,c.assignment_id)}><span title="Reject" className="btn-danger btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-cross"></i></span></a></span>
                            : c.status == '1' ? <span><span  className=" btn-info btn-rounded" style={{background: "#da0484",padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>In Progress</span></span> 
                            : c.status == '2' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order In Revision</span></span> 
                            : c.status == '3' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order Being Refunded</span></span>
                            : <span><span  className=" btn-info btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span> }
                            </span>
                            {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c"}}>Completed</span></span>
                     */}
                    
                    </div>
                </div>
                </div>
                    
                    : c.status == '3' ? 
                    
                    <div className="panel panel-flat" style={{backgroundColor:'#f4433661'}}>
                    <div className="panel-body" style={{padding:0}}>
                        <div className="col-md-12">
                            <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/><span style={{float: "right",marginRight:10}}>${c.price}</span></span>
                        
                        </div>										
                    </div>
                <div className="panel panel-flat">
                    <div className="panel-heading" >
                        <span ><span className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Assign {c.created_on}</span></span>
                        <span style={{marginLeft: 25}}><span className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline}</span>
                        {c.status == '0' ? <span><span className="btn-success btn-rounded" style={{padding: 7, marginLeft: 10}}><i className="icon-book"></i></span><span style={{marginLeft: 10,color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Order Under Approval</span><a onClick={this.accpet.bind(this,c.id,c.assignment_id)}><span title="Accept" className="btn-success btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-check"></i></span></a><a onClick={this.reject.bind(this,c.id,c.assignment_id)}><span title="Reject" className="btn-danger btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-cross"></i></span></a></span>
                            : c.status == '1' ? <span><span  className=" btn-info btn-rounded" style={{background: "#da0484",padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>In Progress</span></span> 
                            : c.status == '2' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order In Revision</span></span> 
                            : c.status == '3' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order Being Refunded</span></span>
                            : <span><span  className=" btn-info btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span> }
                            </span>
                            {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c"}}>Completed</span></span>
                     */}
                    
                    </div>
                </div>
                </div>
                    
                    : 
                    
                    <div className="panel panel-flat" style={{backgroundColor:'#27ef2d5e'}}>
                    <div className="panel-body" style={{padding:0}}>
                        <div className="col-md-12">
                            <span style={{display:"block",fontSize: 15,padding:7,textTransform: "uppercase"}}><a target="_blank" href={'/dashboard/writer/myOrder/single/'+c.id} style={{fontWeight: "bold"}}>{c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/><span style={{float: "right",marginRight:10}}>${c.price}</span></span>
                        
                        </div>										
                    </div>
                <div className="panel panel-flat">
                    <div className="panel-heading" >
                        <span ><span className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Assign {c.created_on}</span></span>
                        <span style={{marginLeft: 25}}><span className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline}</span>
                        {c.status == '0' ? <span><span className="btn-success btn-rounded" style={{padding: 7, marginLeft: 10}}><i className="icon-book"></i></span><span style={{marginLeft: 10,color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Order Under Approval</span><a onClick={this.accpet.bind(this,c.id,c.assignment_id)}><span title="Accept" className="btn-success btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-check"></i></span></a><a onClick={this.reject.bind(this,c.id,c.assignment_id)}><span title="Reject" className="btn-danger btn-rounded" style={{float: "right", padding: 7, marginLeft: 10}}><i className="icon-cross"></i></span></a></span>
                            : c.status == '1' ? <span><span  className=" btn-info btn-rounded" style={{background: "#da0484",padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>In Progress</span></span> 
                            : c.status == '2' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order In Revision</span></span> 
                            : c.status == '3' ? <span><span  className=" btn-danger btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Order Being Refunded</span></span>
                            : <span><span  className=" btn-info btn-rounded" style={{padding: 7, marginLeft: 10}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c",textTransform: "uppercase"}}>Completed</span></span> }
                            </span>
                            {/* <span><span  className=" btn-info btn-rounded" style={{padding: 7}}><i className=" icon-magazine"></i></span><span style={{marginLeft: 10 ,color: "#8c8c8c"}}>Completed</span></span>
                     */}
                    
                    </div>
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
