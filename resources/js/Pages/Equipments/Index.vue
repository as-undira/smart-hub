<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Link, router } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

defineProps({
    equipments: Array,
})
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                Equipments
            </h1>

            <Link
                :href="route('equipments.create')"
                class="border px-4 py-2 rounded-lg"
            >
                Add Equipment
            </Link>
        </div>

        <div class="border rounded-xl overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-4 text-left">Code</th>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Stock</th>
                        <th class="p-4 text-left">Condition</th>
                        <th class="p-4 text-left">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="equipment in equipments"
                        :key="equipment.id"
                        class="border-b"
                    >
                        <td class="p-4">
                            {{ equipment.code }}
                        </td>

                        <td class="p-4">
                            {{ equipment.name }}
                        </td>

                        <td class="p-4">
                            {{ equipment.stock }}
                        </td>

                        <td class="p-4">
                            {{ equipment.condition }}
                        </td>

                        <td class="p-4 flex gap-4">
                            <Link
                                :href="
                                    route(
                                        'equipments.edit',
                                        equipment.id
                                    )
                                "
                            >
                                Edit
                            </Link>

                            <button
                                @click="
                                    router.delete(
                                        route(
                                            'equipments.destroy',
                                            equipment.id
                                        )
                                    )
                                "
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>