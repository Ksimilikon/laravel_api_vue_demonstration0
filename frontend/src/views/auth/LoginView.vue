<template>
    <form action="" @submit.prevent>
        <h1 class="text-white">Вход</h1>
        <InputForm :type="'email'"
        :placeholder="'email'"
        :errors="errors.email"
        v-model="email"
        />

        <InputForm :type="'password'" 
        :placeholder="'Пароль'"
        :errors="errors.password"
        v-model="password"
        />
        <div class="btns">
            <button @click="submit" class="btn-base">Войти</button>
            <a href="/register">Регистрация</a>
        </div>
    </form>
</template>
<script setup>
import http from '@/http';
import { onMounted, reactive, ref } from 'vue';
import router from '@/router';
import { AuthMiddleware } from '@/stores/AuthMiddleware';
import InputForm from '@/components/items/InputForm.vue';

const email = ref('');
const password = ref('');
const errors = reactive({
    email: [],
    password: [],
});

async function submit(){
    try {
        const credentials = {
            email: email.value,
            password: password.value,
        }
        const response = await http.post('/api/login', credentials).then(response=>{
            // console.log(response.data);
            localStorage.setItem('token', response.data.token);
            router.push('/');
        });
    } catch (err) {
        // console.log(err);
        console.log(err.response.data.errors);
        errors.email = err.response.data.errors.email;
        errors.password = err.response.data.errors.password;
    }
}

onMounted(async ()=>{
    console.log('loginview');
    await AuthMiddleware();
});
</script>
<style scoped>
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