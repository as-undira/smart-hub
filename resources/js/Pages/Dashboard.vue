<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'

defineOptions({
    layout: DashboardLayout,
})

defineProps({
    totalMembers: Number,
    totalWorkspaces: Number,
    totalEquipments: Number,
    totalTransactions: Number,
    activeBorrowings: Number,
    recentTransactions: Array,
})
</script>

<template>
    <div class="p-8">
        <h1 class="text-3xl font-bold mb-8">
            Dashboard
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-5 mb-10">
            <div class="border rounded-xl p-5">
                <p>Total Member</p>
                <h2 class="text-3xl font-bold">
                    {{ totalMembers }}
                </h2>
            </div>

            <div class="border rounded-xl p-5">
                <p>Total Workspace</p>
                <h2 class="text-3xl font-bold">
                    {{ totalWorkspaces }}
                </h2>
            </div>

            <div class="border rounded-xl p-5">
                <p>Total Equipment</p>
                <h2 class="text-3xl font-bold">
                    {{ totalEquipments }}
                </h2>
            </div>

            <div class="border rounded-xl p-5">
                <p>Total Transaction</p>
                <h2 class="text-3xl font-bold">
                    {{ totalTransactions }}
                </h2>
            </div>

            <div class="border rounded-xl p-5">
                <p>Active Borrowing</p>
                <h2 class="text-3xl font-bold">
                    {{ activeBorrowings }}
                </h2>
            </div>
        </div>

        <div class="border rounded-xl p-5">
            <h2 class="font-semibold mb-5">
                Recent Transactions
            </h2>

            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3">Code</th>
                        <th class="text-left py-3">Member</th>
                        <th class="text-left py-3">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="item in recentTransactions"
                        :key="item.id"
                        class="border-b"
                    >
                        <td class="py-3">
                            {{ item.code }}
                        </td>

                        <td>
                            {{ item.user?.name }}
                        </td>

                        <td>
                            {{ item.status }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>