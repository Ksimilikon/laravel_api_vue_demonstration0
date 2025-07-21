<template>
<div class="area">
    <div class="header w-full flex fcenter-row">
        {{ chatName }}
    </div>
    <div class="messages scroll w-full">
        <div v-for="el in msg" class="flex">
            <div v-if="true" class="message-self message">
                {{ el.text }}
            </div>
            <div v-else class="message">
                {{ 'opponent sdfsdlfj s fslkjfdls;ja fdl;k jflsdkjflskjdf sdlkh fldsk jflsdkj ;flsakj sl;dkjf as;ldk jfsd' }}
            </div>
        </div>
    </div>
    <div v-show="chatId > 0" class="input">
        <MessageInput :id-chat="chatId" />
    </div>
</div>
</template>
<script setup>
import { onMounted, ref, watch } from 'vue';
import MessageInput from './messages/MessageInput.vue';
import { useMessageStore } from '@/stores/pinia/messageStore';

const store = useMessageStore();
const isSelf = ref(false);

const msg = ref([]);
msg.value = store.msgs;
const chatId = ref(0);
const chatName = ref('');

watch(store, ()=>{
    chatId.value = store.chatId;
    chatName.value = store.chatName;
    msg.value = store.msgs;
});
onMounted(() => {
  if (msg.value) {
    msg.value.scrollTop = msg.value.scrollHeight
  }
  
})
</script>
<style scoped>
.area{
    border: 1px solid turquoise;
    padding: 1%;
    display: grid;
    grid-template-rows: auto 6fr 1fr;
    width: 100%;
    overflow: hidden;
    box-sizing: border-box;
}

.header{
    grid-row: 1;
}
.messages{
    grid-row: 2;
    display: flex;
    flex-direction: column-reverse;
    gap: 5px;
    margin: 5px 0;
}
.input{
    grid-row: 3;
}
.message{
    background-color: rgba(0, 255, 213, 0.1);
    padding: 5px 10px;
    justify-self: start;
}
.message-self{
    text-align: end;
    background-color: rgba(0, 255, 255, 0.2);
    justify-self: end;
}
</style>