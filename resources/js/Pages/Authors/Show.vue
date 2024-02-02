<template>
    <div>
        <h1>{{ author.name }}</h1>
        <p>Gender: {{ author.gender }}</p>
        <p>Age: {{ author.gender }}</p>
        <p>Country: {{ author.gender }}</p>
        <p>Genre: {{ author.gender }}</p>
    </div>
</template>

<script>
export default {
    props: {
        author: Object,
    },
};
</script>
