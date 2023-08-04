<template>
  <!--  todo change route to apartment single page-->
  <!--  eslint-disable-next-line -->
  <Link :href="$route('apartment', id)">
    <div class="mt-2 flex rounded-2xl border-2 border-silver p-[5px]">
      <div class="flex h-20 w-20 items-center justify-center rounded-corner bg-link-water">
        <p class="text-xl font-bold">Кв. {{ number }}</p>
      </div>

      <div class="ml-4 flex flex-col">
        <r-rating
          :rating="rating"
          :count="reviewsCount"
        />

        <p class="text- mt-2 block leading-none">Этаж: {{ floor }}</p>
        <p class="mt-2 block leading-none">Кол-во комнат: {{ roomsAmount }}</p>
      </div>
    </div>
  </Link>
</template>

<script setup lang="ts">
import RRating from '@/components/r-rating.vue';
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

interface Props {
  id: number;
  number: number;
  rating: string;
  floor: number | string;
  roomsAmount: number | string;
  reviewsCount: number;
}

defineProps<Props>();
</script>
