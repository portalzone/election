<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import LgaList from "@/Components/LgaList.vue";
</script>
<template>
    <AppLayout title="Manage Local Government">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Local Government management portal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <LgaList />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
