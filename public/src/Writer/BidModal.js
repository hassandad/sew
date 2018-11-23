import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import swal from 'sweetalert';

class BidModal extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user : this.props.user,
            type : '1',
            amount: 0,
            description : '',
            orderId: this.props.orderId,
            created : moment(new Date()).format("YYYY-MM-DD")

        }

        this.onBidTypeChange = this.onBidTypeChange.bind(this);
    }

    componentWillMount() {

    }
    componentWillReceiveProps(nextProps){
        if(this.state.user !== nextProps.user){
            this.setState({
                user : nextProps.user,
                id : nextProps.user.id
            })
        }
    }
    componentDidMount() {
        $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();

    }
    onBidTypeChange(e){
       this.setState({
           type : e.target.value
       },() => {
           if(this.state.type === '2'){
               $(ReactDOM.findDOMNode(this.refs.bidAmount)).show();
           }else if(this.state.type === '1'){
               $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
           }
       });
    }
    sendBid(){

        var _state = this.state;
        var post = new URLSearchParams();
        post.append('order_id', _state.orderId);
        post.append('type', _state.type);
        post.append('description', _state.description);
        post.append('user_id', _state.user.id);
        if(_state.amount !== ''){
            post.append('amount', _state.amount);
        }
        post.append('created', _state.created);
        axios.post('/api/order/placeBid',post).then(res => {
          if(res.status === 200){
              if(res.data.hasOwnProperty('success')){
                  swal({
                      title: 'Success',
                      text : res.data.msg,
                      icon : 'success'
                  });
                  $(this.props.selector).modal('hide');
                  this.setState({
                      type : '1',
                      amount: 0,
                      description : '',
                  });
                  this.props.newBid(res.data.data);
              }
          }
        })
    }
    render() {
        return (
            <div className="modal-content">
                <div className="modal-header">
                    <div style={styles.headerUser}>
                        <div>
                            <img style={styles.avatar} src={'/user.png'}/>
                            <strong>{this.state.user.username}</strong>
                        </div>
                        <div style={styles.headerUser}>
                            <select onChange={(e) => this.onBidTypeChange(e)} className={'form-control'}>
                                <option value='1'>Negotiable</option>
                                <option value='2'>Bid</option>
                            </select>
                            <input ref={'bidAmount'} onChange={(e) => this.setState({amount : e.target.value})} className={'form-control'} placeholder={'Bid Amount'}/>
                        </div>
                    </div>
                </div>
                <div className="modal-body">
                    <textarea className={'form-control'} onChange={(e) => this.setState({description : e.target.value})}></textarea>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" className="btn btn-primary" onClick={this.sendBid.bind(this)}>Place Bid</button>
                </div>
            </div>
        )
    }

}

export default BidModal;
const styles = {
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