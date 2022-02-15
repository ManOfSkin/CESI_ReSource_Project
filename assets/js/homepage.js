import Vue from 'vue'
import HeaderGood from "../Views/HeaderGood";
import FooterMobile from "../Views/FooterMobile";

import '../styles/global.scss';
import '../styles/headerDesktop.css'

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');


new Vue({
    components: { HeaderGood },
    template: "<HeaderGood />"
}).$mount("#HeaderGood ");

new Vue({
    components: { FooterMobile },
    template: "<FooterMobile />"
}).$mount("#footerMobile ");
