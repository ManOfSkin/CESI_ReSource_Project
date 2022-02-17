import Vue from 'vue'
import login_page_m from "../Views/Login/login_page_m";

import '../styles/login_page.css';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');


new Vue({
    components: { login_page_m },
    template: "<login_page_m />"
}).$mount("#login_page_m ");

