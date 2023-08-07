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

<script setup lang="ts">
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import { ref, watch } from 'vue';
import debounce from '@/utils/debounce';
import Dropdown from '@/shared/ui/r-dropdown.vue';
import { router } from '@inertiajs/vue3';
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';

interface ISuggestions {
  data: any;
  unrestricted_value: string;
  value: string;
}

interface ISearchRequest {
  suggestions: ISuggestions[];
}

const searchValue = ref('');
const suggestions = ref<ISuggestions[]>([]);
const currentOption = ref({});

watch(searchValue, () => {
  handleSearch();
});

const controller = new AbortController();

const handleSearch = debounce(() => {
  const query = {
    query: searchValue.value,
    count: 10,
    to_bound: { value: 'house' },
    from_bound: { value: 'street' },
    locations: {
      country: 'Беларусь',
      city: 'Гродно',
    },
    restrict_value: true,
  };

  fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', {
    signal: controller.signal,
    method: 'POST',
    mode: 'cors',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      Authorization: `Token ${import.meta.env.VITE_APP_DADATA_API_KEY}`,
    },
    body: JSON.stringify(query),
  })
    .then(async response => JSON.parse(await response.text()))
    .then((result?: ISearchRequest) => {
      const optionNameList = [];
      const suggestionsList = [];

      result.suggestions.forEach(option => {
        // Убираем одинаковые адреса
        if (!optionNameList.includes(option.value)) {
          optionNameList.push(option.value);
          // Убираем адрес совпадающий с полной улицей
          if (option.value !== searchValue.value) {
            suggestionsList.push(option);
          }
        }
      });

      suggestions.value = suggestionsList;
    });
}, 500);

const handleSelect = option => {
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
