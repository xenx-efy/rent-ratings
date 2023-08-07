<script setup>
import {ref} from 'vue';

defineProps({
});

defineEmits(['update:modelValue']);

const input = ref(null);

defineExpose({focus: () => input.value.focus()});
</script>

<template>
  <input
    ref="input"
    class="w-full rounded-lg border border-silver-chalice px-4 py-2.5 focus:border-2 focus:ring-soft-blue"
  >
</template>
