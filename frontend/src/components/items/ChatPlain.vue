<template>
    <div @click="select" class="plain">
        {{ name }}
    </div>
</template>
<script setup>
import http from '@/http';
import { defineStore } from 'pinia';

const props = defineProps({
    id: {
        type: Number,
        required: true,
    },
    name: {
        type: String,
        required: true,
    }
});

async function select() {
    const response = http.get('/api/chat/'+props.id);
    console.log(response); //передать выше по дереву в другую часть окна
    
}
</script>


<style>
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