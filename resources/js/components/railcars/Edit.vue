<template>
    <div class="modal fade" id="edit-railcar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Railcar</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" @click.prevent="hideModal()"></button>
                </div>

                <div class="modal-body">
                    <validation-errors :errors="validationErrors" />

                    <div>
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" v-model="railcar.name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="area">Area</label>
                            <select id="area" class="form-control form-select" @input="selectArea">
                                <option :selected="isAreaSelected(areaOption.key)" :value="areaOption.key" v-for="areaOption in areaOptions">
                                    {{ areaOption.value }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select id="status" class="form-control form-select" @input="selectStatus">
                                <option :selected="isStatusSelected(statusOption.key)" :value="statusOption.key" v-for="statusOption in statusOptions">
                                    {{ statusOption.value }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="arrival_date">Arrival Date</label>
                            <input type="datetime-local" class="form-control" id="arrival_date" v-model="railcar.arrival_date">
                        </div>

                        <div class="form-group mb-3">
                            <label for="due_date">Due Date</label>
                            <input type="datetime-local" class="form-control" id="due_date" v-model="railcar.due_date">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click.prevent="hideModal()">Close</button>
                    <button type="button" class="btn btn-primary" @click.prevent="updateRailcar()">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AreaOptions from './../../mixins/areaOptions';
import StatusOptions from './../../mixins/statusOptions';

export default {
    mixins: [
        AreaOptions, StatusOptions
    ],

    data() {
        return {
            railcar: {},
            validationErrors: []
        }
    },

    mounted() {
        Bus.$on('railcar.edit', (id) => {
            this.fetchRailcar(id);
        })
    },

    methods: {
        fetchRailcar(id) {
            axios.get(`/api/railcars/${id}`)
                .then(response => {
                    this.railcar = response.data.data;

                    $('#edit-railcar-modal').modal('show');
                });
        },

        updateRailcar() {
            axios.put(`/api/railcars/${this.railcar.id}`, this.railcar)
                .then(response => {
                    this.hideModal();

                    Bus.$emit('flash', 'Railcar Updated!');

                    Bus.$emit('refresh-railcars');
                }).catch(error => {
                    if (error.response.status === 422){
                        this.validationErrors = error.response.data.errors;
                    }
                })
        },

        hideModal() {
            $('#edit-railcar-modal').modal('hide');
        },

        selectArea(event) {
            console.log(event.target.value);
            this.railcar.area = event.target.value;
        },

        selectStatus(event) {
            console.log(event.target.value);
            this.railcar.status = event.target.value;
        },

        isAreaSelected(key) {
            return this.railcar.area === key;
        },

        isStatusSelected(key) {
            return this.railcar.status === key;
        }
    },
}
</script>

<style scoped>

</style>
