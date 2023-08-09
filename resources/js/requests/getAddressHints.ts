import useFetch from "@/utils/useFetch";
import type { ISearchRequest } from "@/types/suggestions";

export const getAddressHints = (value, abortSignal) => {
  const body = {
    query: value,
    count: 10,
    to_bound: { value: "house" },
    from_bound: { value: "street" },
    locations: {
      country: "Беларусь",
      city: "Гродно"
    },
    restrict_value: true
  };

  return useFetch(
    "POST",
    "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address",
    body,
    {
      signal: abortSignal,
      mode: "cors",
      headers: {
        Authorization: `Token ${import.meta.env.VITE_APP_DADATA_API_KEY}`
      }
    }
  ).then((result: ISearchRequest) => {
    const optionNameList = [];
    const suggestionsList = [];

    result.suggestions.forEach(option => {
      // Убираем одинаковые адреса
      if (!optionNameList.includes(option.value)) {
        optionNameList.push(option.value);
        // Убираем адрес совпадающий с полной улицей
        if (option.value !== value) {
          suggestionsList.push(option);
        }
      }
    });

    return suggestionsList;
  });
};
