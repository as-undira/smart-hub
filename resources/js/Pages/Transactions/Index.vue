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
    transactions: Array,
})

const approve = id => {
    router.patch(
        route(
            'transactions.approve',
            id
        )
    )
}

const reject = id => {
    router.patch(
        route(
            'transactions.reject',
            id
        )
    )
}

const cancel = id => {
    router.patch(
        route(
            'transactions.cancel',
            id
        )
    )
}

const checkout = id => {
    router.patch(
        route(
            'transactions.checkout',
            id
        )
    )
}

const complete = id => {
    router.patch(
        route(
            'transactions.complete',
            id
        )
    )
}
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                Transactions
            </h1>

            <Link
                :href="
                    route(
                        'transactions.create'
                    )
                "
                class="border px-4 py-2 rounded-lg"
            >
                New Transaction
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
                            Member
                        </th>

                        <th class="p-4 text-left">
                            Workspace
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
                                trx.user?.name
                            }}
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

                        <td
                            class="p-4 flex gap-3 flex-wrap"
                        >
                            <button
                                v-if="
                                    trx.status ===
                                    'pending'
                                "
                                @click="
                                    approve(
                                        trx.id
                                    )
                                "
                            >
                                Approve
                            </button>

                            <button
                                v-if="
                                    trx.status ===
                                    'pending'
                                "
                                @click="
                                    reject(
                                        trx.id
                                    )
                                "
                            >
                                Reject
                            </button>

                            <button
                                v-if="
                                    trx.status ===
                                    'pending'
                                "
                                @click="
                                    cancel(
                                        trx.id
                                    )
                                "
                            >
                                Cancel
                            </button>

                            <button
                                v-if="
                                    trx.status ===
                                    'approved'
                                "
                                @click="
                                    checkout(
                                        trx.id
                                    )
                                "
                            >
                                Checkout
                            </button>

                            <button
                                v-if="
                                    trx.status ===
                                    'borrowed'
                                "
                                @click="
                                    complete(
                                        trx.id
                                    )
                                "
                            >
                                Complete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>