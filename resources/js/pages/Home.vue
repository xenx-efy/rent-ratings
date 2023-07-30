<template>
  <header
    class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg"
  >
    <application-logo />

    <h2 class="mb-4 ml-7 mt-4 text-white">
      Посмотри отзывы на
      <br>
      выбранную квартиру
    </h2>

    <div
      class="mx-4 flex items-center justify-between overflow-hidden rounded-[8px] bg-white pl-[14px]"
    >
      <search-icon />

      <input
        class="font-cloud-burst w-full border-0 px-4 py-[10px] text-black focus:ring-0"
        type="text"
        placeholder="Найди квартиру в Гродно"
      >
    </div>
  </header>

  <div class="relative -mt-7 flex flex-col">
    <img
      class="min-h-0"
      src="../../images/home/map.webp"
      alt="карта города Гродно"
    >
    <search-icon
      class="scale-y-1 absolute left-[-20px] top-[23%] scale-x-[-1] transform"
      color="#5786FF"
      width="182"
      height="182"
    />
    <div class="bg-white p-7 text-cloud-burst">
      <h2>Найди квартиру по адресу</h2>
      <p class="mt-3">
        Введи адрес дома, найди интересующую квартиру и посмотри отзывы на неё.
        Если отзывов нет, вы можете его создать 😉
      </p>
    </div>
  </div>

  <div class="relative flex flex-col">
    <img
      class="min-h-0"
      src="../../images/home/phone.webp"
      alt="телефон с открытой страницей заполнения отзыва"
    >
    <div class="bg-soft-blue p-7 text-white">
      <h2>Напиши анонимный отзыв о жилье</h2>
      <p class="mt-3 text-white">
        Найди квартиру по адресу и анонимно поделись своими впечатлениями
      </p>

      <a
        class="btn-link mt-6"
        href="#"
      >Оставить отзыв</a>
    </div>
  </div>

  <div class="flex flex-col">
    <h2 class="mx-auto my-8 block text-2xl">
      Для чего этот сайт?
    </h2>

    <div class="flex flex-col">
      <img
        class="min-h-0"
        src="../../images/home/wood-houses.webp"
        alt="карта города Гродно"
      >
      <div class="px-7 pb-8 pt-5">
        <h2>Поиск жилья</h2>
        <p class="mt-2">
          Определись с выбором аренды по отзывам
        </p>
      </div>
    </div>
    <div class="flex flex-col">
      <img
        class="min-h-0"
        src="../../images/home/cat.webp"
        alt="карта города Гродно"
      >
      <div class="bg-soft-blue px-7 pb-8 pt-5 text-white">
        <h2>Выражения мнений</h2>
        <p class="mt-2 text-white">
          Поделись впечатлениями
          <br>
          о проживании
        </p>
      </div>
    </div>
    <div class="flex flex-col">
      <img
        class="min-h-0"
        src="../../images/home/wall-with-paint.webp"
        alt="карта города Гродно"
      >
      <div class="px-7 pb-8 pt-5">
        <h2>Улучшения аренды</h2>
        <p class="mt-2">
          Улучши условия проживания на основе мнений
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import 'vue-dadata/dist/style.css';
import SearchIcon from '@/shared/icon/SearchIcon.vue';
import ApplicationLogo from '@/shared/ui/deprecated-ui/ApplicationLogo.vue';

export default {
  name: 'Home',
  components: {
    SearchIcon,
    ApplicationLogo
  }
};
</script>
