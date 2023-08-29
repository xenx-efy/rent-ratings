<template>
  <article>
    <template v-if="img">
      <img
        class="min-h-0 w-full"
        :src="img"
        :alt="title"
      >
    </template>

    <div
      class="px-7 pb-8 pt-6"
      :class="{ 'text-white': isBlueTheme, 'bg-soft-blue': isBlueTheme }"
    >
      <template v-if="title">
        <h3 class="text-xl text-inherit">
          {{ title }}
        </h3>
      </template>

      <template v-if="description">
        <p class="mt-2 text-inherit">
          {{ description }}
        </p>
      </template>

      <template v-if="button">
        <button
          class="mt-6"
          :class="{ 'btn-secondary ': isBlueTheme, 'btn-primary': isDefaultTheme }"
          @click="(e) => emits('click', e)"
        >
          {{ button }}
        </button>
      </template>
    </div>
  </article>
</template>

<script lang="ts">
export enum InfoCardTheme {
  default,
  blue,
}

interface Props {
  img: string;
  title: string;
  description: string;
  button?: string;
  theme?: InfoCardTheme;
}
</script>

<script setup lang="ts">
import { computed } from 'vue';

const props = withDefaults(defineProps<Props>(), {
  theme: InfoCardTheme.default,
  button: '',
});

const emits = defineEmits(['click']);

const isBlueTheme = computed(() => props.theme === InfoCardTheme.blue);
const isDefaultTheme = computed(() => props.theme === InfoCardTheme.default);
</script>
