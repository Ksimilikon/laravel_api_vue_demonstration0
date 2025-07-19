<template>
    <span @click="copy" class="" title="Копировать">
        {{ text }}
    </span>
</template>
<script setup>

const props = defineProps({
    text:{
        type: String,
        required: false
    }
});
async function copy(){
    try {
        await navigator.clipboard.writeText(props.text);
        console.log('Текст скопирован');
    } catch (err) {
        console.error('Ошибка копирования:', err);
    }
}
</script>
<style scoped>
span{
    text-decoration: underline;
    cursor: pointer;
}
</style>