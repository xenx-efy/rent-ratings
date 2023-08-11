<template>
  <label class="block text-base font-medium">
    <slot />
    <span
      v-if="required"
      class="text-grapefruit"
    >
      *
    </span>
  </label>
</template>

<script setup>
defineProps({
  required: {
    type: Boolean,
    default: false,
  },
});
</script>
