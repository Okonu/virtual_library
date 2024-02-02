<template>
    <div>
        <h1>Edit Book</h1>
        <form @submit.prevent="update">
            <label for="name">Name:</label>
            <input id="name" v-model="form.name" required />

            <label for="ISBN">ISBN:</label>
            <input id="ISBN" v-model="form.ISBN" required />

            <select v-model="form.author_id">
               <option v-for="author in authors" :key="author.id" :value="author.id">
                 {{ author.name }}
               </option>
            </select>

            <button type="submit">Update Book</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        book: Object,
        authors: Array,
    },
    data() {
        return {
            form: {
                name: this.book.name,
                ISBN: this.book.ISBN,
                author_id: this.book.author_id,
            }
        };
    },
    methods: {
        update() {
            this.$inertia.put(`/books/${this.book.id}`, this.form);
        },
    },
};
</script>
