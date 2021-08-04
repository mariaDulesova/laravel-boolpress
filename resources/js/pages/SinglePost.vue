<template>
    <section>
        <div class="container" v-if="(post && !loading)">
            <h2>{{ post.title }}</h2>
            <h3 class="badge badge-secondary" v-if="(post.category)">{{ post.category.name }}</h3>
            <div class="row">
                <div class="col">
                    <p>{{  post.content }}</p>  
                </div>
                <div class="col">
                    <img :src=" post.cover" :alt="post.title">
                </div>
            </div>
            
            <h4 
                class="badge badge-success"
                v-for="tag in post.tags"
                :key ="`tag-${tag.id}`"
                > 
                {{ tag.name}} 
            </h4>
        </div>
        <Loader v-else-if="(loading)"/>
        <!-- <div v-else>
            <p>Page not found</p>
        </div> -->
        <div>
            <router-link :to="{ name: 'blog'}" class="btn btn-secondary mt-4">Back to articles</router-link>
        </div> 
    </section>
        

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