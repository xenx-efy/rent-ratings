<template>
  <div class="flex justify-between py-4">
    <div class="flex space-x-2">
      <p :class="{ 'w-min': title.length > 15 }">
        {{ title }}
      </p>

      <template v-if="tooltip">
        <r-tooltip :tooltip="tooltip" />
      </template>
    </div>

    <r-rating
      v-model="rating"
      class="mt-0.5 items-start"
      :can-select="true"
    />
  </div>
</template>

<script setup lang="ts">
import RRating from '@/shared/ui/RRating.vue';
import { computed } from 'vue';
import RTooltip from '@/shared/ui/RTooltip.vue';

interface Props {
  modelValue: number;
  title: string;
  tooltip?: string;
}

const props = withDefaults(defineProps<Props>(), {
  modelValue: 0,
  title: '',
  tooltip: '',
});

const emits = defineEmits(['update:modelValue']);

const rating = computed({
  get() {
    return props.modelValue;
  },
  set(value: number) {
    emits('update:modelValue', value);
  },
});
</script>
