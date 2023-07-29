<template>
  <div class="mt-2 flex rounded-2xl border-2 border-silver p-[5px]">
    <div
      class="flex h-20 w-20 items-center justify-center rounded-corner bg-link-water"
    >
      <p class="text-xl font-bold">
        Кв. 7
      </p>
    </div>

    <div class="ml-4 flex flex-col">
      <r-rating
        :rating="3.8"
        :count="36"
      />

      <p class="text- mt-2 block leading-none">
        Этаж: 1
      </p>
      <p class="mt-2 block leading-none">
        Кол-во комнат: 2
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import RRating from '@/components/r-rating.vue';
</script>
