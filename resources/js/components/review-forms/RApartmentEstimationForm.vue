<template>
  <div class="divide-y">
    <r-apartment-criteria
      v-for="criterion in evaluationCriteria"
      :key="criterion.title"
      v-model="ReviewFormsData[stepName][criterion.id]"
      :title="criterion.name"
      :tooltip="criterion.description"
    />
  </div>
</template>

<script setup lang="ts">
import RApartmentCriteria from '@/components/RApartmentCriteria.vue';
import { ReviewFormsData } from '@/components/review-forms/ReviewFormsData.js';
import { inject } from 'vue';

interface Props {
  stepName: number;
}

const evaluationCriteria = inject('evaluationCriteria');

defineProps<Props>();
</script>
