<template>
    <div>
        <h1>Edit Author</h1>
        <form @submit.prevent="update">
            <label for="name">Name:</label>
            <input id="name" v-model="form.name" required />

            <label for="gender">Gender:</label>
            <select id="gender" v-model="form.gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="age">Age:</label>
            <input id="age" v-model="form.age" type="number" required />

            <label for="country">Country:</label>
            <input id="country" v-model="form.country" required />

            <label for="genre">Genre:</label>
            <select id="genre" v-model="form.genre_id">
                <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
            </select>
            <button type="submit">Edit</button>
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
            form: {
                name: this.author.name,
                gender: this.author.gender,
                age: this.author.age,
                country: this.author.country,
                genre_id: this.author.genre_id,
            }
        };
    },
    methods: {
        update() {
            this.$inertia.put(`/authors/${this.author.id}`, this.form);
        },
    },
};
</script>
