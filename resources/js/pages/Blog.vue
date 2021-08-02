<template>
    <section class="container">
         <h2 class="text-center">The Latest Articles</h2>
            <div class="row">
                <Card 
                    v-for='post in posts'
                    :key='post.id'
                    :item='post'
                />
            </div>
            <div class="container text-center mt-4">
                <button 
                    v-show="current_page>1"
                    class="btn btn-light"
                    @click='getPosts(current_page-1)'>
                    Prev
                </button>
                <button
                    class="btn mx-2"
                    :class="(n==current_page) ? 'btn-info':'btn-light'"
                    v-for="n in last_page"
                    :key='n'
                    @click="getPosts(n)">
                    {{n}}
                </button>
                <button 
                    v-show="current_page<last_page"
                    class="btn btn-info"
                    @click='getPosts(current_page+1)'>
                    Next
                </button> 
            </div>
    </section>
</template>

<script>
import Card from '../components/Card';

export default {
    name:'Blog',
    components: {
        Card
    },
    data(){
        return {
            posts:[],
            current_page: 2,
            last_page:1

        }
    },
    methods: {
        getPosts: function(page=1) {
            axios
                .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(
                    res=>{
                        console.log(res.data.data);
                        this.posts = res.data.data;
                        this.current_page = res.data.current_page;
                        this.last_page = res.data.last_page
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

<style>

</style>