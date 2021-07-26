<template>
    <div class="text-center mt-5">
        <h1>{{ title }}</h1>
        <h2>{{ subtitle }}</h2>
    </div>

</template>

<script>


export default {
    name: 'WorkInProgress',
    props: ['title','subtitle']
    
}
</script>

<style lang="scss" scoped>

</style>