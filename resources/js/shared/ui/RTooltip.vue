<template>
  <div class="group relative flex">
    <question-mark-icon
      @mouseover="hidden = false"
      @mouseleave="hidden = true"
    />
    <span
      class="absolute -top-2 left-1/2 -translate-x-1/2 -translate-y-full whitespace-nowrap rounded-lg bg-[#252D4F] px-2 py-1 text-center text-sm text-white after:absolute after:left-1/2 after:top-[100%] after:-mt-px after:-translate-x-1/2 after:border-8 after:border-x-transparent after:border-b-transparent after:border-t-[#252D4F] after:content-[''] group-hover:flex"
      :style="{ display: hidden ? 'none' : 'block' }"
    >
      {{ tooltip }}
    </span>
  </div>
</template>

<script setup lang="ts">
import QuestionMarkIcon from '@/shared/icon/QuestionMarkIcon.vue';
import { ref } from 'vue';

const hidden = ref(true);

interface Props { 
  tooltip: string;
}

defineProps<Props>();
</script>
