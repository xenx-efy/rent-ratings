<template>
  <p class="mx-auto text-center text-2xl font-medium leading-normal">
    Информация о квартире
  </p>

  <r-input
    v-model="a"
    label="Этаж"
    required
    type="number"
  />

  <r-input
    v-model="a"
    label="Количество комнат"
    required
  />
</template>

<script setup lang="ts">
import RInput from '@/shared/ui/RInput.vue';
import { ref } from 'vue';

const a = ref('');
</script>
