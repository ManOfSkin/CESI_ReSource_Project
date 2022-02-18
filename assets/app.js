import Vue from 'vue'
import login_page_m from "./Views/login_page_m";
import login_page_d from "./Views/login_page_d";
import FooterDesktop from "./Views/FooterDesktop";
import headerDesktop from "./Views/HeaderDesktop";
/* import HeaderMobile from "./Views/HeaderMobile";
import FooterMobile from "./Views/FooterMobile"; */

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
        components: { login_page_d },
    template: "<login_page_d />"
}).$mount("#login_page_d ");

// new Vue({
//     components: { login_page_m },
//     template: "<login_page_m />"
// }).$mount("#login_page_m ");
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

new Vue({
    el: '#FooterGood',
    components: { FooterGood },
    template: "<FooterGood />"
})
