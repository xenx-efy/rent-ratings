<template>
  <p class="text-center text-2xl font-medium">
    Оценка квартиры
  </p>

  <p class="mx-auto max-w-[220px] text-center">
    Как вы оцениваете квартиру по следующим критериям?
  </p>

  <div class="mt-8 divide-y">
    <r-apartment-criteria
      v-for="criterion in criterionList"
      :key="criterion.title"
      v-model="estimations[criterion.rating]"
      :title="criterion.title"
      :tooltip="criterion.tooltip"
    />
  </div>
</template>

<script setup lang="ts">
import RApartmentCriteria from '@/components/RApartmentCriteria.vue';

import { reactive, ref } from 'vue';

const estimations = reactive({
  cleanliness: 0,
  neighbours: 0,
  heating: 0,
  loudLevel: 0,
  insects: 0,
  landlordEstimation: 0,
});

const criterionList = ref([
  {
    title: 'Чистота',
    tooltip: ['грязно', 'чисто'],
    rating: 'cleanliness',
  },
  {
    title: 'Соседи',
    tooltip: ['шумные', 'дружелюбные'],
    rating: 'neighbours',
  },
  {
    title: 'Отопление',
    tooltip: ['не работает', 'работает'],
    rating: 'heating',
  },
  {
    title: 'Уровень шума',
    tooltip: ['очень шумно', ' тихо'],
    rating: 'loudLevel',
  },
  {
    title: 'Тараканы',
    tooltip: ['много', ' отсутствуют'],
    rating: 'insects',
  },
  // TODO: Исправить отображение при переносе
  {
    title: 'Отзывчивость хозяев',
    tooltip: ['никакая', ' своевременная'],
    rating: 'landlordEstimation',
  },
]);
</script>
