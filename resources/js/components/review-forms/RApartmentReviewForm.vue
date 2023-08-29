<template>
  <r-input
    v-model="ReviewFormsData[stepName].title"
    required
    label="Заголовок отзыва"
    placeholder="Что-то краткое, но ёмкое"
    :maxlength="255"
  />

  <r-text-area
    v-model="ReviewFormsData[stepName].pros"
    required
    label="Плюсы"
    placeholder="Какие аспекты жилья вам понравились?"
    :maxlength="2000"
  />

  <r-text-area
    v-model="ReviewFormsData[stepName].cons"
    required
    label="Минусы"
    placeholder="Какие аспекты жилья вам НЕ понравились?"
    :maxlength="2000"
  />

  <r-text-area
    v-model="ReviewFormsData[stepName].adviceToOwner"
    required
    label="Совет владельцу жилья"
    placeholder="Что владелец жилья мог бы улучшить?"
    :maxlength="2000"
  />
</template>

<script setup lang="ts">
import RInput from '@/shared/ui/RInput.vue';
import RTextArea from '@/shared/ui/RTextArea.vue';
import { ReviewFormsData } from '@/components/review-forms/ReviewFormsData.js';

interface Props {
  stepName: number;
}

defineProps<Props>();
</script>
