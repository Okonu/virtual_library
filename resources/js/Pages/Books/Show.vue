<template>
    <div>
       <h1>{{ book.name }}</h1>
       <p>{{ book.ISBN }}</p>
       <p>{{ book.author.name }}</p>
    </div>
   </template>

   <script>
   export default {
    props: {
       book: Object
    }
   };
   </script>
