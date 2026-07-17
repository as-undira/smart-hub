<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'

defineOptions({
    layout: DashboardLayout,
})

defineProps({
    transactions: Array,
})
</script>

<template>
    <div>

        <h1
            class="text-3xl font-bold mb-6"
        >
            My Transactions
        </h1>

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
                            Workspace
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                        <th class="p-4 text-left">
                            Borrow Date
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr
                        v-for="
                            trx
                            in transactions
                        "
                        :key="trx.id"
                        class="border-b"
                    >
                        <td class="p-4">
                            {{ trx.code }}
                        </td>

                        <td class="p-4">
                            {{
                                trx.workspace
                                    ?.name ??
                                '-'
                            }}
                        </td>

                        <td class="p-4">
                            {{ trx.status }}
                        </td>

                        <td class="p-4">
                            {{
                                trx.borrow_start
                            }}
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>

    </div>
</template>