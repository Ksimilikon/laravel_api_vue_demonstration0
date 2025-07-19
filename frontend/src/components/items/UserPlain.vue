<template>
    <div @click="toDialog" class="plain">
        {{ name }}
    </div>
</template>
<script setup>
import http from '@/http';

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    id: {
        type: Number,
        required: true,
    }
});

async function toDialog() {
    await http.get('/');
}
</script>
<style scoped>
.plain{
    padding: 10px;
    border-bottom: 1px solid #333;
    border-top: 1px solid #333;
    border-left: 1px solid transparent;
    border-right: 1px solid transparent;
    border-radius: 0;
}
.plain:hover{
    background-color: rgba(255, 255, 255, 0.1);
    cursor: pointer;
    border-radius: 5px;
    border-top: 1px solid cyan;
    border-bottom: 1px solid cyan;
    transition: 0.1s;
}
</style>