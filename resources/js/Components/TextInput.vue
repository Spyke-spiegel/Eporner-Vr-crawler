<template>
    <form @submit.prevent class="flex flex-col justify-center items-center">
        <input v-model="link" type="text" :placeholder="placeholder" />
        <button
            class="bg-red-500 text-bold w-[50%] rounded-md m-2"
            @click="onSubmit"
        >
            Submit
        </button>
    </form>
</template>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const link = ref("");

const onSubmit = () => {
    router.get("/videos", { link: link.value });
};

defineProps({
    placeholder: {
        type: String,
        required: true,
    },
});
</script>
