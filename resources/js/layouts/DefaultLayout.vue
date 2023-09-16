<template>
  <main class="flex min-h-screen flex-col">
    <slot />
    <Footer />
    <r-modal />
  </main>
</template>

<script setup>
import Footer from '@/shared/components/RFooter.vue';
import RModal from '@/components/RModal.vue';
</script>
