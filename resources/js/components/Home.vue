<template>
    <div>
        <div v-if="error" class="bg-red-300 text-white p-5 mb-6">
            {{ error }}
        </div>
        <div v-if="loading">Loading...</div>
        <form @submit.prevent="searchTrain" v-else class="flex justify-between items-center">
            <div class="w-1/3">
                <label class="px-4">From</label>
                <v-select v-model="from" :options="stations" class="w-72 px-4 py-2"/>
            </div>

            <div class="w-1/3">
                <label class="px-4">To</label>
                <v-select v-model="to" :options="stations" class="w-72 px-4 py-2"/>
            </div>

            <div class="w-1/3">
                <label class="px-4">Date</label>
                <div>
                    <v-date-picker format="YYYY-MM-DD" v-model="doj" class="w-72 px-4 py-2"/>
                </div>
            </div>

            <div class="w-1/3 mt-5">
                <button type="submit" class="bg-indigo-500 py-2 px-4 text-white mx-4">Search</button>
            </div>
        </form>

        <table v-if="trains.length" class="table-auto w-full">
            <tr>
                <th class="border px-4 py-2">Train</th>
                <th class="border px-4 py-2">Dep. Time</th>
                <th class="border px-4 py-2">Seats Available</th>
                <th class="border px-4 py-2">Fare</th>
            </tr>
            <tr v-for="item in trains">
                <td class="border px-4 py-2">
                    <h4>{{item.train_name}}</h4>
                    <p>{{item.train_route}}</p>
                </td>
                <td class="border px-4 py-2">{{item.dep_time}}</td>
                <td class="border px-4 py-2">{{item.seats_available}}</td>
                <td class="border px-4 py-2">
                    <ul>
                        <li v-for="fare in item.available">
                            Type: {{fare.type}} - available: {{fare.quantity}} - Fare: {{fare.fare}}
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
        
    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            from: '',
            to: '',
            doj: '',
            stations: [],
            loading: true,
            trains: [],
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
        searchTrain() {
            const formatDate = (date) => {
                let d = new Date(date);
                let month = (d.getMonth() + 1).toString().padStart(2, '0');
                let day = d.getDate().toString().padStart(2, '0');
                let year = d.getFullYear();
                return [year, month, day].join('-');
            }

            axios.post('/search_ticket', {
                from: this.from.code,
                to: this.to.code,
                doj: formatDate(this.doj),
            }).then(res => {
                this.trains = res.data;

            }).catch(err => {
                this.error = err.response.data.message;
            });
        }
    }
}
</script>

<style scoped>

</style>
