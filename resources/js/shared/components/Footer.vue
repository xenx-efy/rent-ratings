<template>
  <footer class="mt-auto flex flex-col items-center bg-soft-blue px-5 py-6">
    <div class="flex items-center justify-center">
      <mail-icon class="mr-2" />
      <a
        class="text-white underline"
        href="mailto:xenx.efy@gmail.com"
      >
        xenx.efy@gmail.com
      </a>
    </div>
    <p class="mt-1 text-base leading-none text-white">
      © 2023, rent-ratings
    </p>
  </footer>
</template>

<script setup>
import MailIcon from '@/shared/icon/MailIcon.vue';
</script>
