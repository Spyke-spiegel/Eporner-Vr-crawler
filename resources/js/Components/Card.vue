<template>
    <div class="card">
        <h2>{{ video.title }}</h2>
        <img :src="video.image" :alt="video.title" />
        <p>Qualité: {{ video.quality }}</p>
        <p>Durée: {{ video.duration }}</p>
        <a target="_blank" :href="`https://www.eporner.com${video.link}`"
            >Lien vers la vidéo</a
        >
    </div>
</template>

<script setup>
const props = defineProps({
    video: {
        type: Object,
        required: true,
    },
});
</script>

<style scoped>
.card {
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    color: white;
}

.card img {
    max-width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}

.card a {
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
    color: blue;
}

.card a:hover {
    text-decoration: underline;
}
</style>
