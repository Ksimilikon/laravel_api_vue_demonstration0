<template>
    <div class="w-full flex fcenter-col fcol input-form">
        <input 
        :type="type" 
        :placeholder="placeholder"
        @input="$emit('update:modelValue', $event.target.value)">
        <p v-for="el in errors" class="error">{{ el }}</p>
    </div>
</template>
<script setup>
const props = defineProps({
    type: {
        type: String,
        required: true
    },


    errors: {
        type: Array,
        required: false
    },
    placeholder:{
        type: String,
        required: false,
    },
});
</script>