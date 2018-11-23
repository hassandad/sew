import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
var bid = '';
class BidCount extends Component {
    constructor(props) {
        super(props);
        this.state = {
            bid:'',
        }
    this.getOrders = this.getOrders.bind(this);
    

    }

    componentWillMount() {
        bid = this.props.id;
       this.getOrders();
    }
    getOrders()
    {
        axios.get('/api/assignment/getBidCount/'+bid).then(res => {
            if(res.status === 200){
                this.setState({
                    bid: res.data,   
                });
            }
        });
    }
    componentWillReceiveProps(nextProps){
        if(bid != nextProps.id){
           bid = nextProps.id;
            this.getOrders();
        }
    }
    render() {
        return (
            <span style={{fontWeight: "bold"}}> {this.state.bid} </span>
        );

    }
}
export default BidCount
