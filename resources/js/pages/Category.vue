<template>
    <section v-if="(category)">
        <h2>Posts' List Belonging to: {{category.name}}</h2>
        <ul class='mt-4' v-if="category.posts.length > 0">
            <li v-for="post in category.posts"
            :key="`post-${post.id}`">
                <router-link :to="{name:'single-post', params: {slug: post.slug}}"> {{ post.title}} </router-link>
            </li>
        </ul> 
        <p v-else>No articles</p>
        <div >
            <router-link :to="{ name: 'blog'}" class="btn btn-secondary mt-4">Back to articles</router-link>
            <router-link :to="{ name: 'categories'}" class="btn btn-secondary mt-4">Back to categories</router-link>

        </div> 
    </section>
    <Loader v-else />
    
</template>

<script>
import Loader from '../components/Loader'
export default {
    name: "Category",
    components: {
        Loader
    },

    data() {
        return {
            category: null
        }
    },
    created() {
        this.getCategory()
    },
    methods:{
        getCategory: function(){
            axios
                .get(`http://127.0.0.1:8000/api/categories/${this.$route.params.slug}`)
                .then(
                    res=> {
                        if(JSON.stringify(res.data) == '{}'){
                            this.$router.push({name: 'not-found'})
                        } else {
                            this.category = res.data;
                        }
                        
                    }
                )
                .catch(
                    err=>console.log(err)
                )
        }
    }

}
</script>

<style>

</style>