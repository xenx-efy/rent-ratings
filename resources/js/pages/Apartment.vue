<script setup lang="ts">
import 'vue-dadata/dist/style.css';
import ArrowIcon from '@/shared/icon/ArrowIcon.vue';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import RRating from '@/components/r-rating.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';
import { defineProps } from 'vue';
import ApartmentReviewCard from '@/components/cards/ApartmentReviewCard.vue';

defineProps({
  apartment: Object,
  reviews: Object,
  address: String,
});
</script>

<template>
  <header class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg">
    <application-logo />

    <div class="flex justify-between px-5 pt-5">
      <a
        class="flex items-center"
        href="#"
      >
        <arrow-icon color="#D8E5FF" />
      </a>

      <h2
        class="px-4 text-center text-white"
        :class="{ 'text-base': address.length > 10 }"
      >
        {{ address }}, кв. {{ apartment.number }}
      </h2>

      <button class="flex items-center">
        <search-icon
          width="18"
          height="18"
          color="#D8E5FF"
        />
      </button>
    </div>
  </header>

  <div class="relative m-2 flex flex-1 flex-col">
    <div class="flex flex-col items-center pb-4 pt-2">
      <r-rating
        :rating="apartment.rating"
        :count="apartment.reviewsCount"
      />
    </div>

    <a
      class="btn-link w-3/4 self-center bg-soft-blue text-white"
      href="#"
    >
      Оставить отзыв
    </a>

    <p class="mt-5 pl-5 text-xl font-bold">Отзывы</p>

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
      class="btn-outline mt-2"
      href="#"
    >
      Ещё
    </a>
  </div>
</template>
