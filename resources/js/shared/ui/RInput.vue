<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-red-600">&nbsp;*</span>
    </template>

    <input
      v-model="value"
      class="w-full rounded-lg border border-gray-400 px-4 py-2.5 placeholder:text-gray-400"
      min="1"
      :type="type"
      :placeholder="placeholder"
      :inputmode="inputmode"
      :minlength="minlength"
      :maxlength="maxlength"
      @input="filterValue"
    >
  </label>
</template>

<script setup lang="ts">
import { onMounted, ref, watch } from 'vue';

interface Props {
  type?: 'email' | 'number' | 'password' | 'tel' | 'text' | 'url';
  modelValue: string | number | null;
  label?: string;
  required?: boolean;
  placeholder?: string;
  inputmode?: 'none' | 'text' | 'numeric' | 'tel' | 'email' | 'url';
  minlength?: number | string | null;
  maxlength?: number | string | null;
}

const props = withDefaults(defineProps<Props>(), {
  type: 'text',
  label: '',
  required: false,
  placeholder: '',
  inputmode: 'text',
  minlength: null,
  maxlength: null,
});

const emits = defineEmits(['update:modelValue']);

const value = ref<string | number>('');

onMounted(() => {
  value.value = props.modelValue;
});

const filterValue = (event) => {
  let newValue = event.target.value;

  if (props.type === 'number') {
    newValue = newValue.replace(/\D/g, '');
  }

  if (props.maxlength !== null) {
    newValue = newValue.slice(0, props.maxlength);
  }

  value.value = newValue;
  emits('update:modelValue', newValue);
};

watch(
  () => props.modelValue,
  (newValue) => {
    value.value = newValue;
  },
);
</script>
