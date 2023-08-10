<template>
  <header class="relative z-20 flex flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg">
    <application-logo />

    <h2 class="mb-4 ml-7 mt-4 text-white">
      Посмотри отзывы на
      <br>
      выбранную квартиру
    </h2>

    <div class="mx-4 flex items-center justify-between rounded-[8px] bg-white pl-[14px]">
      <search-icon />

      <dropdown
        v-model="searchValue"
        :options="suggestions"
        placeholder="Найди квартиру в Гродно"
        @select="handleSelect"
      />
    </div>
  </header>
</template>

<script setup lang='ts'>
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import { ref, watch } from 'vue';
import debounce from '@/utils/debounce';
import Dropdown from '@/shared/ui/r-dropdown.vue';
import { router } from '@inertiajs/vue3';
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';
import type { ISuggestions } from '@/types/suggestions';
import { getAddressHints } from '@/requests/getAddressHints';

const searchValue = ref('');
const suggestions = ref<ISuggestions[]>([]);
const currentOption = ref({});

watch(searchValue, () => {
  handleSearch();
});

const controller = new AbortController();

const handleSearch = debounce(() => {
  getAddressHints(searchValue.value, controller.signal)
    .then((res) => {
      suggestions.value = res;
    }).catch((err) => {
    if (err.name != 'AbortError') { // обработать ошибку от вызова abort()
      throw err;
    }
  });
}, 500);

const handleSelect = (option) => {
  if (option.data.house) {
    router.visit('house', {
      data: { address: option.value },
    });
    controller.abort();
  }
  searchValue.value = option.value;
  currentOption.value = option;
};
</script>
