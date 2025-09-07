<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';

async function getData() {
  return;
  const url = "http://localhost:8000/api/crop";
  try {
    const response = await fetch(url);
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
    <input @click="getData" type="file" accept="image/*" capture="camera">
  </div>
</template>
