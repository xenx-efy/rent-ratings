<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    :width="width"
    :height="height"
    viewBox="0 0 22 19"
    :class="color"
  >
    <path
      :class="color"
      d="M10.667 18.6a1 1 0 0 1-1-1V4.193L2.87 10.225a1 1 0 0 1-1.335-.006l-.373-.337a1 1 0 0 1 .007-1.49L10.336.256a1 1 0 0 1 1.328 0l9.167 8.136a1 1 0 0 1 .007 1.49l-.374.337a1 1 0 0 1-1.334.006l-6.797-6.032V17.6a1 1 0 0 1-1 1h-.666Z"
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
  width: 22,
  height: 20,
  color: 'fill-white',
});
</script>
