<template>
  <div class="mx-auto flex w-3/4 justify-around space-x-1">
    <div
      v-for="currentStep in stepsLength"
      :key="currentStep"
      class="h-1 w-3/4"
      :class="[
        currentClass(currentStep - 1),
        { 'rounded-l-full': currentStep === 1, 'rounded-r-full': currentStep === stepsLength },
      ]"
    />
  </div>
</template>

<script setup lang="ts">
interface Props {
  // Хрен знает чего ругается на enum, по этому принимает ток number
  step: any;
  stepsLength: number;
}

const props = defineProps<Props>();

const currentClass = (currentStep: number) => {
  return props.step >= currentStep ? 'bg-blue-400' : 'bg-slate-200';
};
</script>
