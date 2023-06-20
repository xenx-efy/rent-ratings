<script setup>
import Footer from "@/Shared/Footer.vue";
</script>

<template>
    <main class="min-h-screen flex flex-col">
        <slot/>
        <Footer/>
    </main>
</template>
