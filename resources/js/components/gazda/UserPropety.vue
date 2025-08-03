<script setup lang="ts">
interface Props {
    userProperty: object;
}

defineProps<Props>();
</script>

<template>
    <h3 class="mb-0.5 text-base font-medium">{{ userProperty.title }}</h3>
    <div>
        <p class="text-xs text-muted-foreground">
            {{ userProperty.description }}
        </p>
    </div>
    <div>
        <img
            src="/images/dummy/modern-luxury-residential-flat-apartment-600nw-2119925180.webp"
            alt="Property Image"
            class="mt-2 h-32 w-full rounded-lg object-cover"
        />
    </div>

    <div class="mt-4 text-sm text-muted-foreground">
        <p>{{ userProperty.address }}</p>
        <p>
            {{ userProperty.postal_code }} <span class="font-bold">{{ userProperty.city.name }}</span>
        </p>
    </div>
</template>
