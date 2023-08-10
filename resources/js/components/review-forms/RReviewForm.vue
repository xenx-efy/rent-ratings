<template>
  <p class="mx-auto mt-4 max-w-[220px] text-center text-2xl font-medium leading-normal">
    Отзыв
  </p>

  <input-label
    class="mt-4"
    required
  >
    Заголовок отзыва
  </input-label>
  <text-input :placeholder="'Что-то краткое, но ёмкое'" />

  <input-label
    class="mt-2.5"
    required
  >
    Плюсы
  </input-label>
  <text-area :placeholder="'Какие аспекты жилья вам понравились?'" />

  <input-label
    class="mt-2.5"
    required
  >
    Минусы
  </input-label>
  <text-area :placeholder="'Какие аспекты жилья вам НЕ понравились?'" />

  <input-label
    class="mt-2.5"
    required
  >
    Совет владельцу жилья
  </input-label>
  <text-area :placeholder="'Что владелец жилья мог бы улучшить?'" />
</template>

<script setup lang="ts">
import TextInput from '@/components/RTextInput.vue';
import InputLabel from '@/components/RInputLabel.vue';
import TextArea from '@/components/RTextArea.vue';
</script>
