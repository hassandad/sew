import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Single from './Single';

function run() {
    var detail = document.getElementById('single');
    ReactDOM.render(
        <Single {...detail.dataset}/>,
        detail
    );


// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

