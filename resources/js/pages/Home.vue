<template>
  <r-header
    search-placeholder="Найди квартиру в Гродно"
    redirect-path="house"
  >
    <template #title>
      Посмотри отзывы на
      <br>
      выбранную квартиру
    </template>
  </r-header>

  <section class="relative -mt-7 flex flex-col">
    <div class="absolute left-[-20px] top-[23%] scale-x-[-1]">
      <search-icon
        color="fill-soft-blue"
        width="182"
        height="182"
      />
    </div>

    <r-info-card
      title="Найди квартиру по адресу"
      :img="MapImage"
      description=" Введи адрес дома, найди интересующую квартиру и посмотри отзывы на неё. Если отзывов нет, вы можете его создать 😉"
      :theme="InfoCardTheme.default"
    />
  </section>

  <r-info-card
    title="Напиши анонимный отзыв о жилье"
    :img="PhoneImage"
    description="Найди квартиру по адресу и анонимно поделись своими впечатлениями"
    :theme="InfoCardTheme.blue"
    button="Оставить отзыв"
    @click="openAddressSearch"
  />

  <section>
    <h2 class="my-8 text-center text-2xl">
      Для чего этот сайт?
    </h2>

    <r-info-card
      v-for="card in aboutCardArray"
      :key="card.title"
      :title="card.title"
      :img="card.img"
      :description="card.description"
      :theme="card.theme"
    />
  </section>
</template>

<script setup lang="ts">
import 'vue-dadata/dist/style.css';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import RHeader from '@/shared/components/RHeader.vue';
import CatImage from '../../images/home/cat.webp';
import WoodHouseSImage from '../../images/home/wood-houses.webp';
import WallWithPaintImage from '../../images/home/wall-with-paint.webp';
import PhoneImage from '../../images/home/phone.webp';
import MapImage from '../../images/home/map.webp';
import RInfoCard, { InfoCardTheme } from '@/components/cards/RInfoCard.vue';
import { router } from '@inertiajs/vue3';

const aboutCardArray = [
  {
    title: 'Поиск жилья',
    description: 'Определись с выбором аренды по отзывам',
    img: WoodHouseSImage,
    theme: InfoCardTheme.default,
  },
  {
    title: 'Выражения мнений',
    description: 'Поделись впечатлениями о проживании',
    img: CatImage,
    theme: InfoCardTheme.blue,
  },
  {
    title: 'Улучшения аренды',
    description: '    Улучши условия проживания на основе мнений',
    img: WallWithPaintImage,
    theme: InfoCardTheme.default,
  },
];

const openAddressSearch = () => {
  router.visit('/address-search');
};
</script>
