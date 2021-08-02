<template>
    <div class="container">
        <Header/>
        <main >
           <!-- component matched by the route will render here -->
            <router-view></router-view>
        </main>
        <Footer/>
    </div>
</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';


export default {
    name: 'App',
    components: {
        Header,
        Footer,
    }
    



    
}
</script>

<style lang="scss">

</style>