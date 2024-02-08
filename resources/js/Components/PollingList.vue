<script setup>
import { reactive } from "vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

const toast = useToast();

const form = useForm({
    state_id: null,
    lga_id: null,
    ward_id: null,
    polling_name: null,
});

function submit() {
    form.post("pollings", {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Polling Unit successfully created!!!");
            form.reset();
        },
    });
}

function handleSubmit() {
    form.post("wards", {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Ward successfully created!!!");
            form.reset("ward_name");
        },
    });
}

function handleInput(e) {
    form.clearErrors(e.target.name);
}
</script>

<template>
    <div>
        <div class="p-6 lg:p-2 bg-white border-b border-gray-200">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to Polling Unit Management Portal
            </h1>

            <p class="mt-6 text-red-500 leading-relaxed">
                <span class="font-bold">Caution!!! </span>You have to be extra
                careful while executing any action.
            </p>
        </div>

        <div
            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"
        >
            <div class="col-span-6 sm:col-span-4">
                <form @submit.prevent="submit">
                    <InputLabel for="state_name">State name:</InputLabel>
                    <select
                        class="mt-1 block w-full"
                        v-model="form.state_id"
                        @change="getState"
                    >
                        <option value="">Select State</option>
                        <option
                            v-for="state in states"
                            :key="state.id"
                            :value="state.id"
                            name="state_id"
                        >
                            {{ state.state_name }}
                        </option>
                    </select>
                    <InputError
                        :message="form.errors.state_id"
                        class="mt-2 mb-3"
                    />
                    <!-- Local Government -->
                    <InputLabel for="lga_name"
                        >Local Government name:</InputLabel
                    >
                    <select
                        class="mt-1 block w-full"
                        v-model="form.lga_id"
                        @change="getLga"
                    >
                        <option value="">Select Local Government</option>
                        <option
                            v-for="lga in lgas"
                            :key="lga.id"
                            :value="lga.id"
                            name="lga_id"
                        >
                            {{ lga.lga_name }}
                        </option>
                    </select>
                    <InputError
                        :message="form.errors.lga_id"
                        class="mt-2 mb-3"
                    />
                    <!-- Ward -->
                    <InputLabel for="ward_name">Ward name:</InputLabel>
                    <select class="mt-1 block w-full" v-model="form.ward_id">
                        <option value="">Select Ward</option>
                        <option
                            v-for="ward in wards"
                            :key="ward.id"
                            :value="ward.id"
                            name="ward_id"
                        >
                            {{ ward.ward_name }}
                        </option>
                    </select>
                    <InputError
                        :message="form.errors.ward_id"
                        class="mt-2 mb-3"
                    />
                    <!-- test end -->
                    <InputLabel for="polling_name"
                        >Polling unit name:</InputLabel
                    >

                    <TextInput
                        id="polling_name"
                        class="mt-1 block w-full"
                        v-model="form.polling_name"
                        name="polling_name"
                        @input="handleInput"
                    />
                    <InputError
                        :message="form.errors.polling_name"
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
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            states: [],
            lgas: [],
            wards: [],
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
            let states = e.target.value;
            console.log(states);
            axios
                .get("http://localhost:8000/api/lga-list/" + states)
                .then((res) => {
                    this.lgas = res.data.data;
                    console.log(this.lgas);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getLga(e) {
            let lgas = e.target.value;
            console.log(lgas);
            axios
                .get("http://localhost:8000/api/ward-list/" + lgas)
                .then((res) => {
                    this.wards = res.data.data;
                    console.log(this.wards);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
