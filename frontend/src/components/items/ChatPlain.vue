<template>
    <div @click="select" class="plain">
        {{ name }} {{ connectionStatus }}
    </div>
</template>
<script setup>
import initializeEcho from '@/echo';

import http from '@/http';
import { useMessageStore } from '@/stores/pinia/messageStore';
import { ref } from 'vue';

const store = useMessageStore();
const connectionStatus = ref('');

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
    const response = await http.get('/api/chat/'+props.id);
    console.log(response.data.messages); 
    store.setMessages(response.data.messages, props.id, props.name);

    const echo = initializeEcho();
    (await echo).private(`Chat.${props.id}`)
    .listen('.new-message', data => {
      console.log('Получено событие:', data);
    })
    .subscribed(() => {
      console.log('Подписка на канал выполнена');
      connectionStatus.value = 'connected';
    })
    .error((error) => {
      console.error('Ошибка подключения:', error);
      connectionStatus.value = 'error';
    });

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