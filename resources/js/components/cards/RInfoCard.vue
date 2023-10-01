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
      :class="{ 'text-white': isBlueTheme, 'bg-blue-400': isBlueTheme }"
    >
      <template v-if="title">
        <renderTitle />
      </template>

      <template v-if="description">
        <p class="mt-2 text-inherit">
          {{ description }}
        </p>
      </template>

      <template v-if="button">
        <button
          class="mt-6 w-full"
          :class="{ 'btn-blue ': isBlueTheme, 'btn-white': isDefaultTheme }"
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
  titleLevel: number;
}
</script>

<script setup lang="ts">
import { computed, h } from 'vue';

const props = withDefaults(defineProps<Props>(), {
  theme: InfoCardTheme.default,
  button: '',
  titleLevel: 2,
});

const renderTitle = () => h(`h${props.titleLevel}`, props.title);

const emits = defineEmits(['click']);

const isBlueTheme = computed(() => props.theme === InfoCardTheme.blue);
const isDefaultTheme = computed(() => props.theme === InfoCardTheme.default);
</script>
