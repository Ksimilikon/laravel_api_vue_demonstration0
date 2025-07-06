<template>
<div class="">
    <div class="collection" v-for="el in arr">
        <p>{{ el.id }}</p>
        <p>{{ el.title }}</p>
    </div>
</div>
</template>
<script>
export default{
    props:{
        arr:{
            type: Array,
            required: true
        }
    }
}
</script>