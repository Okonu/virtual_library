<template>
    <div>
        <h2 class="text-lg font-medium text-gray-900">Book Genres</h2>
        <ul class="list-disc list-inside">
            <li v-for="genre in genres" :key="genre.id" class="mb-4">
                {{ genre.name }}
                <button @click="$inertia.get(`/genres/${genre.id}/edit`)" class="btn btn-primary ml-3">Edit</button>
                <button @click="$inertia.get(`/genres/${genre.id}`)" class="btn btn-primary ml-3">Show</button>
                <button @click="destroy(genre.id)" class="btn btn-danger ml-3">Delete</button>
            </li>
        </ul>
        <button @click="$inertia.get(`/genres/create`)" class="btn btn-success">Add New Genre</button>
    </div>
</template>

<script>
export default {
    props: {
        genres: Array,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure you want to delete this genre?')) {
                this.$inertia.delete(`/genres/${id}`);
            }
        },
    },
}
</script>
