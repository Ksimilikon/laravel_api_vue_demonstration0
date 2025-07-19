<template>
    <div class="area">
        <button @click="toggle">{{ symbolMenu }}</button>
        <div v-if="showMenu" class="">
            <MenuFunctional :user="user" />
        </div>
        <div v-else class="scroll">
            <Conversations />
        </div>
    </div>
</template>
<script setup>
import http from '@/http';
import Conversations from './Conversations.vue';
import MenuFunctional from './MenuFunctional.vue';

import { onMounted, ref } from 'vue';
const user = ref(Object);
const showMenu = ref(false);
const symbolMenu = ref('=');
async function toggle() {
    showMenu.value = !showMenu.value;
    if(showMenu.value){
        symbolMenu.value = 'x';
    }
    else{
        symbolMenu.value = '=';
    }
}
onMounted(async ()=>{
    const response = await http.get('/api/user');
    console.log(response.data)
    user.value = (await response).data;
});

</script>
<style scoped>
.area{
    border: 1px solid cyan;
    height: 100vh;
    padding: 0;
    display: flex;
    flex-direction: column;
}
button{
    background-color: transparent;
    font-size: larger;
    font-weight: 1000;
}
button:hover{
    background-color: rgba(255, 255, 255, 0.1);
}
</style>