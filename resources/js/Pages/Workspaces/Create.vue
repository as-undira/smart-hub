<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const form = useForm({
    code: '',
    name: '',
    description: '',
    capacity: 1,
    location: '',
    max_duration_hours: 8,
    status: 'available',
})

const submit = () => {
    form.post(route('workspaces.store'))
}
</script>

<template>
<div>
    <div class="flex justify-between mb-6">
        <h1 class="text-3xl font-bold">
            Add Workspace
        </h1>

        <Link
            :href="route('workspaces.index')"
            class="border px-4 py-2 rounded-lg"
        >
            Back
        </Link>
    </div>

    <form
        @submit.prevent="submit"
        class="border rounded-xl p-6 space-y-4"
    >
        <input v-model="form.code" placeholder="Code" class="w-full border p-3 rounded-lg">
        <input v-model="form.name" placeholder="Name" class="w-full border p-3 rounded-lg">
        <textarea v-model="form.description" placeholder="Description" class="w-full border p-3 rounded-lg"/>
        <input v-model="form.capacity" type="number" placeholder="Capacity" class="w-full border p-3 rounded-lg">
        <input v-model="form.location" placeholder="Location" class="w-full border p-3 rounded-lg">
        <input v-model="form.max_duration_hours" type="number" class="w-full border p-3 rounded-lg">

        <select
            v-model="form.status"
            class="w-full border p-3 rounded-lg"
        >
            <option value="available">
                Available
            </option>

            <option value="unavailable">
                Unavailable
            </option>
        </select>

        <button
            class="border px-5 py-3 rounded-lg"
        >
            Save
        </button>
    </form>
</div>
</template>