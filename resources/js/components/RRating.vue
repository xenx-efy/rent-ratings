<template>
  <div class="flex">
    <div class="flex space-x-2">
      <button
        v-for="star in 5"
        :key="star"
        class="relative"
        :disabled="!canSelect"
        @click="setRating(star)"
      >
        <star-icon />
        <span
          class="absolute left-0 top-0.5 w-0 overflow-hidden"
          :style="{
            width: getWidth(star),
          }"
        >
          <star-icon color="#FFD80F" />
        </span>
      </button>
    </div>
    <p
      v-if="!canSelect"
      class="ml-2"
    >
      {{ rating }}
      <span v-if="count">({{ count }})</span>
    </p>
  </div>
</template>

<script setup lang="ts">
import StarIcon from '@/shared/icon/StarIcon.vue';
import { defineEmits, defineProps, withDefaults } from 'vue';

interface Props {
  canSelect?: boolean;
  count?: number;
  rating?: string | number;
}

const props = withDefaults(defineProps<Props>(), {
  rating: 0,
  count: 0,
  canSelect: false,
});

const getWidth = (star: number) => {
  const fractionalPart = +(props.rating % 1).toFixed(2);
  if (star <= props.rating) {
    return '100%';
  } else if ((star - props.rating).toFixed(2) > (1 - fractionalPart)) {
    return '0%';
  } else {
    const residue = fractionalPart * 100;
    return `${residue}%`;
  }
};

const emits = defineEmits(['click']);

const setRating = (rating: number) => {
  if (!props.canSelect) return;
  emits('click', rating);
};
</script>
