import Vue from 'vue'

import './styles/global.scss';
import './styles/app.css';
import HeaderGood from "./Views/Header/HeaderGood";
import FooterGood from "./Views/Footer/FooterGood";

const $ = require('jquery');
require('bootstrap');

new Vue({
    el: '#HeaderGood',
    components: { HeaderGood },
    template: "<HeaderGood />"
})

new Vue({
    el: '#FooterGood',
    components: { FooterGood },
    template: "<FooterGood />"
})
