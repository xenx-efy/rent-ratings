<template>
  <main class="flex min-h-screen flex-col">
    <slot />
    <Footer />
  </main>
</template>

<script setup>
import Footer from '@/shared/components/Footer.vue';
</script>
