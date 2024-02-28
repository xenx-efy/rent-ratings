<template>
  <div class="divide-y">
    <r-apartment-criteria
      v-for="criterion in evaluationCriteria"
      :key="criterion.id"
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
import type { IEvaluationCriteria } from '@/types/review';

interface Props {
  stepName: number;
}

defineProps<Props>();

const evaluationCriteria = inject<IEvaluationCriteria[]>('evaluationCriteria');
</script>
