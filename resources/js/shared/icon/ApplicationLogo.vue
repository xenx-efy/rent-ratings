<template>
  <inertia-link
    href="/"
    :class="{ 'pointer-events-none': $page.component === 'Home' }"
  >
    <logo-icon
      :color="color"
      :width="width"
      :height="height"
    />
  </inertia-link>
</template>
<script setup lang="ts">
import LogoIcon from '@/shared/icon/LogoIcon.vue';

interface Props {
  color?: string;
  width?: number | string;
  height?: number | string;
}

withDefaults(defineProps<Props>(), {
  color: 'fill-white',
  width: 113,
  height: 34,
});
</script>
