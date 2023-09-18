<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    :width="width"
    :height="height"
    fill="none"
    viewBox="0 0 22 20"
  >
    <path
      :class="color"
      d="M10.103.817a1 1 0 0 1 1.794 0l2.397 4.857a1 1 0 0 0 .753.547l5.36.78a1 1 0 0 1 .555 1.705l-3.88 3.781a1 1 0 0 0-.287.885l.916 5.34a1 1 0 0 1-1.451 1.053l-4.795-2.52a1 1 0 0 0-.93 0l-4.795 2.52a1 1 0 0 1-1.45-1.054l.915-5.339a1 1 0 0 0-.288-.885l-3.879-3.78A1 1 0 0 1 1.592 7l5.361-.779a1 1 0 0 0 .753-.547L10.103.817Z"
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
  color: 'fill-gray-300',
});
</script>
