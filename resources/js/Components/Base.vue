<!-- resources/js/Pages/YourView.vue -->

<template>
    <div>
        <form @submit.prevent="submitForm">
            <div>
                <label for="state">Select a state:</label>
                <select v-model="selectedState" id="state">
                    <option v-for="state in states" :value="state.id">
                        {{ state.state_name }}
                    </option>
                </select>
                <select v-model="selectedState">
                    <option v-for="state in states" :value="state.id">
                        {{ state.state_name }}
                    </option>
                </select>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

export default {
    setup() {
        const { props } = usePage();
        console.log(props.states); // Check if props.states is not empty
        const states = ref(props.states ? props.states : []);
        const selectedState = ref(null);

        const submitForm = () => {
            // You can perform any action you want here when the form is submitted
            console.log("Selected state ID:", selectedState.value);
            // If you're using Inertia, you can submit data back to the server like this:
            // this.$inertia.post('/submit-route', { selectedState: selectedState.value });
        };

        return {
            states,
            selectedState,
            submitForm,
        };
    },
};
</script>
