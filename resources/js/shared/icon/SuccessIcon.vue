<template>
  <svg
    :width="width"
    :height="height"
    viewBox="0 0 60 45"
  >
    <path
      d="M18.8066 35.7L6.55656 23.45C5.19156 22.085 3.02156 22.085 1.65656 23.45C0.291563 24.815 0.291563 26.985 1.65656 28.35L16.3216 43.015C17.6866 44.38 19.8916 44.38 21.2566 43.015L58.3566 5.94999C59.7216 4.58499 59.7216 2.41499 58.3566 1.04999C56.9916 -0.315005 54.8216 -0.315005 53.4566 1.04999L18.8066 35.7Z"
      :fill="color"
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
  width: 60,
  height: 45,
  color: '#5786FF',
});
</script>
