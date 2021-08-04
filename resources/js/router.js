// 1. Importo le dipendenze
import Vue from 'vue'
import VueRouter from 'vue-router'

// 2. Inizializzo la Vue Router
Vue.use(VueRouter)

// 3. Importo i componenti delle rotte
import Home from './pages/Home';
import Blog from './pages/Blog';
import Contacts from './pages/Contacts';
import SinglePost from './pages/SinglePost';
import NotFound from './pages/NotFound';
import Categories from './pages/Categories';
import Category from './pages/Category';



// 4. Creo le rotte
const router = new VueRouter(
    {
        mode: 'history', //per non avere il # come chiusura dell'URL
        linkExactActiveClass:'active',
        routes:[
            {
                path:'/',
                name: 'home',
                component: Home
            },
            {
                path:'/blog',
                name:'blog',
                component: Blog
            },
            {
                path:'/contacts',
                name:'contacts',
                component: Contacts
            },
            {
                path:'/blog/:slug',
                name:'single-post',
                component: SinglePost
            },
            {   path: '/blog/categories/list',
                name: 'categories',
                component: Categories
            },
            {
                path: '/blog/category/:slug',
                name: 'category',
                component: Category
            },
            {
                //Questa rotta gestisce 404, va inserita sempre per ultima
                path: '*',
                name:'not-found',
                component: NotFound
            }

        ] 
    }
);

// 5. Esporto le rotte definite
export default router;

