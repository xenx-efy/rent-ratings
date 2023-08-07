<script setup lang="ts">
import 'vue-dadata/dist/style.css';
import RRating from '@/components/r-rating.vue';
import { defineProps } from 'vue';
import ApartmentReviewCard from '@/components/cards/ApartmentReviewCard.vue';
import AddressHeader from '@/shared/components/AddressHeader.vue';

defineProps({
  apartment: Object,
  reviews: Object,
  address: String,
});
</script>

<template>
  <address-header :address="address" />

  <div class="relative m-2 flex flex-1 flex-col">
    <div class="flex flex-col items-center pb-4 pt-2">
      <r-rating
        :rating="apartment.rating"
        :count="apartment.reviewsCount"
      />
    </div>

    <a
      class="btn-secondary w-3/4 self-center bg-soft-blue text-white"
      href="#"
    >
      Оставить отзыв
    </a>

    <p class="mt-5 pl-5 text-xl font-bold">
      Отзывы
    </p>

    <div class="flex flex-col space-y-1.5">
      <div
        v-for="r in reviews.data"
        :key="r.id"
        class=""
      >
        <apartment-review-card
          :title="r.title"
          :pros="r.pros"
          :cons="r.cons"
          :advice-to-owner="r.adviceToOwner"
          :rating="r.rating"
          :date="r.date"
        />
      </div>
    </div>

    <a
      class="btn-secondary-outlined mt-2"
      href="#"
    >
      Ещё
    </a>
  </div>
</template>
