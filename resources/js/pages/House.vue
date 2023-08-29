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

    <!--  eslint-disable-next-line -->
    <Link
      class="btn-white sticky bottom-2 mt-4 w-11/12 self-center"
      :href="$route('createReview', { address: address })"
    >
      Оставить отзыв
    </Link>
  </div>
</template>

<script setup lang="ts">
import ApartmentCard from '@/components/cards/RApartmentCard.vue';
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import { Link } from '@inertiajs/vue3';

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
  houseId: number;
}

withDefaults(defineProps<Props>(), {
  apartments: {
    data: [],
  },
  address: '',
});
</script>
