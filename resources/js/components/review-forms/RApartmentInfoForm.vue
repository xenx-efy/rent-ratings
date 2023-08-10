<template>
  <p class="mx-auto mt-4 max-w-[220px] text-center text-2xl font-medium leading-normal">
    Информация о квартире
  </p>

  <input-label required>
    Этаж
  </input-label>
  <text-input />

  <input-label required>
    Количество комнат
  </input-label>
  <text-input />
</template>

<script setup lang="ts">
import InputLabel from '@/components/RInputLabel.vue';
import TextInput from '@/components/RTextInput.vue';
</script>
