import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
var message ;
class LastMessage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            iconStar : false,
            chats : [],
            message : '',
        }
    this.getMessage = this.getMessage.bind(this);
    

    }

    componentWillMount() {
        this.getMessage(this.props.id);
        console.log(this.props.id);
    }
    getMessage(id){
        axios.get('/api/chat/writer/lastMessage/get/'+id).then(res => {
            if(res.status === 200){
                this.setState({message : res.data.message});
            }
        });
        
    }
    componentWillReceiveProps(nextProps){
        if(nextProps.id !=this.props.id){
           this.getMessage(nextProps.id);
        }
    }
    render() {
        return (
            <span style={{textTransform: "uppercase"}} className="text-muted">{this.state.message}</span>
               
        );

    }
}
export default LastMessage
