<template>
  <application-logo
    class="mx-auto mt-4"
    color="#000"
    :width="147"
    :height="45"
  />
  <div class="mt-40 flex flex-1 flex-col px-8">
    <component :is="errorIcon" />
    <h1 class="mt-9">
      {{ title }}
    </h1>
    <p class="mt-2">
      {{ description }}
    </p>
    <!--  eslint-disable-next-line -->
    <Link
      v-if="[404, 403].includes(status)"
      :href="$route('home')"
      class="btn-white mt-8 w-full"
    >
      На главную
    </Link>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import Icon503 from '@/shared/icon/Icon503.vue';
import Icon500 from '@/shared/icon/Icon500.vue';
import Icon404 from '@/shared/icon/Icon404.vue';
import Icon403 from '@/shared/icon/Icon403.vue';
import ApplicationLogo from '@/shared/icon/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

interface Props {
  status: number;
}

const props = defineProps<Props>();

const errorIcon = computed(() => {
  return {
    [503]: Icon503,
    [500]: Icon500,
    [404]: Icon404,
    [403]: Icon403,
  }[props.status];
});

const title = computed(() => {
  return {
    503: 'Сайт временно недоступен',
    500: 'Что-то пошло не так',
    404: 'Страница не найдена',
    403: 'Доступ ограничен',
  }[props.status];
});

const description = computed(() => {
  return {
    503: 'Извините, мы проводим техническое обслуживание. Пожалуйста, зайдите в ближайшее время',
    500: 'Попробуйте обновить страницу',
    404: 'Неправильно набран адрес или такой страницы на сайте больше не существует',
    403: 'Извините, вам запрещен доступ к этой странице',
  }[props.status];
});
</script>
