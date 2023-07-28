<template>
  <!--  eslint-disable-next-line -->
  <Link
    class="mx-auto mt-2 block"
    :href="$route('home')"
    :class="{ 'pointer-events-none': $page.component === 'Home' }"
  >
    <logo-icon />
  </Link>
</template>
<script>
import { Link } from '@inertiajs/vue3';
import LogoIcon from '@/shared/icon/LogoIcon.vue';

export default {
  components: {
    LogoIcon,
    Link
  }
};
</script>
