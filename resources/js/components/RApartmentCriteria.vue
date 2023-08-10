<template>
  <div class="flex justify-between pb-4">
    <div class="flex space-x-2">
      <p>{{ title }}</p>

      <button
        class="group relative inline-block"
      >
        <question-mark-icon />
        <span
          class="absolute hidden group-hover:flex left-1/2 -translate-x-1/2 -top-2 -translate-y-full px-2
           py-1 bg-[#252D4F] rounded-lg text-center text-white text-sm after:content-[''] after:absolute
           after:left-1/2 after:top-[100%] after:-translate-x-1/2 after:border-8 after:border-x-transparent
           after:border-b-transparent after:border-t-[#252D4F] after:-mt-px whitespace-nowrap"
        >{{ tooltipText }}</span>
      </button>
    </div>

    <r-rating
      :can-select="true"
      :rating="rating"
      @click="changeRating"
    />
  </div>
</template>

<script setup lang="ts">
import QuestionMarkIcon from '@/shared/icon/QuestionMarkIcon.vue'
import RRating from '@/components/RRating.vue'
import {defineEmits, defineProps, withDefaults} from "vue";

interface Props {
  title: string,
  rating: number,
  tooltipText: string
}

withDefaults(defineProps<Props>(), {
  title: '',
  rating: 0,
  tooltipText: ''
})

const emits = defineEmits(['changeRating'])

// Прокидывание рейтинга в родительский компонент
const changeRating = (rating: number) => {
  emits('changeRating', rating);
};
</script>
