<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

defineOptions({
    layout: DashboardLayout,
})

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
})

const submit = () => {
    form.post(route('members.store'))
}
</script>

<template>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">
                Add Member
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

            <div>
                <label>Password</label>

                <input
                    v-model="form.password"
                    type="password"
                    class="w-full border rounded-lg p-3 mt-2"
                />
            </div>

            <button
                type="submit"
                class="border px-5 py-3 rounded-lg"
            >
                Save
            </button>
        </form>
    </div>
</template>