import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import PaperType from './PaperType';
import swal from 'sweetalert'
var sorry = 0;
var search = '';
class Writer extends Component {
    constructor() {
        super();
        this.state = {
			writers : [],
			auction : [],
			next:'',
			prev:'',
			search:'',
			sorry:false,
        }
    
		this.get = this.get.bind(this);
		this.search = this.search.bind(this);
	}


    componentWillMount() {
        axios.get('/api/writer/get').then(res => {
            if(res.status === 200){
                this.setState({
					writers: res.data.data,
					next: res.data.next_page_url
                });
			}
		});
		axios.get('/api/assignment/getAuction/All').then(res => {
            if(res.status === 200){
                this.setState({
                    auction: res.data
                });
            }
        });
	}
	get()
	{
		axios.get('/api/writer/get').then(res => {
            if(res.status === 200){
                this.setState({
					writers: res.data.data,
					next: res.data.next_page_url,
					sorry : false
                });
			}
		
		});
		axios.get('/api/assignment/getAuction/All').then(res => {
            if(res.status === 200){
                this.setState({
                    auction: res.data
                });
            }
        });
	}
	next(){
        axios.get(this.state.next).then(res => {
            if(res.status === 200){
                this.setState({
                    writers: res.data.data,
                    next: res.data.next_page_url,
                    prev: res.data.prev_page_url
                });
            }
        });
       
    }
    prev(){
			console.log(this.state.prev);
        axios.get(this.state.prev).then(res => {
            if(res.status === 200){
                this.setState({
                    writers: res.data.data,
                    next: res.data.next_page_url,
                    prev: res.data.prev_page_url
                });
            }
        });
       
	}
	hire(id,aid,price)
    {
		axios.get('/api/order/checkAuction/'+aid).then(res => {
            if (res.data == "error") {
                swal({
                    text: 'Assignment is not on the Auction State' ,
                    icon : 'error'
                })
            }
            else{
                axios.get('/api/order/checkHire/'+id+'/'+aid).then(res => {
                    if (res.data == "error") {
                        swal({
                            text: 'Hiring request is already Sended to the Writer' ,
                            icon : 'error'
                        })
                    }
                    else{
        swal({
			title: "Are you sure?",
			text: "Hired the Writer for selected assignment in just $"+price+"   Or you should Update the price",
			buttons: true,
			dangerMode: true,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				axios.get('/api/order/add/'+id+'/'+aid+'/'+price).then(res => {
					swal({
						text: 'Hiring Request has been sent to Writer' ,
						icon : 'success'
					})
					this.get();
				});
			} else {
			  swal("Hiring Has been Canceled!");
			}
		  });
		}
	});
}
});
    	
    }	
	search() {
		if (this.state.search == '') {
			this.get();
		}
		else{
        axios.get('/api/writer/search/'+this.state.search).then(res => {
            if(res.status === 200){
				if (res.data.data.length == 0) {
					this.setState({
						writers: ['aaaaaa'],
						sorry: true,
						next: null,
						prev: ''			});
				}
				else
				{
                this.setState({
					writers: res.data.data,
					next: res.data.next_page_url,
					sorry : false
				});
				}
			}
		
		
		});
	}
    }
	
    render() {
        return (
                	<div className="content-wrapper">
	{/* <!-- Page header --> */}
	<div className="page-header">
		<div className="col-md-11 cnt-cnt">
			<div className="page-title">
				<div className="panel panel-flat">
					<div className="panel-body">
						<div className="form-horizontal">
							<fieldset>
								<form className="form-group" action="javascript:void(0);">
									<label style={{textTransform: "uppercase"}} className="control-label col-lg-2">Search Writers</label>
									<div className="col-lg-10">
										<div className="input-group">
											<input type="text"  onChange={(e) => this.setState({search : e.target.value})}  className="form-control" placeholder="Enter Writer Name"/>
											<span className="input-group-btn">
												<button onClick={this.search.bind(this)} className="btn btn-primary btn-rounded" type="submit">Search</button>
											</span>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{/* <!-- /page header --> */}
	{
     this.state.writers.map((c,i) => {
                         return(

							this.state.sorry == true ? <div key={i} className="row">	
							<div className="col-md-10 cnt-cnt">
								<div className="panel panel-flat">
									<div className="panel-body">
								 
										<div className="col-md-12">
											<ul className="media-list">
							   
													<li className="media">
														<a href="#" className="media-left"><img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt="" style={{borderRadius: 0}}/></a>
														   <div className="media-body">
																<a href="#" style={{textTransform: "uppercase"}} className="media-heading text-semibold text-default"><span style={{marginRight: 5}}>1</span>Sorry there is no writer found of this name </a>
																														<span>
																	
																	   
																
																	
																</span>
																
																</div>
																<div className="media-right media-middle">
																					<ul className="icons-list text-nowrap">
																<li className="dropdown">		
																	<div className="btn-group">
																	
																	</div>
																</li>									
																</ul>
															</div>
														</li>																
													
													
													
								
								 </ul>
												</div>	
																	   
									</div>
								</div>
							</div>
						</div>
			:
				<div key={i} className="row">	
					<div className="col-md-10 cnt-cnt">
						<div className="panel panel-flat">
							<div className="panel-body">
                         
								<div className="col-md-12">
									<ul className="media-list">
                       
											<li className="media">
											{c.image ? <a href={"/dashboard/student/writerProfile/"+c.user_id} className="media-left"><img src={"/profile/"+c.image} className="img-circle img-md" alt="" style={{borderRadius: 0}}/></a>
											: <a href={"/dashboard/student/writerProfile/"+c.user_id} className="media-left"><img src="/user.png" className="img-circle img-md" alt="" style={{borderRadius: 0}}/></a> }
												
												   <div className="media-body">
														<a style={{textTransform: "uppercase"}} href={"/dashboard/student/writerProfile/"+c.user_id} className="media-heading text-semibold text-default"><span style={{marginRight: 5}}>{i+1}</span>{c.name} </a>
																												<span>
															
                                                                {c.rating == 1 ? <div className="text-nowrap"><i className="icon-star-full2 text-size-base text-warning-300"></i> 	</div>
                                                                : c.rating == 2 ? <div className="text-nowrap"><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i>	</div>
                                                                : c.rating == 3 ? <div className="text-nowrap"><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i>	</div>
                                                                : c.rating == 4 ? <div className="text-nowrap"><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i>	</div>
                                                                : c.rating == 5 ? <div className="text-nowrap"><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i><i className="icon-star-full2 text-size-base text-warning-300"></i>	</div>
                                                                : <i></i>}
														
															
														</span>
														<span style={{textTransform: "uppercase"}} className="text-size-small display-block">{c.language}</span>
														<PaperType style={{textTransform: "uppercase"}} type={c.paper_type}/>
														</div>
														<div className="media-right media-middle">
																			<ul className="icons-list text-nowrap">
														<li className="dropdown">		
															<div className="btn-group">
										                    	<button type="button" className="btn btn-primary btn-purple btn-icon dropdown-toggle btn-rounded" data-toggle="dropdown">
											                    	Hire Writer
										                    	</button>
																<ul className="dropdown-menu dropdown-menu-right">
																	<li><i className=" icon-menu7" style={{padding:7}}/>For Which Assignment</li>
																	{
     																	this.state.auction.map((a,i) => {
                         												return(
                                            						<li key={i} ><a style={{textTransform: "uppercase"}} onClick={this.hire.bind(this,c.user_id,a.id,a.price)}><i className=" icon-check" />{a.topic}</a></li>
																		 )})}
                                        						</ul>
															</div>
														</li>									
														</ul>
													</div>
												</li>																
                                            
                                            
                                            
                        
                         </ul>
                                        </div>	
                                       						
							</div>
						</div>
					</div>
				</div>
						 
                  )
                })}		
				<div className="panel-footer col-md-10 cnt-cnt" >
								<div className="heading-elements">
								{this.state.prev == '' ?  <button className="btn btn-success btn-rounded heading-btn  pull-left" disabled="disabled">Previous</button> 
                :  <button onClick={this.prev.bind(this)} className="btn btn-success btn-rounded heading-btn  pull-left">Previous</button>}
                {this.state.next == null ?  <button className="btn btn-success btn-rounded heading-btn  pull-right" disabled="disabled">Next</button> 
                :  <button onClick={this.next.bind(this)} className="btn btn-success btn-rounded heading-btn  pull-right">Next</button>}
               
								</div>
							</div>																						
			</div>
			// <!-- /main content -->

              

        );

    }
}
export default Writer
