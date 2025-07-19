<template>
    <div class="flex fcenter-col fcol w-full">
        <input v-model="queryName" type="text" placeholder="Введите имя пользователя">
        <!-- {{ users }} -->
        <div v-if="users.users.length > 0" v-for="el in users.users" class="w-full">
            <UserPlain :name="el.name" :id="el.id" />
        </div>
        <div v-else class="cursor-def">
            Пользователь не найден
        </div>
    </div>
</template>
<script setup>
import http from '@/http';
import { onMounted, ref, reactive, watch } from 'vue';
import UserPlain from './UserPlain.vue';

const users = reactive({
    users: []
});
const queryName = ref('');
 
async function findUsers(){
    const response = (await http.get('/api/search-users/', {params:{
        'name': queryName.value,
    }}));
    console.log(response);
    users.users = await response.data.users;
    // console.log(users.users.length);
}

watch(queryName, async ()=>{
    findUsers();
});
onMounted(async ()=>{
    findUsers();
});
</script>

<style scoped>
input{
    width: 90%;
    box-sizing: border-box;
    border: none;
    margin: 5px 5px;
}
input:focus,input:focus-visible,input:focus-within{
    border-color: none;
    box-shadow: none;
}
</style>