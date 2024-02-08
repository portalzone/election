<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Dropper from "@/Components/Drop.vue";
</script>

<template>
    <AppLayout title="Manage ward">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ward management portal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Dropper />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
