import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';

import BidPlaced from './BidPlaced'
import Type from './Type'
var counter = 0;
class List extends Component {
    constructor() {
        super();
        this.state = {
            iconStar : false,
            orders : [],
            user: [],
            next:'',
            prev: null,
            type : '1',
            amount: 0,
            description : '',
            image:'',
            id:'',
            auction:[],
            assignmentType:'',
            assignmentSubject:'',
            assignmentSubSubject:'',
            assignmentFormat:'',

            search:'',
            searchNo:'',
        }
    this.getAssignment = this.getAssignment.bind(this);
    this.userSession = this.userSession.bind(this);
    this.getOrder = this.getOrder.bind(this);

    }

    componentWillMount() {
        this.userSession();
        this.getAssignment();
       
    }

    componentDidMount() {
        $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();

    }
    getOrder(id){
        axios.get('/api/assignment/single/'+id).then(res => {
           this.setState({
               auction : res.data[0]
           })

           axios.get('/api/assignment/getType/'+res.data[0].type_id).then(res => {
            if(res.status === 200){
                this.setState({
                    assignmentType: res.data[0].name,   
                });
            }
        });
        axios.get('/api/assignment/getSubject/'+res.data[0].subject_id).then(res => {
            if(res.status === 200){
                this.setState({
                    assignmentSubject: res.data[0].name,
                    assignmentSubSubject: res.data[0].subjectName,   
                });
            }
        });
        axios.get('/api/assignment/getFormat/'+res.data[0].format_id).then(res => {
            if(res.status === 200){
                this.setState({
                    assignmentFormat: res.data[0].name,   
                });
            }
        });
        })
       
    }
  
    getAssignment(){
        axios.get('/api/assignment/get/all').then(res => {
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
    iconStarClick(){
        this.setState({
            iconStar : !this.state.iconStar
        })
    }
    userSession(){
        axios.get('/api/getSession').then(res => {
            this.setState({
                user : res.data
            })
            console.log(this.state.user.id);

        })
    }
    search() {
		if (this.state.search == '') {
			this.getAssignment();
		}
		else{
        axios.get('/api/assignment/search/'+this.state.search).then(res => {
            if(res.status === 200){
				if (res.data.data.length == 0) {
					this.setState({
                        orders: null,
                        next: null,
                        prev: null,
                        sorry : false
                    });
				}
				else
				{
                this.setState({
					orders: res.data.data,
                    next: res.data.next_page_url,
                    prev: null,
					sorry : false
				});
				}
			}
		});
	}
    }
    searchId() {
		if (this.state.searchNo == '') {
			this.getAssignment();
		}
		else{
        axios.get('/api/assignment/searchId/'+this.state.searchNo).then(res => {
            if(res.status === 200){
				if (res.data.data.length == 0) {
					this.setState({
                        orders: null,
                        next: null,
                        prev: null,
                        sorry : false
                    });
				}
				else
				{
                this.setState({
					orders: res.data.data,
                    next: res.data.next_page_url,
                    prev: null,
					sorry : false
				});
				}
			}
		});
	}
    }
   
    
    render() {
        return (
            <div>
                <div className="page-header">
		<div className="col-md-12 cnt-cnt">
			<div className="page-title">
				<div className="panel panel-flat">
					<div className="panel-body">
						<div className="form-horizontal">
							{/* <fieldset>
								<form className="form-group" action="javascript:void(0);">
									<label style={{textTransform: "uppercase"}} className="control-label col-lg-2">Search Assignment</label>
									<div className="col-lg-10">
										<div className="input-group">
											<input type="text"  onChange={(e) => this.setState({search : e.target.value})}  className="form-control" placeholder="Enter Assignment Topic"/>
											<span className="input-group-btn">
												<button onClick={this.search.bind(this)} className="btn btn-primary btn-rounded" type="submit">Search By Topic</button>
											</span>
										</div>
									</div>
								</form>
							</fieldset> */}
                            <fieldset>
								<form className="form-group" action="javascript:void(0);">
									<label style={{textTransform: "uppercase"}} className="control-label col-lg-2">Search Assignment</label>
									<div className="col-lg-10">
										<div className="input-group">
											<input type="text"  onChange={(e) => this.setState({searchNo : e.target.value})}  className="form-control" placeholder="Enter Assignment ID"/>
											<span className="input-group-btn">
												<button onClick={this.searchId.bind(this)} className="btn btn-primary btn-rounded" type="submit">Search By ID</button>
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
                { this.state.orders ?
                    this.state.orders.map((c,i) => {
                        return(
<div key={i}>
<div className="content-group-lg">
<div className="panel panel-flat" style={{marginBottom:0}} >
    <div className="panel-body" style={{padding:0}}>
        <div className="col-md-12">
            <span style={{display:"block",padding:7,textTransform: "uppercase"}}><a  target="_blank" href={'/writer/dashboard/auction/'+c.id}>{c.id} </a><a style={{fontWeight:"bold"}} target="_blank" href={'/writer/dashboard/auction/'+c.id}> {c.topic}</a><Type typeId={c.type_id} subjectId={c.subject_id}/></span>
        </div>										
    </div>
<div className="panel panel-flat">
    <div className="panel-heading" style={{marginTop:0,marginBottom:-15}}><BidPlaced   userId={this.state.user.id} Id={c.id}/>
        <span ><span type="button" className="btn-info btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c",textTransform: "uppercase"}}>Added {c.created_on}</span>
        <span style={{marginLeft: 25}}><span type="button" className="btn-danger btn-rounded" style={{padding: 7}}><i className="icon-calendar"></i></span><span style={{marginLeft: 10 , color: "#8c8c8c", fontWeight: "bold",textTransform: "uppercase"}}>Deadline {c.deadline}</span></span>
        
       
        </span>
    
    </div>
</div>
</div>
</div>
<hr style={{marginTop: -10,
    marginBottom:10,
    border: 0,
    borderTop:"2px solid #00bcd4"}}></hr>
</div>
                        )
                    })
                    :
                    <div className="content-group-lg">
<div className="panel panel-flat" style={{marginBottom:0}} >
    <div className="panel-body" style={{padding:0}}>
        <div className="col-md-12">
            <span style={{display:"block",padding:7,textTransform: "uppercase"}}><a style={{fontWeight:"bold"}} >Nothing Found</a></span>
        </div>										
    </div>
</div>
</div>
                }
                 {this.state.prev == null ?  <button onClick={this.prev.bind(this)} className="btn btn-primary btn-rounded heading-btn  pull-left" disabled="disabled">Previous</button> 
                :  <button onClick={this.prev.bind(this)} className="btn btn-primary btn-rounded heading-btn  pull-left">Previous</button>}
                {this.state.next == null ?  <button onClick={this.next.bind(this)} className="btn btn-primary btn-rounded heading-btn  pull-right" disabled="disabled">Next</button> 
                :  <button onClick={this.next.bind(this)} className="btn btn-primary btn-rounded heading-btn  pull-right">Next</button>}
               





         
            





            </div>
        );

    }
}
export default List;
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
