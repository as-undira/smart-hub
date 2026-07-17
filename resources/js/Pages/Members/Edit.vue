<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const props = defineProps({
    member: Object,
})

const form = useForm({
    name: props.member.name,
    email: props.member.email,
    phone: props.member.phone,
})

const submit = () => {
    form.put(
        route(
            'members.update',
            props.member.id
        )
    )
}
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                Edit Member
            </h1>

            <Link
                :href="route('members.index')"
                class="border px-4 py-2 rounded-lg"
            >
                Back
            </Link>
        </div>

        <form
            @submit.prevent="submit"
            class="border rounded-xl p-6 space-y-5"
        >
            <div>
                <label>Name</label>

                <input
                    v-model="form.name"
                    type="text"
                    class="w-full border rounded-lg p-3 mt-2"
                />
            </div>

            <div>
                <label>Email</label>

                <input
                    v-model="form.email"
                    type="email"
                    class="w-full border rounded-lg p-3 mt-2"
                />
            </div>

            <div>
                <label>Phone</label>

                <input
                    v-model="form.phone"
                    type="text"
                    class="w-full border rounded-lg p-3 mt-2"
                />
            </div>

            <button
                type="submit"
                class="border px-5 py-3 rounded-lg"
            >
                Update
            </button>
        </form>
    </div>
</template>