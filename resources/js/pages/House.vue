<template>
  <inertia-head>
    <title>Квартиры с отзывами по адресу {{ address }}</title>
    <meta
      name="description"
      :content="metaDescription"
    >
  </inertia-head>

  <address-header
    back-url="/"
    :address="address"
  />

  <div class="relative m-2 mb-3 flex flex-1 flex-col">
    <template v-if="apartments?.data?.length">
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
      <p class="flex before:mr-2 before:block before:h-full before:w-2 before:rounded-full before:bg-blue-400">
        Если отзывов на интересующую вас квартиру нет, вы можете написать его 😉
      </p>
    </div>

    <inertia-link
      class="btn-white sticky bottom-2 mt-4 w-11/12 self-center"
      :href="'/create-review?address=' + address"
    >
      Оставить отзыв
    </inertia-link>
  </div>
</template>

<script setup lang="ts">
import ApartmentCard from '@/components/cards/RApartmentCard.vue';
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import type { IApartment } from '@/types/review';
import { computed } from 'vue';

interface Props {
  apartments: {
    data: IApartment[] | [];
  };
  address: string;
}

const props = defineProps<Props>();

const metaDescription = computed(() => {
  return props.apartments?.data?.length
    ? `Количество квартир с отзывами по этому адресу: ${props.apartments?.data?.length}. Также у вас есть возможность оставить свой отзыв`
    : 'Квартир с отзывами по этому адресу нет, однако вы можете оставить свой отзыв';
});
</script>
