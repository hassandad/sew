import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Show from './Show'

function run() {
    var elem = document.getElementById("show");
    ReactDOM.render(
        <Show {...elem.dataset} />,
        elem
        
    );
// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

