<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import {
    Link,
    useForm,
} from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const props =
    defineProps({
        workspaces: Array,
        equipments: Array,
    })

const form = useForm({
    workspace_id: '',
    borrow_start: '',
    borrow_end: '',
    notes: '',
    equipments: [],
})

const toggleEquipment =
    equipment => {
        const index =
            form.equipments.findIndex(
                x =>
                    x.id ===
                    equipment.id
            )

        if (index !== -1) {
            form.equipments.splice(
                index,
                1
            )

            return
        }

        form.equipments.push({
            id: equipment.id,
            quantity: 1,
        })
    }

const submit = () => {
    form.post(
        route(
            'transactions.store'
        )
    )
}
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                New Transaction
            </h1>

            <Link
                :href="
                    route(
                        'transactions.index'
                    )
                "
                class="border px-4 py-2 rounded-lg"
            >
                Back
            </Link>
        </div>

        <div class="border rounded-xl p-6 space-y-5">

            <select
                v-model="
                    form.workspace_id
                "
                class="w-full border rounded-lg p-3"
            >
                <option value="">
                    No Workspace
                </option>

                <option
                    v-for="
                        workspace
                        in workspaces
                    "
                    :key="
                        workspace.id
                    "
                    :value="
                        workspace.id
                    "
                >
                    {{
                        workspace.name
                    }}
                </option>
            </select>

            <input
                v-model="
                    form.borrow_start
                "
                type="datetime-local"
                class="w-full border rounded-lg p-3"
            >

            <input
                v-model="
                    form.borrow_end
                "
                type="datetime-local"
                class="w-full border rounded-lg p-3"
            >

            <textarea
                v-model="
                    form.notes
                "
                placeholder="Notes"
                class="w-full border rounded-lg p-3"
            />

            <div>
                <h2
                    class="font-semibold mb-3"
                >
                    Equipments
                </h2>

                <div
                    v-for="
                        equipment
                        in equipments
                    "
                    :key="
                        equipment.id
                    "
                    class="flex justify-between border-b py-3"
                >
                    <span>
                        {{
                            equipment.name
                        }}
                    </span>

                    <input
                        type="checkbox"
                        @change="
                            toggleEquipment(
                                equipment
                            )
                        "
                    >
                </div>
            </div>

            <button
                @click="
                    submit
                "
                class="border px-5 py-3 rounded-lg"
            >
                Save
            </button>
        </div>
    </div>
</template>