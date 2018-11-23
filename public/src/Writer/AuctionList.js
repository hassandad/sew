import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
var counter = 0;
class AuctionList extends Component {
    constructor() {
        super();
        this.state = {
            iconStar : false,
            orders : [],
            next:'',
            prev: null,
        }
    this.getOrders = this.getOrders.bind(this);

    }

    componentWillMount() {
        this.getOrders();
    }

    componentDidMount() {

    }
    getOrders(){
        axios.get('/api/orders/all').then(res => {
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
    render() {
        return (
            <div>
                {
                    this.state.orders.map((data,i) => {
                        return(
                            <div className="row">
                                <div className="col-md-12 cnt-cnt">
                                    <div className={'panel panel-flat'}>
                                        <div className={'panel-body'} style={styles.panelBody}>
                                            <div style={styles.titleBody}>
                                                <div style={styles.title}>
                                                    <i className={'icon-file-text2'}></i>
                                                    <span style={{paddingLeft: 20}}><h4 style={{color: 'dodgerblue'}}><a href={'/writer/dashboard/auction/'+data.orderId} target={'_blank'}>{data.title}</a></h4></span>
                                                </div>
                                                <i onClick={this.iconStarClick.bind(this)} className={this.state.iconStar ? 'icon-star-full2' : 'icon-star-empty3'}></i>
                                            </div>
                                            <div style={styles.otherDetails}>
                                                <div style={{paddingLeft: 35, fontWeight: 'bold'}}>{data.typeName}</div>
                                                <div style={{fontWeight: 'bold'}}>Budget ${data.price - 2}</div>
                                               <a href={'/writer/dashboard/auction/'+data.orderId}> <button className="btn btn-primary heading-btn btn-xlg pull-right">Apply</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        )
                    })
                }
                 {this.state.prev == null ?  <button onClick={this.prev.bind(this)} className="btn btn-primary heading-btn btn-xlg pull-left" disabled="disabled">Previous</button> 
                :  <button onClick={this.prev.bind(this)} className="btn btn-primary heading-btn btn-xlg pull-left">Previous</button>}
                {this.state.next == null ?  <button onClick={this.next.bind(this)} className="btn btn-primary heading-btn btn-xlg pull-right" disabled="disabled">Next</button> 
                :  <button onClick={this.next.bind(this)} className="btn btn-primary heading-btn btn-xlg pull-right">Next</button>}
               
            </div>
        );

    }
}
export default AuctionList;
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
    }
}
