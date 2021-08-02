<template>
    <div class="d-flex justify-content-center align-items-center">
        <!-- <h3>Loading...</h3> -->
        <div class="loader">Loading...</div>
    </div>
  
</template>

<script>
export default {
    name: 'Loader'

}
</script>

<style scoped lang="scss">
    div{
        height: 80vh;

        .loader {
            color: #3490dc;
            font-size: 20px;
            margin: 100px auto;
            width: 1em;
            height: 1em;
            border-radius: 50%;
            position: relative;
            text-indent: -9999em;
            -webkit-animation: load4 1.3s infinite linear;
            animation: load4 1.3s infinite linear;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }
       

}

</style>