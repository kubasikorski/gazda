<script setup lang="ts">
import UserPropety from '@/components/gazda/UserPropety.vue';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/app/dashboard',
    },
];

interface Props {
    userProperties: array;
}

defineProps<Props>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-6">
            <Heading title="Twoje nieruchomości" description="Lista nieruchomości do których posiadasz dostęp" />
        </div>
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-4">
                <Link v-for="userProperty in userProperties"
                      :key="userProperty.id" :href="route('app.property.show',[userProperty.uuid])">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border hover:border-3 hover:border-gray-300"
                >
                    <user-propety :userProperty="userProperty" />
                </div>
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
