<template>
  <textarea
    class="ring-px w-full rounded-lg border border-silver-chalice px-4 py-2.5 ring-soft-blue placeholder:text-silver-chalice"
    :placeholder="placeholder"
  />
</template>

<script setup lang="ts">
interface Props {
  placeholder: string;
}

withDefaults(defineProps<Props>(), {
  placeholder: '',
});
</script>
