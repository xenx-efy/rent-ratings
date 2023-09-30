<template>
  <address-header
    :address="fullAddress"
    :enable-search="false"
    :theme="AddressHeaderTheme.Light"
  />

  <div class="mx-4 my-8 mb-auto pb-10">
    <r-step-progress
      :step="currentStep"
      :steps-length="FROM_STEP.__LENGTH"
    />

    <div class="mb-8 mt-4 flex flex-col gap-4">
      <template v-if="steps.title">
        <p class="text-center text-2xl font-medium">
          {{ steps.title }}
        </p>
      </template>

      <template v-if="steps.subtitle">
        <p class="text-center">
          {{ steps.subtitle }}
        </p>
      </template>

      <component
        :is="steps.component"
        :step-name="currentStep"
      />
    </div>

    <div class="flex justify-between">
      <template v-if="currentStep > INFO">
        <button
          class="btn-blue-outlined"
          @click.prevent="currentStep -= 1"
        >
          Назад
        </button>
      </template>
      <template v-if="currentStep !== ESTIMATION">
        <button
          class="btn-white ml-auto"
          :disabled="disabledNextBtn"
          @click.prevent="handleNextPage"
        >
          Далее
        </button>
      </template>

      <template v-if="currentStep === ESTIMATION">
        <button
          class="btn-white ml-auto"
          :disabled="disabledNextBtn"
          @click="handleSubmitForm"
        >
          Отправить отзыв
        </button>
      </template>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, onMounted, provide, ref } from 'vue';
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import RApartmentInfoForm from '@/components/review-forms/RApartmentInfoForm.vue';
import RApartmentEstimationForm from '@/components/review-forms/RApartmentEstimationForm.vue';
import RApartmentReviewForm from '@/components/review-forms/RApartmentReviewForm.vue';
import RStepProgress from '@/components/RStepProgress.vue';
import type { IEvaluationCriteria } from '@/types/review';
import { AddressHeaderTheme, FROM_STEP } from '@/types/enums';
import {
  getReviewFormsDataFromLocalstorage,
  handleSetReviewPage,
  ReviewFormsData,
  submitForm,
} from '@/components/review-forms/ReviewFormsData.js';

const { INFO, REVIEW, ESTIMATION } = FROM_STEP;

const currentStep = ref<FROM_STEP>(INFO);

interface Props {
  houseId?: number;
  address: string;
  evaluationCriteria: IEvaluationCriteria[];
}

const props = defineProps<Props>();

const fullAddress = computed(() => {
  const apartmentNumber = ReviewFormsData[INFO]?.apartmentNumber;

  if (apartmentNumber) {
    return `${props.address}, кв ${apartmentNumber}`;
  }
  return props.address;
});

provide('evaluationCriteria', props.evaluationCriteria);

onMounted(() => getReviewFormsDataFromLocalstorage(props));

const disabledNextBtn = computed(() => {
  return !Object.values(ReviewFormsData[currentStep.value]).every(Boolean);
});

const handleNextPage = () => {
  handleSetReviewPage(currentStep.value);
  currentStep.value += 1;
};

const steps = computed(() => {
  return {
    [INFO]: {
      title: 'Информация о квартире',
      subtitle: '',
      component: RApartmentInfoForm,
    },
    [REVIEW]: {
      subtitle: '',
      title: 'Отзыв',
      component: RApartmentReviewForm,
    },
    [ESTIMATION]: {
      title: 'Оценка квартиры',
      subtitle: 'Как вы оцениваете квартиру по следующим критериям?',
      component: RApartmentEstimationForm,
    },
  }[currentStep.value];
});

const handleSubmitForm = () => {
  handleSetReviewPage(currentStep.value);
  submitForm(props.houseId);
};
</script>
