<template>
  <Transition>
    <button
      v-show="showButton"
      class="btn-blue fixed bottom-4 right-4 flex size-14 items-center justify-center rounded-full bg-blue-400 shadow-custom"
      @click="scrollToTop"
    >
      <arrow2-icon />
    </button>
  </Transition>
</template>

<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue';
import Arrow2Icon from '@/shared/icon/Arrow2Icon.vue';

const showButton = ref(false);

const checkScrollPosition = () => {
  const scrollPosition = window.scrollY || document.documentElement.scrollTop;
  showButton.value = scrollPosition > 150;
};

const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
};

onMounted(() => {
  window.addEventListener('scroll', checkScrollPosition);
});

onBeforeUnmount(() => {
  window.removeEventListener('scroll', checkScrollPosition);
});
</script>
