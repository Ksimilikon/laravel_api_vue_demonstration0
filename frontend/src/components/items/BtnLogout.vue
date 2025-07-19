<template>
    <button @click="logout" class="btn-danger">
        <slot></slot>
    </button>
</template>
<script setup>
import http from '@/http';
import router from '@/router';
async function logout(){
    await http.post('/api/logout').then(response=>{
        console.log('logout');
    });
    await router.push('/login');
    // await localStorage.removeItem('token');
}
</script>