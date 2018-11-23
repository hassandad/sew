import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import NavLogin from './Login/NavLogin'

function run() {
    ReactDOM.render(
        <NavLogin/>,
        document.getElementById('nav-login')
    );

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

