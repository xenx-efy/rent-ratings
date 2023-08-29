<template>
  <!--  eslint-disable-next-line -->
  <Link
    :href="$route('home')"
    :class="{ 'pointer-events-none': $page.component === 'Home' }"
  >
    <logo-icon
      :class="color"
      :width="width"
      :height="height"
    />
  </Link>
</template>
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
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
