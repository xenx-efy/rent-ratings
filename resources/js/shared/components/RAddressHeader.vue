<template>
  <header
    class="relative z-20 flex flex-col rounded-b-[24px] pb-4 drop-shadow-lg"
    :class="headerClass"
  >
    <application-logo :color="logoColor[theme]" />

    <div class="flex justify-between px-5 pt-5">
      <button @click="goBack">
        <arrow-icon color="#B8E5FF" />
      </button>

      <h2
        class="px-4 text-center"
        :class="headerTextClass"
      >
        {{ address }}
      </h2>

      <!-- div нужен для justify-between. Если его убрать то текст будет не по центру-->
      <div>
        <search-icon
          v-if="enableSearch"
          color="#D8E5FF"
        />
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import ArrowIcon from '@/shared/icon/ArrowIcon.vue';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';
import { AddressHeaderTheme } from '@/types/enums';
import { computed, defineProps, withDefaults } from 'vue';
import { router } from '@inertiajs/vue3';

interface Props {
  address: string;
  enableSearch?: boolean;
  theme?: AddressHeaderTheme;
}

const props = withDefaults(defineProps<Props>(), {
  address: '',
  enableSearch: true,
  theme: AddressHeaderTheme.Blue,
});

const logoColor = computed(() => {
  return {
    [AddressHeaderTheme.Blue]: '#FFF',
    [AddressHeaderTheme.Light]: '#252D4F',
  };
});

const headerClass = computed(() => {
  return {
    'bg-soft-blue': props.theme === AddressHeaderTheme.Blue,
    'bg-white': props.theme === AddressHeaderTheme.Light,
  };
});

const headerTextClass = computed(() => {
  return {
    'text-base': props.address.length > 25,
    'text-white': props.theme === AddressHeaderTheme.Blue,
    'cloud-burst': props.theme === AddressHeaderTheme.Light,
  };
});

const goBack = () => {
  // Check sessionStorage
  if (!sessionStorage.getItem('prev')) {
    // This page was navigated off-site
    router.visit('/');
  } else {
    window.history.back();
  }
};
</script>
