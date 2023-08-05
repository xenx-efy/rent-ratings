<template>
  <!--  eslint-disable-next-line -->
  <Link
    class="mx-auto mt-2 block"
    :href="$route('home')"
    :class="{ 'pointer-events-none': $page.component === 'Home' }"
  >
    <logo-icon :color="color" />
  </Link>
</template>
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import LogoIcon from '@/shared/icon/LogoIcon.vue';

import { defineProps, withDefaults } from 'vue';

interface Props {
  color?: string;
}

withDefaults(defineProps<Props>(), {
  color: '#fff',
});
</script>
