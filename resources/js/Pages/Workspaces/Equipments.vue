<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import {
    Link,
    useForm
} from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const props =
    defineProps({
        workspace: Object,
        equipments: Array,
        selectedEquipments:
            Array,
    })

const form = useForm({
    equipments:
        props.selectedEquipments.map(
            item => ({
                id: item.id,
                quantity:
                    item.pivot
                        .quantity,
            })
        ),
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
            'workspaces.equipments.sync',
            props.workspace.id
        )
    )
}
</script>

<template>
    <div>
        <div
            class="flex justify-between mb-6"
        >
            <h1
                class="text-3xl font-bold"
            >
                Workspace Equipments
            </h1>

            <Link
                :href="
                    route(
                        'workspaces.index'
                    )
                "
                class="border px-4 py-2 rounded-lg"
            >
                Back
            </Link>
        </div>

        <div
            class="border rounded-xl p-6"
        >
            <div
                v-for="
                    equipment
                    in equipments
                "
                :key="
                    equipment.id
                "
                class="flex justify-between py-4 border-b"
            >
                <div>
                    {{
                        equipment.name
                    }}
                </div>

                <div
                    class="flex gap-3 items-center"
                >
                    <input
                        type="checkbox"
                        :checked="
                            form.equipments.some(
                                x =>
                                    x.id ===
                                    equipment.id
                            )
                        "
                        @change="
                            toggleEquipment(
                                equipment
                            )
                        "
                    >

                    <input
                        v-if="
                            form.equipments.some(
                                x =>
                                    x.id ===
                                    equipment.id
                            )
                        "
                        type="number"
                        min="1"
                        class="border rounded px-3 py-1 w-24"
                        :value="
                            form.equipments.find(
                                x =>
                                    x.id ===
                                    equipment.id
                            )
                                ?.quantity
                        "
                        @input="
                            form.equipments.find(
                                x =>
                                    x.id ===
                                    equipment.id
                            ).quantity =
                                $event.target.value
                        "
                    >
                </div>
            </div>

            <button
                @click="
                    submit
                "
                class="mt-6 border px-5 py-3 rounded-lg"
            >
                Save
            </button>
        </div>
    </div>
</template>