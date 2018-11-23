import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Login from './Login/Login'

function run() {
    ReactDOM.render(
    < Login />,
        document.getElementById('login-div')
)
    ;

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

