window.Vue = require('vue');

//Impostiamo il componente App
import App from './App.vue';

const app= new Vue(
    {
    el: '#root',
    render: h => h(App)
}
);  