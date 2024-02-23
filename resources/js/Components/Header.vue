<template>
    <div class="bg-gray-800 text-white p-4 text-center">
        <h1 class="text-2xl">{{ title }}</h1>
    </div>
</template>

<script setup>
defineProps({
    title: {
        type: String,
        required: true,
    },
});
</script>
