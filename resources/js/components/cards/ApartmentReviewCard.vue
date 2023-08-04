<template>
  <div class="flex flex-col rounded-2xl border-2 border-silver p-[5px] px-4 py-3.5">
    <p class="sans text-2xl font-medium leading-none">
      {{ title }}
    </p>

    <r-rating
      class="py-2"
      :rating="rating"
    />

    <div class="w-full border-t border-silver" />

    <p class="mt-2.5 font-medium leading-none">Плюсы</p>
    <p class="mt-1 line-clamp-2 text-sm">
      {{ pros }}
    </p>

    <p class="mt-2.5 font-medium leading-none">Минусы</p>
    <p class="mt-1 line-clamp-2 text-sm">
      {{ cons }}
    </p>

    <p class="mt-2.5 font-medium leading-none">Совет владельцу</p>
    <p class="mt-1 line-clamp-2 text-sm">
      {{ adviceToOwner }}
    </p>

    <p class="mt-2.5 text-sm opacity-75">
      {{ date }}
    </p>
  </div>
</template>
<script setup lang="ts">
import RRating from '@/components/r-rating.vue';
import { defineProps } from 'vue';

defineProps({
  title: String,
  pros: String,
  cons: String,
  adviceToOwner: String,
  rating: String,
  date: String,
});
</script>
