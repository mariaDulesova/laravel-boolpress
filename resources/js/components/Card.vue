<template>
    <div class="col-4 d-flex my-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title mb-2 "> {{ item.title }}</h5>
                <p class="card-text"> {{ textExerpt(item.content) }}</p>
                <router-link :to="{ name: 'single-post', params: {slug: item.slug}}">Read more</router-link>
                <!-- <a href="#" class="card-link">Read more</a> -->
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        'item': Object
    },
    methods: {
        textExerpt: function(str) {
            if(this.item.content.length >100) {
                return str.substr(0, 100)+'...';
            } else {
                return this.item.content;
            }
        }
    }

}
</script>

<style scoped>

</style>