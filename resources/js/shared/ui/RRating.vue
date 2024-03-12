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

const model = defineModel<number | string>({ required: true });

const getWidth = (star: number): string => {
  const numValue = Number(model.value);
  const strValue = String(model.value)

  if (star <= numValue) {
    return '100%';
  }

  if (numValue + 1 > star) {
    const fraction = Number(strValue.split('.')[1]);
    const fullness = fraction * 10;
    return fullness + '%';
  }

  if (star > numValue) {
    return '0%';
  }
};

const setRating = (rating: number) => {
  if (!props.canSelect) return;
  model.value = rating;
};
</script>
