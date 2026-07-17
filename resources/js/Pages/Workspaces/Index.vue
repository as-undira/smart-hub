<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import {
    Link,
    router
} from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

defineProps({
    workspaces: Array,
})
</script>

<template>
    <div>
        <div
            class="flex justify-between mb-6"
        >
            <h1
                class="text-3xl font-bold"
            >
                Workspaces
            </h1>

            <Link
                :href="
                    route(
                        'workspaces.create'
                    )
                "
                class="border px-4 py-2 rounded-lg"
            >
                Add Workspace
            </Link>
        </div>

        <div
            class="border rounded-xl overflow-hidden"
        >
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-4 text-left">
                            Code
                        </th>

                        <th class="p-4 text-left">
                            Name
                        </th>

                        <th class="p-4 text-left">
                            Capacity
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                        <th class="p-4 text-left">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="
                            workspace
                            in workspaces
                        "
                        :key="
                            workspace.id
                        "
                        class="border-b"
                    >
                        <td class="p-4">
                            {{
                                workspace.code
                            }}
                        </td>

                        <td class="p-4">
                            {{
                                workspace.name
                            }}
                        </td>

                        <td class="p-4">
                            {{
                                workspace.capacity
                            }}
                        </td>

                        <td class="p-4">
                            {{
                                workspace.status
                            }}
                        </td>

                        <td
                            class="p-4 flex gap-4"
                        >
                            <Link
                                :href="
                                    route(
                                        'workspaces.equipments',
                                        workspace.id
                                    )
                                "
                            >
                                Equipments
                            </Link>

                            <Link
                                :href="
                                    route(
                                        'workspaces.edit',
                                        workspace.id
                                    )
                                "
                            >
                                Edit
                            </Link>

                            <button
                                @click="
                                    router.delete(
                                        route(
                                            'workspaces.destroy',
                                            workspace.id
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