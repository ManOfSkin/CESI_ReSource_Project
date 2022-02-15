import Vue from 'vue'
import DemoComponent from "./DemoComponent";
import headerDesktop from "./Views/headerDesktop";

import './styles/global.scss';
import './styles/app.css';
import './styles/headerDesktop.css'

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

new Vue({
    components: { headerDesktop },
    template: "<headerDesktop />"
}).$mount("#headerDesktop ");

new Vue({
    components: { DemoComponent },
    template: "<DemoComponent />"
}).$mount("#demoComponent ");
