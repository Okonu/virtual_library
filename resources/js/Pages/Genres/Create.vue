<template>
    <div>
        <form @submit.prevent="store">
            <input v-model="form.name" type="text" placeholder="Genre Name">
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                name: ''
            })
        };
    },
    methods: {
        store() {
            this.form.post('/genres');
        }
    }
}
</script>
