<template>
    <div>
        <div v-if="error" class="bg-red-300 text-white p-5 mb-6">
            {{ error }}
        </div>

        <form v-if="!loading" @submit.prevent="addTrain" method="POST">
            <div class="flex mb-6 items-center">

                <div class="flex-1 px-4">
                    <label for="name" class="">Name</label>
                    <input type="text" v-model="name" id="name" class="w-full px-4 py-2">
                </div>

                <div class="flex-1 px-4">
                    <label for="date" class="">Date</label>
                    <div>
                        <v-date-picker v-model="date" />
                    </div>
                </div>

            </div>

            <div class="flex mb-6">

                <div class="flex-1 px-4">
                    <label for="station_id" class="">Station</label>
                    <v-select :options="stations"/>
                </div>

                <div class="flex-1 px-4">
                    <label for="start_time" class="">Start Time</label>
                    <input type="text" v-model="start_time" id="start_time" class="w-full px-4 py-2">
                </div>


            </div>

            <button type="submit" class="bg-indigo-500 py-2 px-4 text-white mx-4">Save</button>
        </form>
    </div>
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
            error: false,
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
            axios.post('/add-train', {
                name: this.name,
                date: this.date,
                station_id: this.station_id,
                start_time: this.start_time,
            }).then(res => {
                console.log('success')
            }).catch(err => {
                this.error = err.response.data.message;
            });
        }
    }

}
</script>

<style>

</style>
