<template>
    <div class="container">
        <Header/>
        <main class="container">
            <h2 class="text-center">The Latest Articles</h2>
            <div class="row">
                <Card 
                    v-for='post in posts'
                    :key='post.id'
                    :item='post'
                />

            </div>
        </main>
        <Footer/>
    </div>
</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';
import Card from './components/Card';

export default {
    name: 'App',
    components: {
        Header,
        Footer,
        Card
    },
    data(){
        return {
            posts:[]
        }
    },
    methods: {
        getPosts: function() {
            axios
                .get('http://127.0.0.1:8000/api/posts')
                .then(
                    res=>{
                        console.log(res.data);
                        this.posts = res.data;
                    }
                )
                .catch(
                    err=>console.log(err)
                )
        }
    },
    created: function() {
        this.getPosts();
    }



    
}
</script>

<style lang="scss">

</style>