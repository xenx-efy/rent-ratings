<template>
  <svg
    :width="width"
    :height="height"
    viewBox="0 0 12 20"
    fill="none"
  >
    <path
      :fill="color"
      d="M10.887 19.113c-.49.49-1.284.49-1.774 0l-7.699-7.699a2 2 0 0 1 0-2.828L9.113.887a1.255 1.255 0 1 1 1.774 1.776L3.55 10l7.337 7.337c.49.49.49 1.285 0 1.776Z"
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
  width: 12,
  height: 20,
  color: '#000'
});
</script>
