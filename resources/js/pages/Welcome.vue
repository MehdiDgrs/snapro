<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const pickedPicture = ref(null);

async function sendFile(files) {
  console.log(files);

  if (!files) {
    return;
  }

  const url = "http://localhost:8000/api/crop";
  
  const formData = new FormData();

  formData.append('file', files[0]);

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData,
    });


    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const result = await response.json();
    console.log(result);
  } catch (error) {
    console.error(error.message);
  }
} 

</script>

<template>
  <div> 
    <form action="/api/crop" method="post">
      <label for="file">Take your pics bg</label>
      <input @change="(e) => sendFile(e.target?.files)" id="file" name="file" type="file" accept="image/*" capture="camera">
    </form>
  </div>  
</template>
