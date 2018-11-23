import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import View from './View'

function run() {
    ReactDOM.render(
        <View/>,
        document.getElementById('view')
    );

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

