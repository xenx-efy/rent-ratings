<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-red-600">&nbsp;*</span>
    </template>

    <input
      class="w-full rounded-lg border border-gray-400 px-4 py-2.5 placeholder:text-gray-400"
      min="1"
      :type="type"
      :value="modelValue"
      :placeholder="placeholder"
      :inputmode="inputmode"
      :minlength="minlength"
      :maxlength="maxlength"
      @input="(e) => emits('update:modelValue', e.target.value)"
    >
  </label>
</template>

<script setup lang="ts">
interface Props {
  type?: 'email' | 'number' | 'password' | 'tel' | 'text' | 'url';
  modelValue: string | number | null;
  label?: string;
  required?: boolean;
  placeholder?: string;
  inputmode?: 'none' | 'text' | 'numeric' | 'tel' | 'email' | 'url';
  minlength?: number | null;
  maxlength?: number | null;
}

withDefaults(defineProps<Props>(), {
  type: 'text',
  label: '',
  required: false,
  placeholder: '',
  inputmode: 'text',
  minlength: null,
  maxlength: null,
});

const emits = defineEmits(['update:modelValue']);
</script>
