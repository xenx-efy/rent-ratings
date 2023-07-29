<template>
  <div class="flex">
    <div class="flex space-x-2">
      <div
        v-for="star in 5"
        :key="star"
        class="relative"
      >
        <star-icon />
        <div
          class="absolute left-0 top-0 w-0 overflow-hidden"
          :style="{
            width: getWidth(star),
          }"
        >
          <star-icon color="#FFD80F" />
        </div>
      </div>
    </div>
    <p class="ml-2">
      {{ rating }} ({{ count }}})
    </p>
  </div>
</template>

<script setup lang="ts">
import StarIcon from '@/shared/icon/StarIcon.vue';

interface Props {
  disabled?: boolean;
  count?: number;
  rating?: number;
}

const props = withDefaults(defineProps<Props>(), {
  rating: 0,
  count: 0,
  disabled: false
});

const getWidth = (star: number) => {
  if (star <= props.rating) {
    return '100%';
  } else {
    const residue = +(props.rating - star + 1).toFixed(2);
    const residueWidth = residue * 100;
    return `${residueWidth}%`;
  }
};
</script>
