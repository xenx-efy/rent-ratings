<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-red-600"> *</span>
    </template>

    <input
      v-model="model"
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
interface Props {
  type?: 'email' | 'number' | 'password' | 'tel' | 'text' | 'url';
  label?: string;
  required?: boolean;
  placeholder?: string;
  inputmode?: 'none' | 'text' | 'numeric' | 'tel' | 'email' | 'url';
  minlength?: number | null;
  maxlength?: number | null;
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
  required: true,
});

const handleChange = (e) => {
  let inputValue = e.target.value;

  if (props.type === 'number') {
    inputValue = inputValue?.replace(/\D/g, '');
  }

  if (props.maxlength !== null && inputValue.length > props.maxlength) {
    model.value = inputValue.slice(0, Number(props.maxlength));
  } else {
    model.value = inputValue;
  }
};
</script>
