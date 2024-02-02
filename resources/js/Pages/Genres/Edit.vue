<template>
    <div>
        <form @submit.prevent="update">
            <input v-model="form.name" type="text" placeholder="Genre Name">
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        genre: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.genre.name
            })
        };
    },
    methods: {
        update() {
            this.form.put(`/genres/${this.genre.id}`);
        }
    }
}
</script>
