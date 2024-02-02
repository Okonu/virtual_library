<template>
    <div>
       <h1>Create New Author</h1>
       <form @submit.prevent="handleSubmit">
         <label for="name">Name:</label>
         <input id="name" v-model="author.name" required />

         <label for="gender">Gender:</label>
         <select id="gender" v-model="author.gender">
           <option value="male">Male</option>
           <option value="female">Female</option>
         </select>

         <label for="age">Age:</label>
         <input id="age" v-model="author.age" type="number" required />

         <label for="country">Country:</label>
         <input id="country" v-model="author.country" required />

         <label for="genre">Genre:</label>
         <select id="genre" v-model="author.genre_id">
        <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
        </select>
         <button type="submit">Create Author</button>
       </form>
    </div>
   </template>

   <script>
   export default {
    props: {
       genres: Array
    },
    data() {
       return {
         author: {
           name: '',
           gender: '',
           age: null,
           country: '',
           genre_id: null
         }
       };
    },
    methods: {
       async handleSubmit() {
         const response = await this.$inertia.post('/authors', this.author);
         if (!response.errors) {
           this.$inertia.visit('/authors');
         }
       }
    }
   };
   </script>
