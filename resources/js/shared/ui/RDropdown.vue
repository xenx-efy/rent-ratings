<template>
  <div class="relative w-full">
    <input
      ref="dropdownInput"
      v-model="model"
      class="w-full rounded-[8px] border-0 py-[10px] pl-11 pr-4 text-blue-950 outline-0 focus:ring-0"
      :disabled
      :placeholder
      @focus="showOptions()"
      @blur="exit()"
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
        <template v-else-if="model.length">
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
  placeholder?: string;
  disabled?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  placeholder: '',
});

const model = defineModel<string>({ required: true});

const emits = defineEmits(['select']);

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
