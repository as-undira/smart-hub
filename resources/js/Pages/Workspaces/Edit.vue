<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const props = defineProps({
    workspace: Object,
})

const form = useForm({
    code: props.workspace.code,
    name: props.workspace.name,
    description: props.workspace.description,
    capacity: props.workspace.capacity,
    location: props.workspace.location,
    max_duration_hours:
        props.workspace.max_duration_hours,
    status: props.workspace.status,
})

const submit = () => {
    form.put(
        route(
            'workspaces.update',
            props.workspace.id
        )
    )
}
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                Edit Workspace
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
            <input
                v-model="form.code"
                placeholder="Code"
                class="w-full border p-3 rounded-lg"
            >

            <input
                v-model="form.name"
                placeholder="Name"
                class="w-full border p-3 rounded-lg"
            >

            <textarea
                v-model="form.description"
                placeholder="Description"
                class="w-full border p-3 rounded-lg"
            />

            <input
                v-model="form.capacity"
                type="number"
                placeholder="Capacity"
                class="w-full border p-3 rounded-lg"
            >

            <input
                v-model="form.location"
                placeholder="Location"
                class="w-full border p-3 rounded-lg"
            >

            <input
                v-model="form.max_duration_hours"
                type="number"
                placeholder="Max Duration"
                class="w-full border p-3 rounded-lg"
            >

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
                type="submit"
                class="border px-5 py-3 rounded-lg"
            >
                Update
            </button>
        </form>
    </div>
</template>