<template>
  <header class="mt-8 flex">
    <application-logo
      color="fill-blue-950"
      class="m-auto"
      width="270"
      height="96"
    />
  </header>

  <div class="m-auto flex px-10">
    <mobile-tuch-icon />
    <div class="ml-7 flex flex-col justify-between">
      <h1 class="text-3xl">
        Сервис доступен только в мобильной версии
      </h1>
      <h4>Откройте на мобильном устройстве</h4>
    </div>
  </div>
</template>

<script setup>
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';
import MobileTuchIcon from '@/shared/icon/MobileTuchIcon.vue';
</script>
