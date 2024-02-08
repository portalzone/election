<template>
    <form @submit.prevent="submitForm">
        <div>
            <label for="state_id">State:</label>
            <select v-model="form.state_id" id="state_id" name="state_id">
                <option
                    v-for="state in states"
                    :key="state.id"
                    :value="state.id"
                >
                    {{ state.state_name }}
                </option>
            </select>
            <div v-if="$page.errors.state_id" class="text-red-500">
                {{ $page.errors.state_id[0] }}
            </div>
        </div>

        <div>
            <label for="lga_name">LGA Name:</label>
            <input
                v-model="form.lga_name"
                type="text"
                id="lga_name"
                name="lga_name"
            />
            <div v-if="$page.errors.lga_name" class="text-red-500">
                {{ $page.errors.lga_name[0] }}
            </div>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                state_id: "",
                lga_name: "",
            },
        };
    },

    props: {
        states: Array, // This prop is received from the controller
    },

    methods: {
        submitForm() {
            this.$inertia.post("/lgas", this.form);
        },
    },
};
</script>
