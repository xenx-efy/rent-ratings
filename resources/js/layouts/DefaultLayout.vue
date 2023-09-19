<template>
  <main class="flex min-h-screen flex-col justify-between">
    <template v-if="showShimmer">
      <slot />
    </template>
    <template v-else>
      <r-desktop-shimmer />
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
  showShimmer.value = win.innerWidth < 768;
};

onMounted(() => {
  window.addEventListener('resize', (e) => checkShimmer(e.target));
  checkShimmer(window);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', (e) => checkShimmer(e.target));
});
</script>
