<template>
  <p class="text-center text-2xl font-medium">
    Отзыв
  </p>

  <r-input
    v-model="a"
    label=" Заголовок отзыва"
    placeholder="Что-то краткое, но ёмкое"
  />

  <r-text-area
    v-model="a"
    required
    label="Плюсы"
    placeholder="Какие аспекты жилья вам понравились?"
  />

  <r-text-area
    v-model="a"
    required
    label="Минусы"
    placeholder="Какие аспекты жилья вам НЕ понравились?"
  />

  <r-text-area
    v-model="a"
    required
    label="Совет владельцу жилья"
    placeholder="Что владелец жилья мог бы улучшить?"
  />
</template>

<script setup lang="ts">
import RInput from '@/shared/ui/RInput.vue';
import RTextArea from '@/shared/ui/RTextArea.vue';
import { ref } from 'vue';

const a = ref('');
</script>
