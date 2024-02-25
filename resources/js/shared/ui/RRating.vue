<template>
  <div class="flex">
    <div class="flex space-x-2">
      <button
        v-for="star in 5"
        :key="star"
        class="relative h-max"
        :disabled="!canSelect"
        @click="setRating(star)"
      >
        <star-icon />
        <span
          class="absolute left-0 top-0 h-full w-0 overflow-hidden"
          :style="{
            width: getWidth(star),
          }"
        >
          <star-icon
            color="fill-yellow-400"
            :height="20"
          />
        </span>
      </button>
    </div>
    <p
      v-if="!canSelect"
      class="ml-2"
    >
      {{ model }}
      <span v-if="count">({{ count }})</span>
    </p>
  </div>
</template>

<script setup lang="ts">
import StarIcon from '@/shared/icon/StarIcon.vue';

interface Props {
  canSelect?: boolean;
  count?: number;
}

const props = withDefaults(defineProps<Props>(), {
  count: 0,
  canSelect: false,
});

const model = defineModel<string | number>({ required: true})

const getWidth = (star: number): string => {
  const value = Number(model.value)
  const fractionalPart = +(value % 1).toFixed(2);

  if (star <= value) {
    return '100%';
  } else if (+(star - value).toFixed(2) > 1 - fractionalPart) {
    return '0%';
  } else {
    const residue = fractionalPart * 100;
    return `${residue}%`;
  }
};

const setRating = (rating: number) => {
  if (!props.canSelect) return;
  model.value = rating
};
</script>
