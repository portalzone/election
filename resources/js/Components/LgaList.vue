<script setup>
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
    state_id: null,
    lga_name: null,
});
function submit() {
    form.post("lgas", {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Local Government successfully created!!!");
            form.reset("state_id");
            form.reset("lga_name");
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
                Welcome to Local Government Management Portal
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
                    <select class="mt-1 block w-full" v-model="form.state_id">
                        <option value="">Select State</option>
                        <option
                            v-for="state in states"
                            :key="state.id"
                            name="state_id"
                            :value="state.id"
                        >
                            {{ state.state_name }}
                        </option>
                    </select>
                    <InputError
                        :message="form.errors.state_id"
                        class="mt-2 mb-3"
                    />
                    <InputLabel for="lga_name"
                        >Local Government name:</InputLabel
                    >

                    <TextInput
                        id="lga_name"
                        class="mt-1 block w-full"
                        v-model="form.lga_name"
                        name="lga_name"
                        @input="handleInput"
                    />
                    <InputError
                        :message="form.errors.lga_name"
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
<!-- json -->
<script>
import axios from "axios";
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
    },
};
</script>
