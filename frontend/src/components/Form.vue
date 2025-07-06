<template>
    <div class="">
        {{ elem.id }}
        {{ elem.title }}
        <form action="" class="col" @submit.prevent>
        <input v-model="elem.id"
        @input="elem.id = $event.target.value"
        type="text" 
        placeholder="id">
        <input v-model="elem.title"
        @input="elem.title = $event.target.value"
            type="text" 
            placeholder="title">
        <button @click="newPost">new</button>
        </form>
    </div>
</template>

<script>
export default{
    data(){
        return{
            elem:{
                id: '',
                title: '',
            }
        }
    },
    methods:{
        newPost(){
            this.$emit('create', this.elem);
            this.elem={
                id:'',
                title:'',
            }
        }
    }
}
</script>