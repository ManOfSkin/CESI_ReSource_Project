import Vue from 'vue'

import './styles/global.scss';
import './styles/app.css';
import HeaderGood from "./Views/Header/HeaderGood";
import FooterGood from "./Views/Footer/FooterGood";

const $ = require('jquery');
require('bootstrap');

new Vue({
    components: { HeaderGood },
    template: "<HeaderGood />"
}).$mount("#HeaderGood ");

new Vue({
    components: { FooterGood },
    template: "<FooterGood />"
}).$mount("#FooterGood ");