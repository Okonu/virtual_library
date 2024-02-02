<template>
    <div>
        <h1>books</h1>
        <ul>
            <li v-for="book in books" :key="book.id" v-memo="[book]">
                {{ book.name }} - {{ book.ISBN }} - {{ book.author.name }}
                <button @click="$inertia.get(`/books/${book.id}/edit`)" class="btn btn-primary ml-3">Edit</button>
                <button @click="$inertia.get(`/books/${book.id}`)" class="btn btn-primary ml-3">Show</button>
                <button @click="destroy(book.id)" class="btn btn-danger ml-3">Delete</button>
            </li>
        </ul>
        <button @click="$inertia.get(`/books/create`)" class="btn btn-success">Add New Book</button>
    </div>
</template>

<script>
export default {
    props: {
        books: Array,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure you want to delete this book?')) {
                this.$inertia.delete(`/books/${id}`);
            }
        },
    },
};
</script>
