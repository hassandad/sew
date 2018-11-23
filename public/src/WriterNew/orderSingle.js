import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import SingleOrder from './SingleOrder';

function run() {
    var detail = document.getElementById('detail-div');
    ReactDOM.render(
        <SingleOrder {...detail.dataset}/>,
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

