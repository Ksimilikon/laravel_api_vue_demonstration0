<template>
    <div v-if="true" class="marking">
        <ListConversation />
        <DialogArea />
    </div>
</template>
<script>
import ListConversation from '@/components/Messendger/ListConversation.vue';
import DialogArea from '@/components/Messendger/DialogArea.vue';
export default{
    components:{
        ListConversation, 
        DialogArea,
    }
}
</script>
<style scoped>
.marking{
    display: grid;
    grid-template-columns: 1fr 6fr;
    height: 100vh;
    width: 100%;
}
</style>