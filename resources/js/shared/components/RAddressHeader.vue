<template>
  <header
    class="relative z-20 flex flex-col rounded-b-[24px] pb-4 drop-shadow-lg"
    :class="headerClass"
  >
    <application-logo
      class="mx-auto mt-2 block"
      :color="logoColor[theme]"
    />

    <div class="flex justify-between px-5 pt-5">
      <button @click="goBack">
        <arrow-icon color="fill-slate-200" />
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
          color="fill-slate-200"
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
import { router } from '@inertiajs/vue3';

interface Props {
  address: string;
  enableSearch?: boolean;
  theme?: AddressHeaderTheme;
  backUrl?: string;
}

const props = withDefaults(defineProps<Props>(), {
  address: '',
  enableSearch: false,
  theme: AddressHeaderTheme.Blue,
  backUrl: '',
});

const logoColor = {
  [AddressHeaderTheme.Blue]: 'fill-white',
  [AddressHeaderTheme.Light]: 'fill-blue-950',
}

const headerClass = {
  'bg-blue-400': props.theme === AddressHeaderTheme.Blue,
  'bg-white': props.theme === AddressHeaderTheme.Light,
}

const headerTextClass = {
  'text-base': props.address.length > 25,
  'text-white': props.theme === AddressHeaderTheme.Blue,
  'blue-950': props.theme === AddressHeaderTheme.Light,
}

const goBack = () => {
  if (props.backUrl) {
    return router.visit(props.backUrl);
  }

  // Check sessionStorage
  if (!sessionStorage.getItem('prev')) {
    // This page was navigated off-site
    router.visit('/');
  } else {
    window.history.back();
  }
};
</script>
