<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    :width="width"
    :height="height"
    :class="color"
    viewBox="0 0 16 12"
  >
    <path
      d="M1.446 12c-.404 0-.746-.14-1.026-.42-.28-.28-.42-.622-.42-1.026V1.446C0 1.042.14.7.42.42.7.14 1.042 0 1.446 0h12.308c.404 0 .746.14 1.026.42.28.28.42.622.42 1.026v9.108c0 .404-.14.746-.42 1.026-.28.28-.622.42-1.026.42H1.446ZM7.6 6.446 1.2 2.354v8.2c0 .072.023.13.07.177a.24.24 0 0 0 .176.069h12.308a.24.24 0 0 0 .177-.07.24.24 0 0 0 .069-.176v-8.2L7.6 6.446Zm0-1.246 6.277-4H1.323l6.277 4ZM1.2 2.354V1.2v9.354c0 .072.023.13.07.177a.24.24 0 0 0 .176.069H1.2V2.354Z"
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
  width: 16,
  height: 12,
  color: 'fill-white',
});
</script>
