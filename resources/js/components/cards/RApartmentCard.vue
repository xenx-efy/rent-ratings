<template>
  <inertia-link :href="'/apartment/' + id">
    <div class="mt-2 flex rounded-2xl border border-gray-300 p-[5px]">
      <div class="flex h-20 w-20 items-center justify-center rounded-corner bg-slate-200">
        <p class="text-xl font-bold">
          Кв. {{ number }}
        </p>
      </div>

      <div class="ml-4 flex flex-col">
        <r-rating
          :v-model="rating"
          :count="reviewsCount"
        />

        <p class="mt-2 block leading-none">
          Этаж: {{ floor }}
        </p>
        <p class="mt-2 block leading-none">
          Кол-во комнат: {{ roomsAmount }}
        </p>
      </div>
    </div>
  </inertia-link>
</template>

<script setup lang="ts">
import RRating from '@/shared/ui/RRating.vue';

interface Props {
  id: number;
  number: number;
  rating: string | number;
  floor: number | string;
  roomsAmount: number | string;
  reviewsCount: number;
}

defineProps<Props>();
</script>
