<template>
    <nav class="mt-4">
          <ul class='d-flex justify-content-center'>
            <li class="mx-3">
                <!-- <a href="#"> Home </a> -->
                <!-- use router-link component for navigation. -->
                <!-- specify the link by passing the `to` prop. -->
                <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
                <router-link :to="{ name:'home' }">Home</router-link>
            </li>
            <li class="mx-3">
                <!-- <a href="#"> Blog </a> -->
                <router-link :to="{ name:'blog' }">Blog</router-link>
            </li>
            <li class="mx-3">
                <!-- <a href="#"> Contacts </a> -->
                <router-link :to="{ name:'contacts' }">Contacts</router-link>
            </li>    
          </ul>
      </nav>
 
</template>

<script>
export default {
    name: 'Header'

}
</script>

<style scoped lang="scss">
    ul{
        padding:0;
    }
    li{
        list-style: none;
        a{
            display:block;
            padding: 10px;
            text-transform: uppercase;
            text-decoration:none;
            color: black;

            &.active,
            &:hover {
                background-color: lightblue;
            }
        }
    }
</style>