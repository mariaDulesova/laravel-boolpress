window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//Impostiamo il componente App
import App from './App.vue';
import router from './router';

const app= new Vue(
    {
    el: '#root',
    render: h => h(App),
    router
}
);  