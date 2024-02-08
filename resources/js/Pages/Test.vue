<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

const toast = useToast();

const form = useForm({
    state_name: null,
});
function submit() {
    form.post("states", {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Local Government successfully created!!!");
            form.reset("state_name");
        },
    });
}
function handleInput(e) {
    form.clearErrors(e.target.name);
}
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
                    <div>
                        <div
                            class="p-6 lg:p-2 bg-white border-b border-gray-200"
                        >
                            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                                Welcome to Local Government Management Portal
                            </h1>

                            <p class="mt-6 text-red-500 leading-relaxed">
                                <span class="font-bold">Caution!!! </span>You
                                have to be extra careful while executing any
                                action.
                            </p>
                        </div>

                        <div
                            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"
                        >
                            <div class="col-span-6 sm:col-span-4">
                                <form @submit.prevent="submit">
                                    <InputLabel for="state_name"
                                        >State name:</InputLabel
                                    >
                                    <select
                                        class="mt-1 block w-full"
                                        @change="(e) => getState(e)"
                                    >
                                        <option value="">Select State</option>
                                        <option
                                            v-for="state in states"
                                            :key="state.id"
                                            :value="state.id"
                                        >
                                            {{ state.state_name }}
                                        </option>
                                    </select>
                                    <!-- next text -->
                                    <InputLabel for="state_name"
                                        >Local Government name:</InputLabel
                                    >
                                    <select
                                        class="mt-1 block w-full"
                                        @change="(e) => changeState(e)"
                                    >
                                        <option value="">
                                            Select Local Government
                                        </option>
                                        <option
                                            v-for="lga in lgas"
                                            :key="lga.id"
                                            :value="lga.id"
                                        >
                                            {{ lga.lga_name }}
                                        </option>
                                    </select>
                                    <!-- test end -->
                                    <InputLabel for="state_name"
                                        >Local Government name:</InputLabel
                                    >

                                    <TextInput
                                        id="state_name"
                                        class="mt-1 block w-full"
                                        v-model="form.state_name"
                                        name="state_name"
                                        @input="handleInput"
                                    />
                                    <InputError
                                        :message="form.errors.state_name"
                                        class="mt-2 mb-3"
                                    />
                                    <PrimaryButton
                                        type="submit"
                                        :disabled="form.processing"
                                        class="mt-3 mb-3"
                                        >Submit</PrimaryButton
                                    >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            states: [],
            lgas: [],
        };
    },
    mounted() {
        console.log("Component mounted.");
        this.stateList();
    },
    methods: {
        stateList() {
            axios
                .get("http://localhost:8000/api/state-list")
                .then((res) => {
                    this.states = res.data.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getState(e) {
            let stateId = e.target.value;
            console.log(stateId);
            axios
                .get("http://localhost:8000/api/lga-list/" + stateId)
                .then((res) => {
                    this.lgas = res.data.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>

<!-- <script>
import { Inertia } from "@inertiajs/inertia";

export default {
    data() {
        return {
            states: [],
        };
    },
    mounted() {
        console.log("Component mounted.");
        this.stateList();
    },
    methods: {
        async stateList() {
            try {
                const response = await Inertia.get("/state-list");
                this.states = response.data.data;
            } catch (error) {
                //
            }
        },
    },
};
</script> -->
