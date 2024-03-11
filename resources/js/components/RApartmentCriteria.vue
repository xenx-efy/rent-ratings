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
      v-model="model"
      class="mt-0.5 items-start"
      :can-select="true"
    />
  </div>
</template>

<script setup lang="ts">
import RRating from '@/shared/ui/RRating.vue';
import RTooltip from '@/shared/ui/RTooltip.vue';

interface Props {
  title: string;
  tooltip?: string;
}

withDefaults(defineProps<Props>(), {
  title: '',
  tooltip: '',
});

const model = defineModel<number>()
</script>
