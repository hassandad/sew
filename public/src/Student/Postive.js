import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';

class Postive extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: this.props.user.id,
            bidId : this.props.bidId,
            negative: 0,
            positive : 0,
        }
        this.getCount = this.getCount.bind(this);
    }

    componentWillMount() {
        this.getCount();
    }
    getCount(){
        axios.get('/api/order/getBidCount/'+this.state.bidId).then(res => {
            this.setState({
                negative : res.data.negative,
                positive : res.data.positive
            })
        });
    }
    componentDidMount() {

    }
    addReview(type){

        var _state = this.state;
        axios.get('/api/order/bid/addReview/'+type+'/'+_state.bidId+'/'+_state.user).then(res => {
            if(res.status == 200){
                this.getCount();
            }
        })
    }

    render() {
        return (
            <div>
                <span><a onClick={this.addReview.bind(this,1)}><button type="button" className="btn btn-info btn-float btn-rounded legitRipple" style={{padding: 7}}><i className=" icon-thumbs-up3" /></button><span style={{marginLeft: 10, color: '#8c8c8c'}}>Positive</span></a><span style={{marginLeft: 10, color: '#000', fontWeight: 'bold'}}>{this.state.positive}</span></span>
                <span style={{marginLeft: 25}}><a onClick={this.addReview.bind(this,2)}><button type="button" className="btn btn-danger btn-float btn-rounded legitRipple" style={{padding: 7}}><i className=" icon-thumbs-down3" /></button><span style={{marginLeft: 10, color: '#8c8c8c'}}>Nagetive</span></a><span style={{marginLeft: 10, color: '#000', fontWeight: 'bold'}}>{this.state.negative}</span></span>
            </div>
                );
    }
}

export default Postive