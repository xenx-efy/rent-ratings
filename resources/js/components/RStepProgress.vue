<template>
  <div class="mx-auto mt-4 flex w-3/4 justify-around space-x-1">
    <div
      class="h-1 w-3/4 rounded-l-full"
      :class="[step === 1 ? 'bg-soft-blue' : 'bg-link-water']"
    />
    <div
      class="h-1 w-3/4"
      :class="[step === 2 ? 'bg-soft-blue' : 'bg-link-water']"
    />
    <div
      class="h-1 w-3/4 rounded-r-full"
      :class="[step === 3 ? 'bg-soft-blue' : 'bg-link-water']"
    />
  </div>
</template>

<script setup lang="ts">
interface Props {
  step: 1 | 2 | 3;
}

withDefaults(defineProps<Props>(), {
  step: 1,
});
</script>
