<template>
  <section class="container">
      <ul class="d-flex justify-content-center ">
          <li v-for="category in categories"
          :key="`category-${category.id}`">
            <router-link :to="{name: 'category', params: { slug: category.slug }}" class="links mx-4">{{category.name}}</router-link>
          </li>
      </ul>

  </section>
</template>

<script>
export default {
    name: 'Categories',
    data() {
        return{
            categories: []
        }
    },
    created(){
        this.getCategories()
    },
    methods: {
        getCategories: function() {
            axios
            .get('http://127.0.0.1:8000/api/categories')
            .then(
                res=>{
                    //console.log(res);
                    this.categories=res.data;
                }
            )
            .catch(
                err=>console.log(err)
            )
        }
    }


}
</script>

<style scoped lang="scss">
    li{
        list-style: none;
        

        .links{
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
    }

</style>