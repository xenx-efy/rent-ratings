<template>
  <div class="flex flex-col rounded-2xl border border-gray-300 p-[5px] px-4 py-3.5">
    <p class="sans text-2xl font-medium leading-none">
      {{ title }}
    </p>

    <r-rating
      class="py-2"
      :v-model="rating"
    />

    <div class="w-full border-t border-gray-300" />

    <p class="mt-2.5 font-medium leading-none">
      Плюсы
    </p>
    <p
      class="mt-1 text-sm"
      :class="{ 'line-clamp-2': !expanded }"
    >
      {{ pros }}
    </p>

    <p class="mt-2.5 font-medium leading-none">
      Минусы
    </p>
    <p
      class="mt-1 text-sm"
      :class="{ 'line-clamp-2': !expanded }"
    >
      {{ cons }}
    </p>

    <p class="mt-2.5 font-medium leading-none">
      Совет владельцу
    </p>
    <p
      class="mt-1 text-sm"
      :class="{ 'line-clamp-2': !expanded }"
    >
      {{ adviceToOwner }}
    </p>

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

interface Props {
  title: string;
  pros: string;
  cons: string;
  adviceToOwner?: string;
  rating: string | number;
  date: string;
}

const props = defineProps<Props>();

const expanded = ref(false);

const isNeedCollapse = computed(() => {
  for (let text of [props.pros, props.cons, props.adviceToOwner]) {
    if (text?.length > 90) return true;
  }
  return false;
});
</script>
