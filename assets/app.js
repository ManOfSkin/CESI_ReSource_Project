import Vue from 'vue'
import DemoComponent from "./DemoComponent";
import HeaderMobile from "./Views/HeaderMobile";
import FooterMobile from "./Views/FooterMobile";

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
    components: { HeaderMobile },
    template: "<HeaderMobile />"
}).$mount("#headerMobile ");

new Vue({
    components: { FooterMobile },
    template: "<FooterMobile />"
}).$mount("#footerMobile ");