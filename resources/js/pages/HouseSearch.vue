<template>
  <inertia-head>
    <title>Написать отзыв</title>
    <meta
      head-key="description"
      name="description"
      content="Поделись опытом проживания в арендном жилье"
    >
  </inertia-head>

  <r-header
    search-placeholder="Введите адрес квартиры"
    redirect-path="create-review"
  >
    <template #title>
      Напишите отзыв на квартиру
    </template>
  </r-header>

  <div class="mr-8 flex flex-1 items-center">
    <img
      class=""
      src="../../images/create-review/magnifier-with-map.webp"
      alt="Лупа увеличивающая карту"
    >
  </div>
</template>

<script setup>
import RHeader from '@/shared/components/RHeader.vue';
</script>
