import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import AssignmentList from './AssignmentList'

function run() {
    ReactDOM.render(
        <AssignmentList/>,
        document.getElementById('auction-list')
    );

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

