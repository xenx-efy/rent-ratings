<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-red-600"> *</span>
    </template>

    <input
      v-model="showValue"
      class="w-full rounded-lg border border-gray-400 px-4 py-2.5 placeholder:text-gray-400"
      min="1"
      :type
      :placeholder
      :inputmode
      :minlength
      :maxlength
      @input="handleChange"
    />
  </label>
</template>

<script setup lang="ts">
import { ref } from 'vue';

interface Props {
  type?: 'email' | 'number' | 'password' | 'tel' | 'text' | 'url';
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

const model = defineModel<string | number | null>({
  set(value) {
    value = value.toString();

    if (props.type === 'number') {
      value = value?.replace(/\D/g, '');
    }

    if (props.maxlength !== null) {
      value = value?.slice(0, Number(props.maxlength));
    }
    showValue.value = value;
    return value;
  },
});

const showValue = ref('');

const handleChange = (e) => {
  model.value = e.target.value;
};
</script>
