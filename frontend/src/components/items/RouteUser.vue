<template>
    <a :href="`/proifle/${id}`">{{ nameUser }}</a>
</template>
<script setup>
const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    nameUser: {
        type: String,
        required: true
    }
})
</script>