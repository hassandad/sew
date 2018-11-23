import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
var type = '';
var subject = '';
class Type extends Component {
    constructor(props) {
        super(props);
        this.state = {
          type:'',
          subject:'',
          subSubject:'',
            type_id: this.props.typeId,
            subject_id: this.props.subjectId,
        }
    this.getOrders = this.getOrders.bind(this);
    

    }

    componentWillMount() {
        type = this.props.typeId;
        subject = this.props.subjectId;
       this.getOrders();
    }
    getOrders()
    {
        axios.get('/api/assignment/getType/'+type).then(res => {
            if(res.status === 200){
                this.setState({
                    type: res.data[0].name,   
                });
            }
        });
        axios.get('/api/assignment/getSubject/'+subject).then(res => {
            if(res.status === 200){
                this.setState({
                    subject: res.data[0].name,
                    subSubject: res.data[0].subjectName,   
                });
            }
        });
    }
    componentWillReceiveProps(nextProps){
        if(type != nextProps.typeId){
           type = nextProps.typeId;
           subject = nextProps.subjectId;
            this.getOrders();
        }
    }
    render() {
        return (
           <span> <span style={{ padding: 7}}>{this.state.type}</span><span style={{float: "right"}}>{this.state.subject} , {this.state.subSubject}  </span></span>
        );

    }
}
export default Type
