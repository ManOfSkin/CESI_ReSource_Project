import Vue from 'vue'
import LoginGood from "../Views/Login/LoginGood";

import '../styles/login_page.css';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');


new Vue({
    components: { LoginGood },
    template: "<LoginGood />"
}).$mount("#LoginGood ");

