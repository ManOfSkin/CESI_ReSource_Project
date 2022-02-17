import Vue from 'vue'
import FooterGood from "../Views/Footer/FooterGood";
import formAddRessource from "../Views/Ressource/FormAddRessource";
import HeaderGood from "../Views/Header/HeaderGood";

import '../styles/formAddRessource.css';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');


new Vue({
    components: { HeaderGood },
    template: "<HeaderGood />"
}).$mount("#HeaderGood ");

new Vue({
    components: { formAddRessource },
    template: "<formAddRessource />"
}).$mount("#formAddRessource ");

new Vue({
    components: { FooterGood },
    template: "<FooterGood />"
}).$mount("#FooterGood ");
