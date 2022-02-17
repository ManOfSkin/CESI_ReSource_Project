import Vue from 'vue'
import DemoComponent from "./DemoComponent";
import login_page_m from "./Views/login_page_m";
import FooterDesktop from "./Views/FooterDesktop";
import headerDesktop from "./Views/HeaderDesktop";
/* import HeaderMobile from "./Views/HeaderMobile";
import FooterMobile from "./Views/FooterMobile"; */

import './styles/global.scss';
import './styles/app.css';

const $ = require('jquery');
require('bootstrap');

new Vue({
    components: { headerDesktop },
    template: "<headerDesktop />"
}).$mount("#headerDesktop ");

new Vue({
    components: { DemoComponent },
    template: "<DemoComponent />"
}).$mount("#demoComponent ");

new Vue({
    template: "<login_page_m />"
}).$mount("#login_page_m ");


/* new Vue({
    components: { HeaderMobile },
}).$mount("#headerMobile ");

new Vue({
    components: { FooterMobile },
    template: "<FooterMobile />"
}).$mount("#footerMobile "); */

new Vue({
    components: { FooterDesktop },
    template: "<FooterDesktop />"
}).$mount("#footerDesktop ");

