import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import swal from 'sweetalert';

class EditModal extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user : this.props.user,
            type : this.props.type,
            amount: this.props.amount,
            description : this.props.message,
            orderId: this.props.orderId,
            created : moment(new Date()).format("YYYY-MM-DD"),
            id:this.props.id,

        }

        this.onBidTypeChange = this.onBidTypeChange.bind(this);
    }

    componentWillMount() {

    }
    componentWillReceiveProps(nextProps){
        if(this.state.user !== nextProps.user){
            this.setState({
                user : nextProps.user,
                id : nextProps.id,
                description : nextProps.message,
                type : nextProps.type
            })
        }
    }
    componentDidMount() {
        if (this.state.type == 1) {
            $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
        }
       

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
        post.append('assignment_id', _state.id);
        post.append('type', _state.type);
        post.append('message', _state.description);
        if(_state.amount !== ''){
            post.append('amount', _state.amount);
        }
        axios.post('/api/order/updateBid',post).then(res => {
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
                  location.reload();
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
                            <input ref={'bidAmount'} value={this.state.amount} onChange={(e) => this.setState({amount : e.target.value})} className={'form-control'} placeholder={'Bid Amount'}/>
                        </div>
                    </div>
                </div>
                <div className="modal-body">
                    <textarea className={'form-control'} value={this.state.description} onChange={(e) => this.setState({description : e.target.value})}></textarea>
                </div>
                <div className="modal-footer">
                <button type="button" className="btn btn-primary heading-btn btn-xlg pull-left">Attach File</button>
                    <button type="button" className="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" className="btn btn-primary" onClick={this.sendBid.bind(this)}>Update Bid</button>
                </div>
            </div>
        )
    }

}

export default EditModal;
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