import React, {Component} from 'react';
import axios from 'axios';
import Bids from './Bids';

class AuctionBids extends Component {
    constructor(props) {
        super(props);
        this.state = {
            orderId: this.props.id,
            bids: [],
            newBid: this.props.newBid,
            user : this.props.user
        }
        this.getBids = this.getBids.bind(this);

    }

    componentWillMount() {
        this.getBids();

    }

    componentDidMount() {

    }

    componentWillReceiveProps(nextProps){
        if(this.state.newBid !== nextProps.newBid){
            var array = this.state.bids;
            array.push(nextProps.newBid);
            this.setState({
                bids:array
            })
        }
        if(this.state.user !== nextProps.user){
            this.setState({
                user : nextProps.user,
                id : nextProps.user.id
            })
        }
    }
    getBids(){
        axios.get('/api/order/getBids/'+this.state.orderId).then(res => {
            this.setState({
                bids : res.data,
                count: res.data.length
            },()=> {
                this.props.totalBids(res.data.length);
            });
            }
        );
    }


    render(){
        return (
           <div>
               {
                   this.state.bids.slice(0).reverse().map((data,i) => {
                       return(
                           <Bids user={this.state.user} key={data.bidId} data={data}/>
                       )
                   })
               }

           </div>

        )
    }

}

export default AuctionBids;
