<script>
import Form from '@/components/Form.vue'
import List from '@/components/List.vue'
export default{
  components:{
    Form, List
  },
  data(){
    return{
      likes: 0,
      arr: [
        {id: 1, title: "qwerty"},
        {id: 2, title: "trwewq"},
      ],
      id: '',
      title: '',
    }
  },
  methods:{
    add(count){
      this.likes+=count;
    },
    reduce(){
      this.likes-=1;
    },
    newPost(element){
      this.arr.push(element);
    }
  }
}
</script>

<template>
  <main>
    <div class="">
      <p>cur: {{ likes }}</p>
      <button v-on:click="add(5)">+</button>
      <button @click="reduce">-</button>
    </div>
    <div class="">
      <List 
      :arr="arr"
      />
    </div>
    <div class="">
      <Form
      @create="newPost"
      />
    </div>
  </main>
</template>
<style>
.collection{
  padding: 10px;
  margin: 7px;
  border: 3px solid cyan;
  border-radius: 10px;
}
.col{ 
  display: flex;
  flex-direction: column;
  gap: 5px;
  min-width: 200px;
}
</style>