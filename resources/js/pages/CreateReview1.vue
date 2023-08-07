<template>
  <address-header
    :address="'Ул. Гая, 3, кв. 87'"
    :enable-search="false"
    :theme="'Light'"
  />

  <div class="mx-auto mt-4 flex w-3/4 justify-around space-x-1">
    <div class="h-1 w-3/4 rounded-l-full bg-soft-blue" />
    <div class="h-1 w-3/4 bg-link-water" />
    <div class="h-1 w-3/4 rounded-r-full bg-link-water" />
  </div>
  <p
    class="mx-auto mt-4 max-w-[220px] text-center text-2xl font-medium leading-normal"
  >
    Информация о квартире
  </p>

  <div class="mx-4">
    <input-label required>
      Этаж
    </input-label>
    <text-input />

    <input-label required>
      Количество комнат
    </input-label>
    <text-input />

    <div class="flex justify-between">
      <button class="mt-4 ml-auto w-32 btn-primary">
        Далее
      </button>
    </div>
  </div>
</template>
<script setup lang="ts">
import AddressHeader from "@/shared/components/AddressHeader.vue";
import InputLabel from "@/components/InputLabel.vue";
import TextInput from "@/components/TextInput.vue";
</script>
