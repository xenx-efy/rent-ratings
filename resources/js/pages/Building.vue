<template>
  <header
    class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg"
  >
    <application-logo />

    <div class="flex justify-between px-5 pt-5">
      <a href="#">
        <arrow-icon color="#D8E5FF" />
      </a>

      <h2 class="text-white">
        Ул. Гая 3
      </h2>

      <search-icon color="#D8E5FF" />
    </div>
  </header>

  <div class="relative m-2 mb-3 flex flex-1 flex-col">
    <building-card />
    <building-card />

    <div class="ml-4 mt-4 flex">
      <p
        class="flex before:mr-2 before:block before:h-full before:w-2 before:rounded-full before:bg-soft-blue"
      >
        Если отзывов на интересующую вас квартиру нет, вы можете написать его 😉
      </p>
    </div>

    <a
      class="btn-link sticky bottom-2 mt-4 w-11/12 self-center bg-soft-blue text-white"
      href="#"
    >
      Оставить отзыв
    </a>
  </div>
</template>

<script>
import ArrowIcon from '@/shared/icon/ArrowIcon.vue';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import BuildingCard from '@/components/BuildingCard.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';

export default {
  name: 'Building',
  components: {
    BuildingCard,
    SearchIcon,
    ArrowIcon,
    ApplicationLogo
  }
};
</script>
