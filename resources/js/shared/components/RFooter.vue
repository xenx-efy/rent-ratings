<template>
  <footer class="flex flex-col items-center bg-blue-400 px-5 py-6">
    <div class="flex items-center justify-center">
      <mail-icon class="mr-2 mt-1" />
      <a
        class="text-white underline"
        href="mailto:xenx.efy@yandex.by"
      >
        xenx.efy@yandex.by
      </a>
    </div>
    <p class="mt-1 text-base leading-none text-white">
      &#169; 2024, Rent-Ratings
    </p>
  </footer>
</template>

<script setup>
import MailIcon from '@/shared/icon/MailIcon.vue';
</script>
