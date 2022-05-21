<template>
    <div>
        <flash />

        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" @click="createRailcar()">
                &#65291;Add
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Area</th>
                        <th scope="col">Status</th>
                        <th scope="col">Arrival Date</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="railcar in railcars">
                        <th scope="row">{{ railcar.id }}</th>
                        <td>{{ railcar.name }}</td>
                        <td>{{ railcar.nice_area }}</td>
                        <td>{{ railcar.nice_status }}</td>
                        <td>{{ railcar.nice_arrival_date }}</td>
                        <td>{{ railcar.nice_due_date }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <button type="button" class="btn btn-warning mx-2" @click.prevent="editRailcar(railcar.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M16.598 13.091l-5.69-5.688 7.402-7.403 5.69 5.689-7.402 7.402zm-16.598 10.909l7.126-1.436-5.688-5.689-1.438 7.125zm1.984-20.568l6.449 6.446-5.582 5.582 5.689 5.69 5.583-5.583 6.492 6.49 1.4-1.428-18.631-18.625-1.4 1.428z"/></svg>
                                </button>

                                <button type="button" class="btn btn-danger" @click.prevent="deleteRailcar(railcar.id)">
                                    <svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M19 24h-14c-1.104 0-2-.896-2-2v-16h18v16c0 1.104-.896 2-2 2m-9-14c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6-5h-20v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2zm-12-2h4v-1h-4v1z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div v-if="paginator">
            <pagination v-model="page" :per-page="perPage" :records="records" @paginate="paginate"/>
        </div>

        <railcar-create />

        <railcar-edit />
    </div>
</template>

<script>
import Pagination from 'vue-pagination-2';

export default {
    components: {
        Pagination,
    },

    data() {
        return {
            page: 1,
            records: 0,
            paginator: {},
            railcars: [],
        }
    },

    mounted() {
        this.fetchRailcars();

        Bus.$on('refresh-railcars', () => this.fetchRailcars());
    },

    methods: {
        fetchRailcars() {
            let params = {
                page: this.page
            }

            axios.get('/api/railcars', {params: params})
                .then(response => {
                    this.railcars = response.data.data;
                    this.paginator = response.data.meta;
                    this.records = this.paginator.total;
                });
        },

        paginate(page) {
            this.page = page;

            this.fetchRailcars();
        },

        editRailcar(id) {
            Bus.$emit('railcar.edit', id);
        },

        createRailcar() {
            Bus.$emit('railcar.create');
        },

        deleteRailcar(id) {
            if (confirm('You are deleting Railcar, Are you Sure?')) {
                axios.delete(`/api/railcars/${id}`)
                    .then(response => this.fetchRailcars());
            }
        },
    },

    computed: {
        perPage() {
            return this.paginator ? this.paginator.per_page : 10;
        },
    }
}
</script>

<style scoped>

</style>
