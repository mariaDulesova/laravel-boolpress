<template>
    <section class="container" v-if="(post)">
        <h2>{{ post.title }}</h2>
        <h3 class="badge badge-secondary" v-if="(post.category)">{{ post.category.name }}</h3>
        <p>{{  post.content }}</p>
        <h4 
            class="badge badge-success"
            v-for="tag in post.tags"
            :key ="`tag-${tag.id}`"
            > 
            {{ tag.name}} 
        </h4>
        <div>
            <router-link :to="{ name: 'blog'}" class="btn btn-secondary mt-4">Back to articles</router-link>
        </div>   
    </section>
    <Loader v-else/>
</template>

<script>
import Loader from '../components/Loader'
export default {
    name: 'SinglePost',
    components: {
        Loader
    },
    data() {
        return{
            post: null
        }
    },
    created() {
        this.getPost(this.$route.params.slug);
    },
    methods: {
        getPost(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/posts/${slug}`)
                .then(
                    res=> {
                        //console.log(res.data);
                        this.post=res.data;
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