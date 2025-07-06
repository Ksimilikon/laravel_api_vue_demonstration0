<template>
  <div class="about">
    <h1>This is an about page{{ likes }}</h1>
  </div>
</template>
<script>
export default{
  data(){
    return{
      likes: 22222,
    }
  }
}
</script>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
