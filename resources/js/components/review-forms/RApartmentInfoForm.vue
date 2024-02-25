<template>
  <r-input
    v-model="ReviewFormsData[stepName].apartmentNumber"
    label="Номер квартиры"
    placeholder="Введите номер квартиры"
    required
    type="number"
    inputmode="numeric"
    :maxlength="3"
  />

  <r-input
    v-model="ReviewFormsData[stepName].floor"
    label="Этаж"
    placeholder="Введите количество комнат"
    required
    type="number"
    inputmode="numeric"
    :maxlength="2"
  />

  <r-input
    v-model="ReviewFormsData[stepName].amountOfRooms"
    label="Количество комнат"
    placeholder="Введите количество комнат"
    required
    type="number"
    inputmode="numeric"
    :maxlength="2"
  />
</template>

<script setup lang="ts">
import RInput from '@/shared/ui/RInput.vue';
import { ReviewFormsData } from '@/components/review-forms/ReviewFormsData.js';

interface Props {
  stepName: number;
}

defineProps<Props>();
</script>
