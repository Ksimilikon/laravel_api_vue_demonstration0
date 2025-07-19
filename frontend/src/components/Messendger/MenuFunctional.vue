<template>
    <div class="flex fcol fcenter-col">
        <div class="">
            <RouteUser :id="user.id" :name-user="user.name" />
            <p>email: <CopyText :text="user.email" /></p>
        </div>
        <BtnLogout>Выйти</BtnLogout>
    </div>
</template>
<script setup>
    import BtnLogout from '../items/BtnLogout.vue';
import CopyText from '../items/CopyText.vue';
import RouteUser from '../items/RouteUser.vue';
    const props = defineProps({
        user:{
            type: Object,
            required: true
        }
    });
</script>
<style scoped>
    div{
        padding: 10px;
    }
</style>