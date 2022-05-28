<template>
    <form v-if="!loading" @submit.prevent="addTrain" method="POST">
        <div class="flex mb-6 items-center">

            <div class="flex-1 px-4">
                <label for="name" class="">Name</label>
                <input type="text" v-model="name" id="name" class="w-full px-4 py-2">
            </div>

            <div class="flex-1 px-4">
                <label for="date" class="">Date</label>
                <input type="text" v-model="date" id="date" class="w-full px-4 py-2">
            </div>

        </div>

        <div class="flex mb-6">

            <div class="flex-1 px-4">
                <label for="station_id" class="">Station ID</label>
                <select v-model="station_id" id="station_id" class="w-full px-4 py-2">
                    <option value="">Select a station</option>
                    <option v-for="station in stations" :value="station.id">{{ station.name }}</option>
                </select>
            </div>

            <div class="flex-1 px-4">
                <label for="start_time" class="">Start Time</label>
                <input type="text" v-model="start_time" id="start_time" class="w-full px-4 py-2">
            </div>


        </div>

        <button type="submit" class="bg-indigo-500 py-2 px-4 text-white mx-4">Save</button>
    </form>
</template>

<script>
export default {
    name: "AddTrain",
    data() {
        return {
            name: '',
            date: '',
            station_id: '',
            start_time: '',
            loading: true,
            stations: [],
        }
    },
    mounted() {
        axios.get('/stations').then(res => {
            this.stations = res.data;
            this.loading = false;
        });
    },
    methods: {
        addTrain() {

        }
    }

}
</script>

<style>

</style>
