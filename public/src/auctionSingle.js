import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import AuctionSingle from './Writer/AuctionSingle';
import AuctionBids from './Writer/AuctionBids';

function run() {
    var detail = document.getElementById('detail-div');
    var bid = document.getElementById('bid-div');
    ReactDOM.render(
        <AuctionSingle {...detail.dataset}/>,
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

