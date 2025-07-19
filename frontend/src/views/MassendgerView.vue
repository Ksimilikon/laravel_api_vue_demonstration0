<template>
    <div class="marking">
        <ListConversation />
        <DialogArea class="w-full" />
    </div>
</template>
<script setup>
import http from '@/http';
import { ref, reactive, onMounted, watch } from 'vue';
import { AuthMiddleware } from '@/stores/AuthMiddleware';

import ListConversation from '@/components/Messendger/ListConversation.vue';
import DialogArea from '@/components/Messendger/DialogArea.vue';

// watch();
onMounted(async ()=>{
    console.log("messendview");
    await AuthMiddleware();
    // if(! await isAuth()){
    //     router.push('/login');
    // }
});
</script>
<style scoped>
.marking{
    display: grid;
    grid-template-columns: 1fr 3fr;
    height: 100vh;
    width: 100%;
}
</style>