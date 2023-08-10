<template>
  <p
    class="mx-auto mt-4 max-w-[220px] text-center text-2xl font-medium leading-normal"
  >
    Оценка квартиры
  </p>

  <p
    class="mx-auto mt-4 max-w-[220px] text-center text-base leading-normal"
  >
    Как вы оцениваете квартиру по следующим критериям?
  </p>

  <div class="px-5 divide-y mt-12">
    <r-apartment-criteria
      :title="'Чистота'"
      :tooltip-text="'1 грязно - 5 чисто'"
      :rating="estimations.cleanliness"
      @change-rating="val => { estimations.cleanliness = val }"
    />

    <r-apartment-criteria
      class="pt-4"
      :title="'Соседи'"
      :tooltip-text="'1 шумные - 5 дружелюбные'"
      :rating="estimations.neighbours"
      @change-rating="val => { estimations.neighbours = val }"
    />

    <r-apartment-criteria
      class="pt-4"
      :title="'Отопление'"
      :tooltip-text="'1 не работает - 5 работает'"
      :rating="estimations.heating"
      @change-rating="val => { estimations.heating = val }"
    />

    <r-apartment-criteria
      class="pt-4"
      :title="'Уровень шума'"
      :tooltip-text="'1 очень шумно - 5 тихо'"
      :rating="estimations.loudLevel"
      @change-rating="val => { estimations.loudLevel = val }"
    />

    <r-apartment-criteria
      class="pt-4"
      :title="'Тараканы'"
      :tooltip-text="'1 много - 5 отсутствуют'"
      :rating="estimations.insects"
      @change-rating="val => { estimations.insects = val }"
    />

    <!--   TODO: Исправить отображение при переносе -->
    <r-apartment-criteria
      class="pt-4"
      :title="'Отзывчивость хозяев'"
      :tooltip-text="'1 никакая - 5 своевременная'"
      :rating="estimations.landlordEstimation"
      @change-rating="val => { estimations.landlordEstimation = val }"
    />
  </div>
</template>

<script setup lang="ts">
import RApartmentCriteria from '@/components/RApartmentCriteria.vue'

import {reactive} from 'vue';
const estimations = reactive({
  cleanliness: 0,
  neighbours: 0,
  heating: 0,
  loudLevel: 0,
  insects: 0,
  landlordEstimation: 0,
})
</script>
