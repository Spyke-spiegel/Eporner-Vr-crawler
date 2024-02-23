<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-black bg-center bg-gray-100 selection:bg-red-500 selection:text-white"
    >
        <div>
            <Header :title="'Eporner VR search engine'" />
            <TextInput
                type="text"
                :placeholder="'Copy a pornstar profile URL'"
            />
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Header from "@/Components/Header.vue";
import TextInput from "@/Components/TextInput.vue";
</script>
