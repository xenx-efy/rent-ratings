<template>
  <header
    class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg"
  >
    <application-logo />

    <h2 class="mb-4 ml-7 mt-4 text-white">
      Напиши отзыв на квартиру
    </h2>

    <div
      class="mx-4 flex items-center justify-between overflow-hidden rounded-[8px] bg-white pl-[14px]"
    >
      <search-icon />

      <input
        class="font-cloud-burst w-full border-0 px-4 py-[10px] text-black focus:ring-0"
        type="text"
        placeholder="Введите адрес"
      >
    </div>
  </header>

  <div class="mr-8 flex flex-1 items-center">
    <img
      class=""
      src="../../images/create-review/magnifier-with-map.webp"
      alt="Лупа увеличивающая карту"
    >
  </div>
</template>

<script>
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';

export default {
  name: 'CreateReview',
  components: {
    SearchIcon,
    ApplicationLogo
  }
};
</script>
