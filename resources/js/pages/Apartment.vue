<template>
  <inertia-head>
    <title>Отзывы на квартиру по адресу {{ fullAddress }}</title>
    <meta
      head-key="description"
      name="description"
      :content="metaDescription"
    >
  </inertia-head>

  <address-header
    :back-url="backUrl"
    :address="fullAddress"
  />

  <div class="relative m-2 flex flex-1 flex-col">
    <div class="flex flex-col items-center pb-4 pt-2">
      <r-rating
        :model-value="apartment.rating"
        :count="apartment.reviewsCount"
      />
    </div>
    <inertia-link
      class="btn-blue w-3/4 self-center bg-blue-400 text-white"
      :href="'/create-review?address=' + address"
    >
      Оставить отзыв
    </inertia-link>

    <p class="mt-5 pl-5 text-xl font-bold">
      Отзывы
    </p>

    <div class="mb-10 flex flex-col space-y-1.5">
      <div
        v-for="r in reviews.data"
        :key="r.title"
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
  </div>
</template>

<script setup lang="ts">
import RRating from '@/shared/ui/RRating.vue';
import ApartmentReviewCard from '@/components/cards/RApartmentReviewCard.vue';
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import { computed, onMounted } from 'vue';
import { useModal } from '@/hooks/useModal';
import type { IApartment, IReview } from '@/types/review';

interface Props {
  address: string;
  apartment: IApartment;
  reviews: {
    data: IReview[];
  };
}

const props = defineProps<Props>();

const { openModal } = useModal();

const metaDescription = computed(() => {
  return `Количество отзывов на квартиру: ${props.apartment.reviewsCount}`;
});

const backUrl = computed(() => {
  return `/house?address=${props.address}`;
});

const fullAddress = computed(() => {
  return `${props.address}, кв ${props.apartment.number}`;
});

const showSuccessModal = () => {
  const isSuccess = JSON.parse(localStorage.getItem('success'));
  if (isSuccess) {
    openModal();
  }
  localStorage.removeItem('success');
};

onMounted(showSuccessModal);
</script>
