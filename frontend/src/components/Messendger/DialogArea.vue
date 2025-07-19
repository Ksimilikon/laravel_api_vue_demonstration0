<template>
<div class="area">
    <div class="header w-full flex fcenter-row">
        nameChat
    </div>
    <div class="messages scroll w-full">
        <div v-for="el in msg" class="flex">
            <div v-if="true" class="message-self message">
                {{ el }}
            </div>
            <div v-else class="message">
                {{ 'opponent sdfsdlfj s fslkjfdls;ja fdl;k jflsdkjflskjdf sdlkh fldsk jflsdkj ;flsakj sl;dkjf as;ldk jfsd' }}
            </div>
        </div>
    </div>
    <div class="input">
        <input type="text" name="" id="">
    </div>
</div>
</template>
<script setup>
import { onMounted, ref } from 'vue';

const msg = ref(['sadfad',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
    'sadf',
]);
const isSelf = ref(false);

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