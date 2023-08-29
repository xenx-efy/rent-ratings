<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-grapefruit">&nbsp;*</span>
    </template>

    <input
      class="w-full rounded-lg border border-silver-chalice px-4 py-2.5 placeholder:text-silver-chalice focus:outline-soft-blue"
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
  inputmode: 'none',
  minlength: null,
  maxlength: null,
});

const emits = defineEmits(['update:modelValue']);
</script>
