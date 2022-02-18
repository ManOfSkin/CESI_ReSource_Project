import Vue from 'vue'
import FooterGood from "../Views/FooterGood";
import HeaderGood from "../Views/HeaderGood";

import '../styles/global.scss';
import '../styles/homepage.css';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');


new Vue({
    components: { HeaderGood },
    template: "<HeaderGood />"
}).$mount("#HeaderGood ");

new Vue({
    components: { FooterGood },
    template: "<FooterGood />"
}).$mount("#FooterGood ");
