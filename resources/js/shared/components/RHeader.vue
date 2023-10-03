<template>
  <header class="relative z-20 flex flex-col rounded-b-[24px] bg-blue-400 pb-4 drop-shadow-lg">
    <application-logo class="mx-auto mt-2 block" />

    <h1 class="my-4 ml-4 text-xl text-white">
      <slot name="title" />
    </h1>

    <div class="relative mx-4 flex items-center justify-between rounded-[8px] bg-white">
      <search-icon
        class="absolute left-3.5 z-10"
        color="fill-blue-400"
      />

      <dropdown
        v-model="searchValue"
        :options="suggestions"
        :placeholder="searchPlaceholder"
        @select="handleSelect"
      />
    </div>
  </header>
</template>

<script setup lang="ts">
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import { ref, watch } from 'vue';
import debounce from '@/utils/debounce';
import Dropdown from '@/shared/ui/RDropdown.vue';
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';
import type { ISuggestions } from '@/types/suggestions';
import { router } from '@inertiajs/vue3';
import { getAddressHints } from '@/requests/getAddressHints';

interface Props {
  redirectPath: string;
  searchPlaceholder?: string;
}

const props = defineProps<Props>();

const searchValue = ref('');
const suggestions = ref<ISuggestions[]>([]);
const currentOption = ref({});
const controller = new AbortController();

watch(searchValue, (value) => {
  handleSearch(value);
});

const handleSearch = debounce(
  (value: string) =>
    getAddressHints(value, controller.signal).then((res) => {
      suggestions.value = res;
    }),
  500,
);

const handleSelect = (option: any) => {
  if (option.data?.house) {
    router.post(props.redirectPath, { address: option.value });
    controller.abort();
  }

  searchValue.value = option.value;
  currentOption.value = option;
};
</script>
