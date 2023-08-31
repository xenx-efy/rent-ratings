<template>
  <!-- Success modal -->
  <div
    v-if="openState"
    class="fixed inset-x-0 top-0 z-30 h-[calc(100%)] max-h-full overflow-y-auto overflow-x-hidden bg-black/40 p-4"
    @click.self="closeModal"
  >
    <div class="relative left-1/2 top-1/2 z-50 max-h-full w-56 -translate-x-1/2 -translate-y-1/2">
      <!-- Modal content -->
      <div class="relative rounded-3xl bg-white opacity-100 shadow">
        <!-- Modal header -->
        <div class="flex items-start justify-between rounded-t px-4 pt-4">
          <button
            type="button"
            class="ml-auto inline-flex h-4 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-soft-blue hover:bg-gray-200 hover:text-gray-900"
            @click.stop="closeModal"
          >
            <svg
              class="h-3 w-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="px-8 py-6">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="60"
            height="45"
            viewBox="0 0 60 45"
            fill="none"
            class="mx-auto"
          >
            <path
              d="M18.8066 35.7L6.55656 23.45C5.19156 22.085 3.02156 22.085 1.65656 23.45C0.291563 24.815 0.291563 26.985 1.65656 28.35L16.3216 43.015C17.6866 44.38 19.8916 44.38 21.2566 43.015L58.3566 5.94999C59.7216 4.58499 59.7216 2.41499 58.3566 1.04999C56.9916 -0.315005 54.8216 -0.315005 53.4566 1.04999L18.8066 35.7Z"
              fill="#5786FF"
            />
          </svg>
          <p class="mt-7 text-center text-base">
            Ваш отзыв успешно опубликован!
          </p>

          <!--          <inertia-link-->
          <!--            class="btn-white mx-auto mt-5"-->
          <!--            href="/"-->
          <!--          >-->
          <!--            На главную-->
          <!--          </inertia-link>-->
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';

interface Props {
  opened: boolean;
}

const props = withDefaults(defineProps<Props>(), { opened: false });

const openState = ref(false);

onMounted(() => {
  openState.value = props.opened;
});

const closeModal = () => {
  openState.value = false;
};
</script>
