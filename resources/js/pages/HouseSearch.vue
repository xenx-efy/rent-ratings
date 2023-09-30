<template>
  <inertia-head>
    <title>Найди квартиру в Гродно и напиши отзыв</title>
    <meta
      name="description"
      content="Найди квартиру по адресу в Гродно и оставь на неё отзыв"
    >
  </inertia-head>

  <r-header
    search-placeholder="Введите адрес"
    redirect-path="create-review"
  >
    <template #title>
      Посмотри отзывы на интересующую квартиру
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
