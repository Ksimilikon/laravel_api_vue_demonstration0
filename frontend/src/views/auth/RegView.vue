<template>
    <form action="" @submit.prevent>
        <h1 class="text-white">Регистрация</h1>
        <InputForm v-model="name" :type="'text'" :placeholder="'Псевдоним'" :errors="errors.name"/>
        <InputForm v-model="email" :type="'email'" :placeholder="'email'" :errors="errors.email"/>
        <InputForm v-model="password" :type="'password'" :placeholder="'Пароль'" :errors="errors.password"/>
        <div class="btns">
            <button @click="submit" class="btn-base">Регистрация</button>
            <a href="/login">Войти</a>
        </div>
    </form>
</template>

<script setup>
import { AuthMiddleware } from '@/stores/AuthMiddleware';
import { onMounted, reactive } from 'vue';
import { ref } from 'vue';
import http from '@/http';
import router from '@/router';
import InputForm from '@/components/items/InputForm.vue';

const name = ref('');
const email = ref('');
const password = ref('');
const errors = reactive({
    name: [],
    email: [],
    password: [],
});

async function submit() {
    try{
        const credentials = {
            name: name.value,
            email: email.value,
            password: password.value,
        }
        const response = await http.post('/api/register', credentials).then(response=>{
            console.log(response.data);
            localStorage.setItem('token', response.data.token);
            router.push('/');
        })
    }
    catch(err){
        console.log(err);
        errors.name = err.response.data.errors.name;
        errors.email = err.response.data.errors.email;
        errors.password = err.response.data.errors.password;
    }
}
onMounted(async ()=>{
    await AuthMiddleware();
});
</script>

<style scoped>
input{
    width: 35%;
}
form{
    padding: 20px;
    height: 50vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
}
.btns{
    display: flex;
    justify-content: space-between;
    width: 35%;
}
</style>