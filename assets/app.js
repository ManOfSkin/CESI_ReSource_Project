import Vue from 'vue'
import DemoComponent from "./DemoComponent";
import login_page_m from "./Views/login_page_m";

import './styles/global.scss';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

new Vue({
    components: { DemoComponent },
    template: "<DemoComponent />"
}).$mount("#demoComponent ");


new Vue({
    components: { login_page_m },
    template: "<login_page_m />"
}).$mount("#login_page_m ");