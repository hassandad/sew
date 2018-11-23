import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import swal from 'sweetalert';
var t = 0;
class BidModal extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user : this.props.user,
            type : '1',
            auction:[],
            amount: 0,
            amountFee:0,
            amountTotal:0,
            description : '',
            orderId: this.props.orderId,
            created : moment(new Date()).format("YYYY-MM-DD"),
            image:'',
            imageName:'',
            elligable:true,
            warning:'',
        }
        this.getOrder = this.getOrder.bind(this);
        this.checkAmount = this.checkAmount.bind(this);
		this.handleChangeImage = this.handleChangeImage.bind(this);
        this.onBidTypeChange = this.onBidTypeChange.bind(this);
    }

    componentWillMount() {
        this.getOrder();
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
        $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).hide();
        $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).hide();

    }
    getOrder(){
        axios.get('/api/assignment/single/'+this.props.orderId).then(res => {
           this.setState({
               auction : res.data
           })
        })
       
    }
    onBidTypeChange(e){
       this.setState({
           type : e.target.value
       },() => {
           if(this.state.type === '2'){
               $(ReactDOM.findDOMNode(this.refs.bidAmount)).show();
               $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).show();
               $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).show();
           }else if(this.state.type === '1'){
            this.setState({amount:'0',warning:'',elligable:true,amountFee:'0',amountTotal:'0'});
               $(ReactDOM.findDOMNode(this.refs.bidAmount)).hide();
               $(ReactDOM.findDOMNode(this.refs.bidAmountFee)).hide();
               $(ReactDOM.findDOMNode(this.refs.bidAmountTotal)).hide();
           }
       });
    }
    checkAmount(amount)
    {    t= Math.round(parseInt(amount) + parseInt((20*amount)/100)) ;
        if (isNaN(t)) {
            t=0;
        }
        if (this.state.auction[0].price < t) {
            this.setState({elligable: false,warning:"Amount Exceeded",amountFee:Math.round(((20*amount)/100)) + '  Commission',amountTotal:t + '  Total Bid'});
        } else {
            this.setState({elligable: true,warning:'',amountFee:Math.round(((20*amount)/100)) + '  Commission',amountTotal:t + '  Total Bid'});
        }
    }
    sendBid(){

        var _state = this.state;
        var post = new URLSearchParams();
        post.append('assignment_id', _state.orderId);
        post.append('type', _state.type);
        post.append('message', _state.description);
        post.append('imageName', _state.imageName);
        post.append('file', _state.image);
        post.append('amount', t);
        if(_state.description == ''){
            swal({
                title: 'Warning',
                text : 'Enter the Message',
                icon : 'error'
            });
        }
        else{

        
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
                  setTimeout(()=> {
                    window.location.reload();
                },1000);
                  this.props.newBid(res.data.data);
              }
          }
        })
    }
    
    
    }
    handleChangeImage(evt) {
        
        var self = this;
        var i;
       
        
        var file = evt.target.files[0];
        var reader  = new FileReader();
        self.setState({imageName:file.name});
        reader.onload = function(upload) {
            self.setState({
                image: upload.target.result
            });
        };
        reader.readAsDataURL(file);
       
        
        
    }
    addFile() {
        $(ReactDOM.findDOMNode(this.refs.fileselect)).click(); 
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
                        <div>
                            <span style={{color: '#000', fontWeight: 'bold'}}>{this.state.warning}</span>
                        </div>
                        <div style={styles.headerUser}>
                            <select onChange={(e) => this.onBidTypeChange(e)} className={'form-control'}>
                                <option value='1'>Negotiable</option>
                                <option value='2'>Bid</option>
                            </select>
                            <input type="number" ref={'bidAmount'} value={this.state.amount} onChange={(e) => {this.setState({amount:e.target.value}); this.checkAmount(e.target.value)}} className={'form-control'} placeholder={'Bid Amount'}/>
                        </div>
                    </div>
                </div>
                <div className="modal-body">
                <div className="form-group">
            <div className="col-md-6">
            <input ref={'bidAmountFee'} value={this.state.amountFee} className={'form-control'} placeholder={'Commission'}/>
            </div>
            <div className="col-md-6">
            <input ref={'bidAmountTotal'} value={this.state.amountTotal} className={'form-control'} placeholder={'Total'}/>
            </div>
            </div>
                    <textarea className={'form-control'} onChange={(e) => this.setState({description : e.target.value})}></textarea>
                </div>
                <div className="modal-footer">
                <button type="button" className="btn btn-primary btn-rounded pull-left" onClick={this.addFile.bind(this)}>ADD File</button>
                <input type="file" ref={'fileselect'} style={{display: 'none'}} className="file-styled-primary" onChange={this.handleChangeImage} />
                    <button type="button" className="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                    {this.state.elligable ? <button type="button" className="btn btn-primary  btn-rounded" onClick={this.sendBid.bind(this)}>Place Bid</button>
                    : <button type="button" className="btn btn-primary  btn-rounded" disabled="disabled" >Place Bid</button>}
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