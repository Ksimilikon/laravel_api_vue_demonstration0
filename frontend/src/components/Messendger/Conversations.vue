<template>
    <div class="">
        <div v-show="showNotFound" class="flex fcenter-col fcol">
            <p class="cursor-def">Пока нет переписок</p>
            <SearchInput class=""/>
        </div>
        <div v-for="el in elements" class="">
            <ChatPlain :id="el.id" :name="el.name" />
        </div>
    </div>
</template>
<script setup>
import { onMounted, ref, watch } from 'vue';
import SearchInput from '../items/SearchInput.vue';
import http from '@/http';
import ChatPlain from '../items/ChatPlain.vue';


const elements = ref([]);
const showNotFound = ref(false);

async function getConversations() {
    const response = await http.get('/api/get-conversations');
    elements.value = response.data.conversations;
    showNotFound.value = elements.value.length < 1;
    console.log(elements.value);
}
watch(elements.value, async ()=>{
    showNotFound.value = elements.value.length < 1;
});
onMounted(async ()=>{
    await getConversations();
});
</script>
