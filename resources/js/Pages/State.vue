<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import StateList from "@/Components/StateList.vue";
</script>
<template>
    <AppLayout title="Manage state">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                State management portal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <StateList />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
