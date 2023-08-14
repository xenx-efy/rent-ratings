<template>
  <div class="relative w-full">
    <input
      ref="dropdownInput"
      class="font-cloud-burst w-full rounded-[8px] border-0 py-[10px] pl-11 pr-4 text-black outline-0 focus:ring-0"
      :value="modelValue"
      :disabled="disabled"
      :placeholder="placeholder"
      @focus="showOptions()"
      @blur="exit()"
      @input="(e) => emits('update:modelValue', e.target.value)"
    >
    <transition>
      <div
        v-if="optionsShown"
        :ref="optionList"
        class="absolute z-0 -mt-1.5 max-h-80 w-full overflow-auto rounded-b-md bg-white pt-1.5"
      >
        <template v-if="options.length">
          <div
            v-for="(option, index) in options"
            :key="index"
            class="w-full border-t border-gray-200 p-2 pl-4"
            @mousedown="selectOption(option)"
          >
            {{ option.value }}
          </div>
        </template>
        <template v-else-if="modelValue.length">
          <div class="w-full border border-gray-200 p-2 pl-4">
            Адрес не найден
          </div>
        </template>
      </div>
    </transition>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

interface Props {
  options: any[];
  modelValue: any;
  placeholder?: string;
  disabled?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  placeholder: '',
});

const emits = defineEmits(['select', 'update:modelValue']);

const selected = ref<any>({});
const optionsShown = ref(false);
const optionList = ref(null);
const dropdownInput = ref(null);

const selectOption = (option: number) => {
  selected.value = option;
  emits('select', selected.value);
  setTimeout(() => {
    dropdownInput.value.focus();
  }, 0);
};

const showOptions = () => {
  if (!props.disabled) {
    optionsShown.value = true;
  }
};

const exit = () => {
  if (!selected.value?.id) {
    selected.value = {};
  }
  optionsShown.value = false;
};
</script>
