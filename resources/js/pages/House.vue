<script setup lang="ts">
import ArrowIcon from '@/shared/icon/ArrowIcon.vue';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';
import ApartmentCard from '@/components/cards/ApartmentCard.vue';
import { defineProps } from 'vue';

interface Apartment {
  id: number;
  number: number;
  floor: number;
  rating: string;
  amountOfRooms: number;
  reviewsCount: number;
}

interface Props {
  apartments: {
    data: Apartment[] | [];
  };
  address: string;
}

// defineProps<Props>();
withDefaults(defineProps<Props>(), {
  apartments: {
    data: [],
  },
  address: '',
});
</script>

<template>
  <header class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg">
    <application-logo />

    <div class="flex justify-between px-5 pt-5">
      <a href="#">
        <arrow-icon color="#D8E5FF" />
      </a>

      <h2
        class="px-4 text-center text-white"
        :class="{ 'text-base': address.length > 10 }"
      >
        {{ address }}
      </h2>

      <search-icon color="#D8E5FF" />
    </div>
  </header>

  <div class="relative m-2 mb-3 flex flex-1 flex-col">
    <template v-if="apartments.data.length > 0">
      <div
        v-for="ap in apartments.data"
        :key="ap.id"
        class="flex flex-col"
      >
        <apartment-card
          :id="ap.id"
          :number="ap.number"
          :rating="ap.rating"
          :floor="ap.floor"
          :rooms-amount="ap.amountOfRooms"
          :reviews-count="ap.reviewsCount"
        />
        <!--        <apartment-card-->
        <!--          :number="ap?.number"-->
        <!--          :rating="ap?.rating"-->
        <!--          :floor="ap?.floor"-->
        <!--          :rooms-amount="ap?.amountOfRooms"-->
        <!--          :reviews-count="ap?.reviewsCount"-->
        <!--        />-->
      </div>
    </template>

    <div class="ml-4 mt-4 flex">
      <p class="flex before:mr-2 before:block before:h-full before:w-2 before:rounded-full before:bg-soft-blue">
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
