<template>
    <nav class="mt-4">
          <ul class='d-flex justify-content-center'>
            <li class="mx-3">
                  <a href="#"> Home </a>
            </li>
            <li class="mx-3">
                <a href="#"> Blog </a>
            </li>
            <li class="mx-3">
                <a href="#"> Contacts </a>
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

            &:active,
            &:hover {
                background-color: lightblue;
            }
        }
    }
</style>