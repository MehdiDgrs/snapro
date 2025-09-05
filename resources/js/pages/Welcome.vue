<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';

const handleClick = () => {console.log('test')};


</script>

<template>
  <div>
    <input @click.prevent="handleClick" type="file" accept="image/*" capture="camera">
  </div>
</template>
