<template>
    <div>
       <h1>Create New Book</h1>
       <form @submit.prevent="handleSubmit">
         <label for="name">Name:</label>
         <input id="name" v-model="book.name" required />

         <label for="ISBN">ISBN:</label>
         <input id="ISBN" v-model="book.ISBN" required />

         <label for="author">Author:</label>
         <select id="author" v-model="book.author_id">

        <option v-for="author in authors" :key="author.id" :value="author.id">{{ author.name }}</option>
        </select>
         <button type="submit">Create book</button>
       </form>
    </div>
   </template>

   <script>
   export default {
    props: {
       authors: Array
    },
    data() {
       return {
         book: {
           name: '',
           ISBN: '',
           author_id: null
         }
       };
    },
    methods: {
       async handleSubmit() {
         const response = await this.$inertia.post('/books', this.book);
         if (!response.errors) {
           this.$inertia.visit('/books');
         }
       }
    }
   };
   </script>
