<template>
    <div>
        <h1>Edit Author</h1>
        <form @submit.prevent="update">
            <input v-model="form.name" type="text" placeholder="Name">
            <input v-model="form.gender" type="text" placeholder="Gender">
            <input v-model="form.age" type="text" placeholder="Age">
            <input v-model="form.country" type="text" placeholder="Country">
            <select v-model="form.genre_id">
                <option v-for="genre in genres" :value="genre.id" :key="genre.id">
                    {{ genre.name }}
                </option>
            </select>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        author: Object,
        genres: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                ...this.author,
            }),
        };
    },
    methods: {
        update() {
            this.form.put(`/authors/${this.author.id}`);
        }
    }
}
</script>
