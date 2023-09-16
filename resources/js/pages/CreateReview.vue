<template>
  <address-header
    :address="address"
    :enable-search="false"
    :theme="AddressHeaderTheme.Light"
  />

  <div class="mx-4 my-8">
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
import AddressHeader from '@/shared/components/RAddressHeader.vue';
import { computed, onMounted, provide, ref } from 'vue';
import RApartmentInfoForm from '@/components/review-forms/RApartmentInfoForm.vue';
import RApartmentEstimationForm from '@/components/review-forms/RApartmentEstimationForm.vue';
import { AddressHeaderTheme, FROM_STEP } from '@/types/enums';
import RStepProgress from '@/components/RStepProgress.vue';
import RApartmentReviewForm from '@/components/review-forms/RApartmentReviewForm.vue';
import type { EvaluationCriteria } from '@/types/review';
import {
  getReviewFormsDataFromLocalstorage,
  handleSetReviewPage,
  ReviewFormsData,
  submitForm,
} from '@/components/review-forms/ReviewFormsData.js';

const { INFO, REVIEW, ESTIMATION } = FROM_STEP;

const currentStep = ref<FROM_STEP>(INFO);

interface Props {
  houseId: number;
  address: string;
  evaluationCriteria: EvaluationCriteria[];
}

const props = defineProps<Props>();

provide('evaluationCriteria', props.evaluationCriteria);

onMounted(() => getReviewFormsDataFromLocalstorage(props));

const disabledNextBtn = computed(() => {
  return !Object.values(ReviewFormsData.value[currentStep.value]).every(Boolean);
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
