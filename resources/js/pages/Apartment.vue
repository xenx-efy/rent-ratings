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
        Ул. Гая 3, кв. 87
      </h2>

      <search-icon
        width="18"
        height="18"
        color="#D8E5FF"
      />
    </div>
  </header>

  <div class="relative m-2 flex flex-1 flex-col">
    <div class="my-3 flex self-center">
      <div class="flex space-x-2">
        <star-icon />
        <star-icon />
        <star-icon />
        <star-icon />
        <star-icon color="#CACACA" />
      </div>
      <p class="ml-2 block">
        4.3 (13)
      </p>
    </div>

    <a
      class="btn-link w-3/4 self-center bg-soft-blue text-white"
      href="#"
    >
      Оставить отзыв
    </a>

    <p class="mt-5 text-xl font-bold">
      Отзывы
    </p>

    <apartment-card
      v-for="card in 2"
      :key="card"
    />

    <a
      class="btn-outline mt-2"
      href="#"
    >Ещё</a>
  </div>
</template>

<script>
import 'vue-dadata/dist/style.css';
import ArrowIcon from '@/shared/icon/ArrowIcon.vue';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import StarIcon from '@/shared/icon/StarIcon.vue';
import ApartmentCard from '@/components/Cards/ApartmentCard.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';

export default {
  name: 'Apartment',
  components: {
    ApartmentCard,
    StarIcon,
    SearchIcon,
    ArrowIcon,
    ApplicationLogo
  }
};
</script>
