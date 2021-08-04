<template>
    <section>
        <div class="container" v-if="(!loading && JSON.stringify(post) !='{}')">
            <h2>{{ post.title }}</h2>
            <router-link :to="{ name: 'category', params: { slug: post.category.slug }}" class="badge badge-secondary mb-3" v-if="(post.category)">{{ post.category.name }}</router-link>
            <div class="row">
                <div class="col">
                    <p>{{  post.content }}</p>  
                </div>
                <div class="col">
                    <img :src=" post.cover" :alt="post.title">
                </div>
            </div>
            
            <h4 
                class="badge badge-success mr-2"
                v-for="tag in post.tags"
                :key ="`tag-${tag.id}`"
                >
                {{ tag.name}} 
            </h4>
        </div>
        <NotFound v-else-if ="JSON.stringify(post)=='{}' && !loading"/>
        <Loader v-else/>
        <!-- <div v-else>
            <p>Page not found</p>
        </div> -->
        <div class="container">
            <router-link :to="{ name: 'blog'}" class="btn btn-secondary mt-4">Back to articles</router-link>
        </div> 
    </section>
        

</template>

<script>
import Loader from '../components/Loader';
import NotFound from '../pages/NotFound';

export default {
    name: 'SinglePost',
    components: {
        Loader,
        NotFound
    },
    data() {
        return{
            post: null,
            loading:true
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
                        this.loading=false;
                    }
                )
                .catch(
                    err=>console.log(err)
                )
        }
    }

}
</script>

<style scoped scss="lang">
    img{
        max-width: 100%;
    }
</style>