<template>
  <div class="dropdown relative w-full">
    <input
      ref="dropdownInput"
      class="font-cloud-burst w-full border-0 pl-11 pr-4 py-[10px] text-black outline-0 focus:ring-0"
      :class="[modelValue.length ? 'rounded-t-[8px]': 'rounded-[8px]']"
      :value="modelValue"
      :disabled="disabled"
      :placeholder="placeholder"
      @focus="showOptions()"
      @blur="exit()"
      @input="(e) => emits('update:modelValue', e.target.value)"
    >
    <Transition>
      <div
        v-if="optionsShown"
        :ref="optionList"
        class="absolute max-h-80 w-full overflow-auto rounded-b-md bg-white"
      >
        <template v-if="options.length">
          <div
            v-for="(option, index) in options"
            :key="index"
            class="dropdown-item w-full border border-gray-200 p-2"
            @mousedown="selectOption(option)"
          >
            {{ option.value }}
          </div>
        </template>
        <template v-else-if="modelValue.length">
          <div class="dropdown-item w-full border border-gray-200 p-2">
            Адрес не найден
          </div>
        </template>
      </div>
    </Transition>
  </div>
</template>

<script setup lang='ts'>
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

const selectOption = (option) => {
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

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.3s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
