<script setup lang="ts">
import ApartmentCard from '@/components/cards/ApartmentCard.vue';
import AddressHeader from '@/shared/components/AddressHeader.vue';
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

withDefaults(defineProps<Props>(), {
  apartments: {
    data: [],
  },
  address: '',
});
</script>

<template>
  <address-header :address="address" />

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
      </div>
    </template>

    <div class="ml-4 mt-4 flex">
      <p class="flex before:mr-2 before:block before:h-full before:w-2 before:rounded-full before:bg-soft-blue">
        Если отзывов на интересующую вас квартиру нет, вы можете написать его 😉
      </p>
    </div>

    <a
      class="btn-secondary sticky bottom-2 mt-4 w-11/12 self-center bg-soft-blue text-white"
      href="#"
    >
      Оставить отзыв
    </a>
  </div>
</template>
