<template>
  <address-header
    :address="'Ул. Гая, 3, кв. 87'"
    :enable-search="false"
    :theme="AddressHeaderTheme.Light"
  />

  <div class="m-4 flex flex-col gap-4">
    <r-step-progress
      :step="currentStep"
      :steps-length="FROM_STEP.__LENGTH"
    />

    <component :is="stepComponent" />

    <div class="flex justify-between">
      <template v-if="currentStep > INFO">
        <button
          class="btn-secondary-outlined"
          @click="currentStep -= 1"
        >
          Назад
        </button>
      </template>

      <template v-if="currentStep !== ESTIMATION">
        <button
          class="btn-primary ml-auto"
          @click="currentStep += 1"
        >
          Далее
        </button>
      </template>

      <template v-if="currentStep === ESTIMATION">
        <button
          class="btn-primary ml-auto"
          @click="handleSubmitForm"
        >
          Отправить отзыв
        </button>
      </template>
    </div>
  </div>
</template>

<script setup lang="ts">
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import { computed, ref } from 'vue';
import RApartmentInfoForm from '@/components/review-forms/RApartmentInfoForm.vue';
import RApartmentEstimationForm from '@/components/review-forms/RApartmentEstimationForm.vue';
import { AddressHeaderTheme, FROM_STEP } from '@/types/enums';
import RStepProgress from '@/components/RStepProgress.vue';
import RApartmentReviewForm from '@/components/review-forms/RApartmentReviewForm.vue';

const { INFO, REVIEW, ESTIMATION } = FROM_STEP;

const currentStep = ref<FROM_STEP>(INFO);

const stepComponent = computed(() => {
  return {
    [INFO]: RApartmentInfoForm,
    [REVIEW]: RApartmentReviewForm,
    [ESTIMATION]: RApartmentEstimationForm,
  }[currentStep.value];
});

const handleSubmitForm = () => {
  return;
};
</script>
