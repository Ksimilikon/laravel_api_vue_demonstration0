<template>
    <div class="w-full">
        <form class="flex frow" @submit.prevent> 
            <input v-model="message" type="text" placeholder="Ваше сообщение">
            <button @click="send" class="btn-base">>></button>
        </form>

    </div>
</template>
<script setup>
import http from '@/http';
import { ref } from 'vue';


const message = ref('');

const props = defineProps({
    idChat: {
        type: Number,
        required: true,
    }
});

async function send() {
    console.log('send message to server');
    const credentials = { 
        idChat: props.idChat,
        message: message.value,
    }
    http.post('/api/send-message', credentials);
    message.value = '';
}
</script>
<style scoped>
.btn-base{
    font-weight: 900;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
input{
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
</style>