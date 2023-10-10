<template>
  <header class="mt-8 flex">
    <application-logo
      color="fill-blue-950"
      class="m-auto"
      width="270"
      height="96"
    />
  </header>

  <div class="m-auto px-10">
    <div class="m-auto flex">
      <div class="ml-7 flex flex-col justify-between">
        <h1 class="text-center text-3xl">
          Сервис доступен только в мобильной версии
        </h1>
        <h4 class="text-center">
          Откройте на мобильном устройстве
        </h4>
      </div>
    </div>

    <img
      class="mx-auto w-56"
      src="../../images/shared/cat-with-phone.webp"
      alt="Кот держит в лапках телефон"
    >
  </div>
</template>

<script setup>
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';
</script>
