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
    stock: 1,
    condition: 'good',
    max_duration_days: 7,
})

const submit = () => {
    form.post(route('equipments.store'))
}
</script>

<template>
<div>
    <div class="flex justify-between mb-6">
        <h1 class="text-3xl font-bold">
            Add Equipment
        </h1>

        <Link
            :href="route('equipments.index')"
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

        <input v-model="form.stock" type="number" class="w-full border p-3 rounded-lg">

        <select
            v-model="form.condition"
            class="w-full border p-3 rounded-lg"
        >
            <option value="good">
                Good
            </option>

            <option value="maintenance">
                Maintenance
            </option>

            <option value="damaged">
                Damaged
            </option>
        </select>

        <input
            v-model="form.max_duration_days"
            type="number"
            class="w-full border p-3 rounded-lg"
        >

        <button
            class="border px-5 py-3 rounded-lg"
        >
            Save
        </button>
    </form>
</div>
</template>