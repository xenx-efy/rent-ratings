<template>
  <svg
    aria-hidden="true"
    :class="color"
    :width="width"
    :height="height"
    viewBox="0 0 14 14"
  >
    <path
      :class="color"
      stroke="currentColor"
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
    />
  </svg>
</template>

<script setup lang="ts">
interface Props {
  color?: string;
  width?: number | string;
  height?: number | string;
}

withDefaults(defineProps<Props>(), {
  width: 14,
  height: 14,
  color: 'blue-400',
});
</script>
