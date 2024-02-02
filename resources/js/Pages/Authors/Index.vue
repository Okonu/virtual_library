<template>
    <div>
        <h1>Authors</h1>
        <ul>
            <li v-for="author in authors" :key="author.id" v-memo="[author]">
                {{ author.name }} - {{ author.gender }} - {{ author.age }} - {{ author.country }} - {{ author.genre.name }}
                <button @click="$inertia.get(`/authors/${author.id}/edit`)" class="btn btn-primary ml-3">Edit</button>
                <button @click="$inertia.get(`/authors/${author.id}`)" class="btn btn-primary ml-3">Show</button>
                <button @click="destroy(author.id)" class="btn btn-danger ml-3">Delete</button>
            </li>
        </ul>
        <button @click="$inertia.get(`/authors/create`)" class="btn btn-success">Add New author</button>
    </div>
</template>

<script>
export default {
    props: {
        authors: Array,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure you want to delete this author?')) {
                this.$inertia.delete(`/authors/${id}`);
            }
        },
    },
};
</script>
