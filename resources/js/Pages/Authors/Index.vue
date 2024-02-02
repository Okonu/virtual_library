<template>
    <div>
        <h1>Authors</h1>
        <ul>
            <li v-for="author in authors" :key="author.id">
                {{ author.name }} - {{ author.gender }} - {{ author.age }} - {{ author.country }} - {{ author.genre.name }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        authors: Array,
    }
}
</script>
