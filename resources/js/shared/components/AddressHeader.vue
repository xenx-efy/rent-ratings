<template>
  <header class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg">
    <application-logo />

    <div class="flex justify-between px-5 pt-5">
      <button @click="goBack">
        <arrow-icon color="#D8E5FF" />
      </button>

      <h2
        class="px-4 text-center text-white"
        :class="{ 'text-base': address.length > 10 }"
      >
        {{ address }}
      </h2>

      <search-icon color="#D8E5FF" />
    </div>
  </header>
</template>

<script setup lang="ts">
import ArrowIcon from '@/shared/icon/ArrowIcon.vue';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';
import { defineProps } from 'vue';

interface Props {
  address: string;
}

defineProps<Props>();

const goBack = () => {
  // Check sessionStorage
  if (!sessionStorage.getItem('prev')) {
    // This page was navigated off-site
    this.$inertia.visit(this.href);
  } else {
    window.history.back();
  }
};
</script>

<style scoped></style>
