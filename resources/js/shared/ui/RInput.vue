<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-grapefruit">*</span>
    </template>

    <input
      ref="input"
      class="w-full rounded-lg border border-silver-chalice px-4 py-2.5 placeholder:text-silver-chalice focus:outline-soft-blue"
      :type="type"
      :value="modelValue"
      :placeholder="placeholder"
      @input="(e) => emits('update:modelValue', e.target.value)"
    >
  </label>
</template>

<script setup lang="ts">
import { ref } from 'vue';

interface Props {
  type?: 'email' | 'number' | 'password' | 'tel' | 'text' | 'url';
  modelValue: string;
  label?: string;
  required?: boolean;
  placeholder?: string;
}

withDefaults(defineProps<Props>(), {
  type: 'text',
  label: '',
  required: false,
  placeholder: '',
});

const emits = defineEmits(['update:modelValue']);

const input = ref(null);

defineExpose({ focus: () => input.value.focus() });
</script>
