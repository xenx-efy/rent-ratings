<template>
  <label>
    <template v-if="label">
      {{ label }}
    </template>

    <template v-if="required">
      <span class="text-red-600">&nbsp;*</span>
    </template>

    <textarea
      v-model="model"
      class="min-h-[46px] w-full rounded-lg border border-gray-400 px-4 py-2.5 placeholder:text-gray-400"
      :placeholder="placeholder"
      :minlength="minlength"
      :maxlength="maxlength"
    />
  </label>
</template>

<script setup lang="ts">
interface Props {
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

const model = defineModel<string>({required: true})
</script>
