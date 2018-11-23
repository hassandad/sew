import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Content from './Content'

function run() {
    ReactDOM.render(
        <Content/>,
        document.getElementById('content')
    );

// renderDom here

}// run end


const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
    run();
} else {
    window.addEventListener('DOMContentLoaded', run, false);
}

