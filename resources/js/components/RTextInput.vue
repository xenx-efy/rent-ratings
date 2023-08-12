<template>
  <input
    ref="input"
    class="w-full rounded-lg border border-silver-chalice px-4 py-2.5 placeholder:text-silver-chalice focus:outline-soft-blue"
    :placeholder="placeholder"
  />
</template>

<script setup lang="ts">
import { defineEmits, defineExpose, defineProps, ref, withDefaults } from 'vue';

interface Props {
  placeholder?: string;
}

withDefaults(defineProps<Props>(), {
  placeholder: '',
});

defineEmits(['update:modelValue']);

const input = ref(null);

defineExpose({ focus: () => input.value.focus() });
</script>
