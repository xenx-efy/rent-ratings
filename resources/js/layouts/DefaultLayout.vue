<template>
  <inertia-head>
    <title>Сервис отзывов на арендное жильё</title>
    <!--Yandex verification for webmaster site-->
    <meta
      name="yandex-verification"
      content="e60bb5be6c0900d9"
    />
  </inertia-head>

  <main class="flex min-h-screen flex-col justify-between">
    <template v-if="showShimmer">
      <r-desktop-shimmer />
    </template>
    <template v-else>
      <slot />
    </template>
    <Footer />
    <r-modal />
    <r-scroll-to-top />
  </main>
</template>

<script setup>
import Footer from '@/shared/components/RFooter.vue';
import RModal from '@/components/RModal.vue';
import RScrollToTop from '@/shared/ui/RScrollToTop.vue';
import { onBeforeUnmount, onMounted, ref } from 'vue';
import RDesktopShimmer from '@/components/RDesktopShimmer.vue';

const showShimmer = ref(false);

const checkShimmer = (win) => {
  // TODO: Make enum for environments. Should be 3: local, staging and production.
  const isProduction = import.meta.env.VITE_APP_ENV === 'production';

  // Show shimmer when it is prod environment and windows size more than 768 px
  showShimmer.value = isProduction && win.innerWidth > 768;
};

onMounted(() => {
  window.addEventListener('resize', (e) => checkShimmer(e.target));
  checkShimmer(window);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', (e) => checkShimmer(e.target));
});
</script>
