import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Signup from './Signup/Signup'

function run() {
    ReactDOM.render(
        <Signup/>,
        document.getElementById('signup-div')
    );

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

