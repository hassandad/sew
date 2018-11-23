import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import List from './List'

function run() {
    ReactDOM.render(
        <List/>,
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

