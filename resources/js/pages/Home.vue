<template>
  <inertia-head>
    <title head-key='title'>
      Отзывы на квартиры в Гродно - Rent Ratings
    </title>
    <meta
      head-key='description'
      name='description'
      content='Просматривайте отзывы на арендное жильё. Делитесь своим опытом проживания в нём. Rent Ratings помогает не ошибиться при выборе арендного жилья.'
    >

    <!--Чтобы гугл индексировал именно эту страницу, так как на ней есть канонический тег-->
    <link
      v-if="host === 'rent-ratings.by'"
      rel='canonical'
      href='https://rent-ratings.by'
    >
  </inertia-head>

  <r-header
    search-placeholder='Введите адрес квартиры'
    redirect-path='house'
  >
    <template #title>
      Посмотри отзывы на квартиру
    </template>
  </r-header>

  <section class='relative -mt-7 flex flex-col'>
    <div class='absolute left-[-20px] top-[23%] scale-x-[-1]'>
      <search-icon
        color='fill-blue-400'
        width='182'
        height='182'
      />
    </div>

    <r-info-card
      title='Найди квартиру по адресу'
      :img='MapImage'
      description='Введитe адрес дома, найдите интересующую квартиру и посмотрите отзывы на неё. Если отзывов нет, вы можете написать его 😉'
    />
  </section>

  <r-info-card
    title='Напиши анонимный отзыв о жилье'
    :img='PhoneImage'
    description='Найди квартиру по адресу и анонимно поделись своими впечатлениями о проживании в ней.'
    theme='blue'
    button='Оставить отзыв'
    @click='openAddressSearch'
  />

  <section>
    <h2 class='my-8 text-center text-2xl'>
      Для чего этот сайт?
    </h2>

    <r-info-card
      v-for='card in aboutCardArray'
      :key='card.title'
      :title='card.title'
      :img='card.img'
      :description='card.description'
      :theme='card.theme'
      :title-level='3'
    />
  </section>
</template>

<script setup lang='ts'>
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import RHeader from '@/shared/components/RHeader.vue';
import CatImage from '../../images/home/cat.webp';
import WoodHouseSImage from '../../images/home/wood-houses.webp';
import WallWithPaintImage from '../../images/home/wall-with-paint.webp';
import PhoneImage from '../../images/home/phone.webp';
import MapImage from '../../images/home/map.webp';
import RInfoCard from '@/components/cards/RInfoCard.vue';
import { router } from '@inertiajs/vue3';

const aboutCardArray = [
  {
    title: 'Поиск жилья',
    description: 'Определись с выбором аренды по отзывам. Не совершай ошибки предыдущих арендаторов.',
    img: WoodHouseSImage,
    theme: 'default',
  },
  {
    title: 'Выражения мнений',
    description: 'Поделись впечатлениями о проживании в квартире. Будущие арендаторы скажут вам спасибо.',
    img: CatImage,
    theme: 'blue',
  },
  {
    title: 'Улучшения аренды',
    description:
      'Улучши условия проживания на основе мнений. Посоветуй хозяевам что можно улучшить в квартире для более комфортного проживания.',
    img: WallWithPaintImage,
    theme: 'default',
  },
];

defineProps<{ host: string }>();

const openAddressSearch = () => {
  router.visit('/address-search');
};
</script>

<style>
h2,
h3 {
  @apply text-xl;
}
</style>
