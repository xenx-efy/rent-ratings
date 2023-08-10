<template>
  <address-header
    :address="'Ул. Гая, 3, кв. 87'"
    :enable-search="false"
    :theme="'Light'"
  />

  <step-progress :step="step" />

  <div class="mx-4">
    <r-apartment-info-form v-if="step === 1" />
    <r-apartment-estimation-form v-if="step === 2" />
    <r-review-form v-if="step === 3" />

    <div class="flex justify-between">
      <button
        v-if="step > 1"
        class="btn-secondary-outlined mt-4 w-32"
        @click="step--"
      >
        Назад
      </button>
      <button
        v-if="step !== 3"
        class="btn-primary ml-auto mt-4 w-32"
        @click="step++"
      >
        Далее
      </button>
      <button
        v-if="step === 3"
        class="btn-primary ml-auto mt-4 w-48"
        @click="step++"
      >
        Отправить отзыв
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import StepProgress from '@/components/RStepProgress.vue';
import { ref } from 'vue';
import RApartmentInfoForm from '@/components/review-forms/RApartmentInfoForm.vue';
import RApartmentEstimationForm from '@/components/review-forms/RApartmentEstimationForm.vue';
import RReviewForm from '@/components/review-forms/RReviewForm.vue';

const step = ref(1);
</script>
