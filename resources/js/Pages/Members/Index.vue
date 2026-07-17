<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Link, router } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

defineProps({
    members: Array,
})
</script>

<template>
    <div>
        <div
            class="flex justify-between mb-6"
        >
            <h1 class="text-3xl font-bold">
                Members
            </h1>

            <Link
                :href="route('members.create')"
                class="border px-4 py-2 rounded-lg"
            >
                Add Member
            </Link>
        </div>

        <div
            class="border rounded-xl overflow-hidden"
        >
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-4 text-left">
                            Name
                        </th>

                        <th class="p-4 text-left">
                            Email
                        </th>

                        <th class="p-4 text-left">
                            Phone
                        </th>

                        <th class="p-4 text-left">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="member in members"
                        :key="member.id"
                        class="border-b"
                    >
                        <td class="p-4">
                            {{ member.name }}
                        </td>

                        <td class="p-4">
                            {{ member.email }}
                        </td>

                        <td class="p-4">
                            {{ member.phone }}
                        </td>

                        <td class="p-4 flex gap-4">
                            <Link
                                :href="
                                    route(
                                        'members.edit',
                                        member.id
                                    )
                                "
                            >
                                Edit
                            </Link>

                            <button
                                @click="
                                    router.delete(
                                        route(
                                            'members.destroy',
                                            member.id
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