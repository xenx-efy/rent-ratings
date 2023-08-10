<script setup lang="ts">
import AddressHeader from "@/shared/components/AddressHeader.vue";
import StepProgress from "@/components/RStepProgress.vue"
import {ref} from "vue";
import RApartmentInfoForm from "@/components/review-forms/RApartmentInfoForm.vue"
import RApartmentEstimationForm from "@/components/review-forms/RApartmentEstimationForm.vue"

const step = ref(1)
</script>
<template>
  <address-header
    :address="'Ул. Гая, 3, кв. 87'"
    :enable-search="false"
    :theme="'Light'"
  />

  <step-progress :step="step" />

  <div class="mx-4">
    <r-apartment-info-form v-if="step===1" />
    <r-apartment-estimation-form v-if="step===2" />

    <div class="flex justify-between">
      <button
        v-if="step > 1"
        class="mt-4 w-32 btn-secondary-outlined"
        @click="step--"
      >
        Назад
      </button>
      <button
        v-if="step!==3"
        class="mt-4 ml-auto w-32 btn-primary"
        @click="step++"
      >
        Далее
      </button>
      <button
        v-if="step===3"
        class="mt-4 ml-auto w-48 btn-primary"
        @click="step++"
      >
        Отправить отзыв
      </button>
    </div>
  </div>
</template>
