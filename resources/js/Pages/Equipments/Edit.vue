<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const props = defineProps({
    equipment: Object,
})

const form = useForm({
    code: props.equipment.code,
    name: props.equipment.name,
    description: props.equipment.description,
    stock: props.equipment.stock,
    condition: props.equipment.condition,
    max_duration_days:
        props.equipment.max_duration_days,
})

const submit = () => {
    form.put(
        route(
            'equipments.update',
            props.equipment.id
        )
    )
}
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                Edit Equipment
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
                v-model="form.stock"
                type="number"
                placeholder="Stock"
                class="w-full border p-3 rounded-lg"
            >

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
                placeholder="Max Duration Days"
                class="w-full border p-3 rounded-lg"
            >

            <button
                type="submit"
                class="border px-5 py-3 rounded-lg"
            >
                Update
            </button>
        </form>
    </div>
</template>