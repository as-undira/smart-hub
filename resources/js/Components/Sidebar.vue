<script setup>
import {
    Link,
    usePage,
} from '@inertiajs/vue3'

const page = usePage()

const user =
    page.props.auth.user

const menus = [
    {
        name: 'Dashboard',
        route: 'dashboard',
        roles: [
            'admin',
            'member',
        ],
    },

    {
        name: 'Members',
        route: 'members.index',
        roles: ['admin'],
    },

    {
        name: 'Workspaces',
        route: 'workspaces.index',
        roles: [
            'admin',
            'member',
        ],
    },

    {
        name: 'Equipments',
        route: 'equipments.index',
        roles: [
            'admin',
            'member',
        ],
    },

    {
        name: 'Transactions',
        route: 'transactions.index',
        roles: ['admin'],
    },

    {
        name: 'My Transactions',
        route:
            'my-transactions.index',
        roles: ['member'],
    },

    {
        name: 'Profile',
        route:
            'profile.edit',
        roles: [
            'admin',
            'member',
        ],
    },
]
</script>

<template>
    <aside
        class="w-64 min-h-screen border-r bg-white p-6"
    >
        <h1
            class="text-2xl font-bold mb-10"
        >
            Smart-Hub
        </h1>

        <div class="space-y-2">

            <Link
                v-for="
                    menu in menus.filter(
                        m =>
                            m.roles.includes(
                                user.role
                            )
                    )
                "
                :key="menu.route"
                :href="
                    route(
                        menu.route
                    )
                "
                class="block px-4 py-3 rounded-lg transition"
                :class="
                    route().current(
                        menu.route
                    )
                        ? 'bg-gray-100 font-semibold'
                        : 'hover:bg-gray-50'
                "
            >
                {{ menu.name }}
            </Link>

        </div>
    </aside>
</template>