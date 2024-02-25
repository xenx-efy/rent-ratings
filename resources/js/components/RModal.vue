<template>
  <!-- Success modal -->
  <div
    v-if="openState"
    class="fixed inset-x-0 top-0 z-30 h-[calc(100%)] max-h-full overflow-y-auto overflow-x-hidden"
  >
    <!--  Background  -->
    <div
      class="fixed size-full bg-black/40 backdrop-blur"
      @click="closeModal"
    />

    <div class="relative left-1/2 top-1/2 z-50 max-h-full w-56 -translate-x-1/2 -translate-y-1/2">
      <!-- Modal content -->
      <div class="relative rounded-3xl bg-white opacity-100 shadow">
        <!-- Modal header -->
        <div class="flex items-start justify-between rounded-t px-4 pt-4">
          <button
            type="button"
            class="ml-auto inline-flex size-4 items-center justify-center rounded-lg bg-transparent text-sm text-blue-400 hover:bg-gray-200 hover:text-gray-900"
            @click.stop="closeModal"
          >
            <close-icon class="size-3" />
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="px-8 py-6">
          <success-icon class="mx-auto" />
          <p class="mt-7 text-center text-base">
            Ваш отзыв успешно опубликован!
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useBus } from '@/utils/emitter';
import { useModal } from '@/hooks/useModal';
import CloseIcon from '@/shared/icon/CloseIcon.vue';
import SuccessIcon from '@/shared/icon/SuccessIcon.vue';

const openState = ref(false);

const { emitter } = useBus();
const { closeModal } = useModal();

emitter.on('open-modal', () => (openState.value = true));
emitter.on('close-modal', () => (openState.value = false));
</script>
