import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios';
var t = [];
var paper =[];

class PaperType extends Component {
    constructor(props) {
        super(props);
        this.state = {
            types: [],
            main:[],
            type: 'ABC',
        }
    this.getType = this.getType.bind(this);
    }

    componentWillMount() {
       paper = this.props.type;
       axios.get('/api/writer/getType/'+paper).then(res => {
        if(res.status === 200){
            this.setState({type : res.data});
        }
    });
    }

    getType()
    {
            axios.get('/api/writer/getType/'+paper).then(res => {
                if(res.status === 200){
                     t = res.data;
                 console.log(t);
                }
            });
      
    }

    componentWillReceiveProps(nextProps){
        if(paper !=this.props.type){
           paper = this.props.type;
           // this.getType();
        }
    }
    render() {
        return (
            <span className="text-size-small text-muted display-block">{this.state.type}</span>
        );

    }
}
export default PaperType
