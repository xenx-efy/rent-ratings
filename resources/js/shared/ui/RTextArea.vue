<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-grapefruit">&nbsp;*</span>
    </template>

    <textarea
      class="min-h-[46px] w-full rounded-lg border border-silver-chalice px-4 py-2.5 placeholder:text-silver-chalice focus:outline-soft-blue"
      :value="modelValue"
      :placeholder="placeholder"
      :minlength="minlength"
      :maxlength="maxlength"
      @input="(e) => emits('update:modelValue', e.target.value)"
    />
  </label>
</template>

<script setup lang="ts">
interface Props {
  modelValue: string;
  label?: string;
  required?: boolean;
  placeholder?: string;
  minlength?: number | null;
  maxlength?: number | null;
}

withDefaults(defineProps<Props>(), {
  label: '',
  required: false,
  placeholder: '',
  minlength: null,
  maxlength: null,
});

const emits = defineEmits(['update:modelValue']);
</script>
