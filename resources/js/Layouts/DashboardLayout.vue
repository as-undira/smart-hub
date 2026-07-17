<script setup>
import Sidebar from '@/Components/Sidebar.vue'
</script>

<template>
    <div class="flex bg-gray-50">
        <Sidebar />

        <main class="flex-1 p-8">
            <slot />
        </main>
    </div>
</template>