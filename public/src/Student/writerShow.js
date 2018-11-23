import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Writer from './Writer'

function run() {
    ReactDOM.render(
        <Writer/>,
        document.getElementById('show')
    );

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

