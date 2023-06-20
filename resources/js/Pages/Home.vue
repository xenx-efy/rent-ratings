<template>
    <header
        class="relative z-20 flex w-screen flex-col rounded-b-[24px] bg-soft-blue pb-4 drop-shadow-lg">
        <ApplicationLogo/>

        <h2 class="mb-4 ml-7 mt-4 text-white">
            Посмотри отзывы на<br/>
            выбранную квартиру
        </h2>

        <div
            class="flex mx-4 items-center justify-between rounded-[8px] overflow-hidden bg-white pl-[14px]">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 18 18"
                fill="none">
                <path
                    d="M12.4999 11H11.7099L11.4299 10.73C12.6299 9.33002 13.2499 7.42002 12.9099 5.39002C12.4399 2.61002 10.1199 0.390015 7.31989 0.0500152C3.08989 -0.469985 -0.470107 3.09001 0.0498932 7.32001C0.389893 10.12 2.60989 12.44 5.38989 12.91C7.41989 13.25 9.32989 12.63 10.7299 11.43L10.9999 11.71V12.5L15.2499 16.75C15.6599 17.16 16.3299 17.16 16.7399 16.75C17.1499 16.34 17.1499 15.67 16.7399 15.26L12.4999 11ZM6.49989 11C4.00989 11 1.99989 8.99002 1.99989 6.50002C1.99989 4.01002 4.00989 2.00002 6.49989 2.00002C8.98989 2.00002 10.9999 4.01002 10.9999 6.50002C10.9999 8.99002 8.98989 11 6.49989 11Z"
                    fill="#4895AD"/>
            </svg>

            <input
                class="font-cloud-burst w-full border-0 px-4 py-[10px] text-black focus:ring-0 "
                type="text"
                placeholder="Найди квартиру в Гродно"/>
        </div>

        <!--        <vue-dadata v-model="query" :token="token" :classes="{container: 'text-black', input: 'text-black'}"-->
        <!--                    :locationOptions="locationOptions"/>-->
    </header>

    <div class="relative flex flex-col -mt-7">
        <img class="min-h-0" src="../../images/home/map.webp" alt="карта города Гродно">
        <svg class="absolute top-[23%] left-[-20px]" xmlns="http://www.w3.org/2000/svg" width="182" height="182"
             viewBox="0 0 182 182" fill="none">
            <path
                d="M48.5067 117.34H56.9333L59.92 114.46C47.12 99.5267 40.5067 79.1533 44.1333 57.5C49.1467 27.8467 73.8933 4.16667 103.76 0.540006C148.88 -5.00666 186.853 32.9667 181.307 78.0867C177.68 107.953 154 132.7 124.347 137.713C102.693 141.34 82.32 134.727 67.3867 121.927L64.5067 124.913V133.34L19.1733 178.673C14.8 183.047 7.65334 183.047 3.28 178.673C-1.09333 174.3 -1.09333 167.153 3.28 162.78L48.5067 117.34ZM112.507 117.34C139.067 117.34 160.507 95.9 160.507 69.34C160.507 42.78 139.067 21.34 112.507 21.34C85.9467 21.34 64.5067 42.78 64.5067 69.34C64.5067 95.9 85.9467 117.34 112.507 117.34Z"
                fill="#5786FF"/>
        </svg>
        <div class="bg-white p-7 text-cloud-burst">
            <h2>Найди квартиру по адресу</h2>
            <p class="mt-3">Введи адрес дома, найди интересующую квартиру и посмотри отзывы на неё. Если отзывов
                нет, вы
                можете его создать 😉</p>
        </div>
    </div>

    <div class="relative flex flex-col">
        <img class="min-h-0" src="../../images/home/phone.webp"
             alt="телефон с открытой страницей заполнения отзыва">
        <div class="bg-soft-blue p-7 text-white">
            <h2>Напиши анонимный отзыв о жилье</h2>
            <p class="mt-3 text-white">Найди квартиру по адресу и анонимно поделись своими впечатлениями</p>

            <!-- Button -->
            <a class="btn-link mt-6" href="#">Оставить отзыв</a>
        </div>
    </div>

    <div class="flex flex-col">
        <h2 class="block mx-auto text-2xl my-8">Для чего этот сайт?</h2>

        <div class="flex flex-col">
            <img class="min-h-0" src="../../images/home/wood-houses.webp" alt="карта города Гродно">
            <div class="px-7 pt-5 pb-8">
                <h2>Поиск жилья</h2>
                <p class="mt-2">Определись с выбором аренды по отзывам</p>
            </div>
        </div>
        <div class="flex flex-col">
            <img class="min-h-0" src="../../images/home/cat.webp" alt="карта города Гродно">
            <div class="px-7 pt-5 pb-8 bg-soft-blue text-white">
                <h2>Выражения мнений</h2>
                <p class="mt-2 text-white">Поделись впечатлениями<br> о проживании</p>
            </div>
        </div>
        <div class="flex flex-col">
            <img class="min-h-0" src="../../images/home/wall-with-paint.webp" alt="карта города Гродно">
            <div class="px-7 pt-5 pb-8">
                <h2>Улучшения аренды</h2>
                <p class="mt-2">Улучши условия проживания на основе мнений</p>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent, ref} from 'vue';
import Layout from "@/Layouts/Layout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {VueDadata} from 'vue-dadata';
import 'vue-dadata/dist/style.css';

export default {
    name: 'Home',
    layout: Layout,
    components: {
        VueDadata,
        Layout,
        ApplicationLogo
    },
    setup() {
        const query = ref('');

        return {
            token: import.meta.env.VITE_APP_DADATA_API_KEY,
            locationOptions:
                {
                    country: "Беларусь",
                },
            query,

        };
    },
}
</script>

<style scoped></style>
