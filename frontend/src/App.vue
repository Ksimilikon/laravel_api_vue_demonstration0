<script setup>
import { RouterLink, RouterView } from 'vue-router'
import '@/assets/main.css'
import { defineStore } from 'pinia';


</script>

<template>
  <header>

    <div class="wrapper">
      <!-- <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav> -->
    </div>
  </header>
  <main class="center">
    <RouterView />
  </main>
</template>

<style>

</style>
