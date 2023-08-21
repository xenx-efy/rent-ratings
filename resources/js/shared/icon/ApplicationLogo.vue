<template>
  <!--  eslint-disable-next-line -->
  <Link
    :href="$route('home')"
    :class="{ 'pointer-events-none': $page.component === 'Home' }"
  >
    <logo-icon
      :color="color"
      :width="width"
      :height="height"
    />
  </Link>
</template>
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import LogoIcon from '@/shared/icon/LogoIcon.vue';

import { defineProps, withDefaults } from 'vue';

interface Props {
  color?: string;
  width?: number | string;
  height?: number | string;
}

withDefaults(defineProps<Props>(), {
  color: '#fff',
  width: 113,
  height: 34,
});
</script>
