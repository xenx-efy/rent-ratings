<template>
  <div class="flex flex-col rounded-2xl border border-gray-300 p-[5px] px-4 py-3.5">
    <p class="break-words font-sans text-2xl font-medium leading-none">
      {{ title }}
    </p>

    <r-rating
      :model-value="rating"
      class="py-2"
    />

    <div class="w-full border-t border-gray-300" />

    <article
      v-for="review in reviews"
      :key="review.title"
    >
      <p
        class="mt-2.5 font-medium leading-none"
      >
        {{ review.title }}
      </p>
      <p
        class="mt-1 break-words text-sm"
        :class="{ 'line-clamp-2': !expanded }"
      >
        {{ review.text }}
      </p>
    </article>

    <div class="mt-2.5 flex justify-between">
      <p class="text-sm opacity-75">
        {{ date }}
      </p>
      <button
        v-if="isNeedCollapse"
        class="text-sm leading-none text-blue-400"
        @click="expanded = !expanded"
      >
        {{ expanded ? 'Свернуть' : 'Развернуть' }}
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import RRating from '@/shared/ui/RRating.vue';
import { computed, ref } from 'vue';
import type { IReview } from '@/types/review';

const props = defineProps<IReview>();

const expanded = ref(false);

const isNeedCollapse = computed(() => {
  for (let text of [props.pros, props.cons, props.adviceToOwner]) {
    if (text?.length > 90) return true;
  }
  return false;
});

const reviews = [
  {
    title: 'Плюсы',
    text: props.pros,
  },
  {
    title: 'Минусы',
    text: props.cons,
  },
  {
    title: 'Совет владельцу',
    text: props.adviceToOwner,
  },
]
</script>
