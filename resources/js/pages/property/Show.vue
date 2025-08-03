<script setup lang="ts">
import Heading from '@/components/Heading.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import * as L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { onMounted, ref } from 'vue';
import { ChevronRightIcon } from '@heroicons/vue/20/solid'

interface Props {
    property: object;
    fees: Array<any>;
}

const props = defineProps<Props>();
const initialMap = ref();

onMounted(() => {
    initialMap.value = L.map('map').setView([props.property.latitude, props.property.longitude], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
    }).addTo(initialMap.value);
    L.marker([props.property.latitude, props.property.longitude]).addTo(initialMap.value);
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/app/dashboard',
    },
    {
        title: 'Twoje nieruchomości',
        href: '/app/dashboard',
    },
    {
        title: props.property.title,
        href: route('app.property.show', props.property.uuid),
    },
];

const statuses = {
    pending: 'text-gray-400 bg-gray-400/10 ring-gray-400/20',
}

</script>

<template>
    <Head title="Property" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-6">
            <Heading :title="property.address" description="Zarządzanie wybraną nieruchomością" />
        </div>
        <div class="p-6">
            <div class="grid grid-cols-3 gap-16">
                <div class="col-span-2 ">
                    Najbliższe opłaty
                    <ul role="list" class="divide-y divide-white/5">
                        <li v-for="fee in fees" :key="fee.id" class="relative flex items-center space-x-4 py-4">
                            <div class="min-w-0 flex-auto">
                                <div class="flex items-center gap-x-3">
                                    <div :class="[statuses[fee.status], 'flex-none rounded-full p-1']">
                                        <div class="size-2 rounded-full bg-current" />
                                    </div>
                                    <h2 class="min-w-0 text-sm/6 font-semibold text-gray-600">
                                        <a  class="flex gap-x-2">
                                            <span class="truncate">{{ fee.property_rental_fee_type.fee_type.name }}</span>
                                            <span class="text-gray-400">/</span>
                                            <span class="whitespace-nowrap">{{ fee.amount }} PLN</span>
                                            <span class="absolute inset-0" />
                                        </a>
                                    </h2>
                                </div>
                                <div class="mt-3 flex items-center gap-x-2.5 text-xs/5 text-gray-400">
                                    <p class="truncate">Utworzono: {{ fee.payment_date }}</p>
                                    <svg viewBox="0 0 2 2" class="size-0.5 flex-none fill-gray-300">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    <p class="whitespace-nowrap">Ostatni dzień zapłaty: {{ fee.payment_due_date }}</p>
                                </div>
                            </div>
                            <div :class="[statuses[fee.status], 'flex-none rounded-full px-2 py-1 text-xs font-medium ring-1 ring-inset']">{{ fee.status }}</div>
                            <ChevronRightIcon class="size-5 flex-none text-gray-400" aria-hidden="true" />
                        </li>
                    </ul>
                </div>
                <div class="flex gap-2">
                    <div>
                        <HeadingSmall :title="property.address" :description="property.description" />
                        <p>{{ property.postal_code }} {{ property.city.name }}</p>
                    </div>
                    <div id="map" class="h-64 w-full"></div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
