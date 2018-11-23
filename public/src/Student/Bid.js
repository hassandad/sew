import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
import swal from 'sweetalert'
var bid = '';
var status = '';
class Bid extends Component {
    constructor(props) {
        super(props);
        this.state = {
            bids: [],
        }
    this.getOrders = this.getOrders.bind(this);
    

    }

    componentWillMount() {
        bid = this.props.id;
        status = this.props.status;
       this.getOrders();
    }
    getOrders()
    {
        axios.get('/api/assignment/getBid/'+bid).then(res => {
            if(res.status === 200){
                this.setState({
                    bids: res.data,   
                });
            }
        });
    }
    hire(id,type,price)
    {
        axios.get('/api/order/checkAuction/'+bid).then(res => {
            if (res.data == "error") {
                swal({
                    text: 'Asiignment is not on the Auction State' ,
                    icon : 'error'
                })
            }
            else{
                axios.get('/api/order/checkHire/'+id+'/'+bid).then(res => {
                    if (res.data == "error") {
                        swal({
                            text: 'Hiring request is already Sended to the Writer' ,
                            icon : 'error'
                        })
                    }
                    else{
        if(type == '1')
        {
            swal({
                text: 'Negotiate with the writer to set the Bid Price first' ,
                icon : 'error'
            })
        }
        else{
        axios.get('/api/order/add/'+id+'/'+bid+'/'+price).then(res => {
            swal({
                text: 'Hiring Request has been sent to Writer in amount $'+price ,
                icon : 'success'
            })
            setTimeout(()=> {
                window.location.reload();
            },2000);
        });
    }
}
});
}
});
    }
    chat(id,message)
    {
        var post = new URLSearchParams();
        post.append('message', message);
        post.append('writer_id', id);
        axios.post('/api/chat/add',post).then(res => {
            if(res.status === 200){
               window.location.href="/dashboard/student/message"; 
            }
        })
    }
    componentWillReceiveProps(nextProps){
        if(bid != nextProps.id){
           bid = nextProps.id;
           status = nextProps.status;
            this.getOrders();
        }
    }
    open(name)
    {
        location.href="file:///var/www/html/sew/public/file/"+name;
    }
    render() {
        return (
            <div className="panel-body">
            <ul className="media-list chat-list content-group">
                <li className="media date-step">
                    <span></span>
                </li>
                { this.state.bids.map((c,i) => {
                         return(
                            <li key={i} className="media reversed">
                             {status == '0' ? c.type == '2' ? <div className="btn-group media-left">
                             <button type="button" title="Hire"  onClick={this.hire.bind(this, c.user_id,c.type,c.amount)} className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                             <i className="icon-file-check2"></i>
                             </button>
                             </div> : <div></div>
                            : <div></div>}
                             {/* {status == '0' ?   <div className="btn-group media-left">
                             <button type="button" title="Chat" onClick={this.chat.bind(this, c.user_id, c.message)} className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                             <i className="icon-comments"></i>
                             </button>
                         </div> : <div></div> } */}
               
               
                    <div className="media-body">
                    <div className="media-content">{c.message}</div>
                    {c.type == '1' ?  <div className="media-content"> Price:Negotiable</div>
                       : <div className="media-content"> Price:{c.amount}</div>}
                        {c.file ?   <a href={"/file/"+c.file} download> <button type="button" title="File"  className="btn border-info text-info-600 btn-flat btn-icon btn-rounded">
                        <i className="icon-file-text2"></i>
                                </button></a>
                        :  <div></div> 
                          }
                        <span className="media-annotation display-block mt-10">{c.created_on}</span>
                    </div>
                   

                    <div className="media-right">
                        <a href={"/dashboard/student/writerProfile/"+c.user_id}><span>{c.name}</span>
                        {c.image ? <img src={"/profile/"+c.image}  className="img-circle img-md" alt=""/>
                        : <img src="/writer/assets/images/placeholder.jpg" className="img-circle img-md" alt=""/> }
                            
                        </a>
                    </div>
                </li>
                         )
                        })}

            </ul>

          
         </div>
        );

    }
}
export default Bid
