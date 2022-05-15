module.exports = {
    data() {
        return {
            statusOptions: []
        }
    },

    created() {
        this.fetchStatusOptions();
    },

    methods: {
        fetchStatusOptions() {
            axios.get('/api/options/status')
                .then(response => {
                    this.statusOptions = response.data.data;

                    this.statusOptionFetched();
                })
        },

        statusOptionFetched() {

        }
    }
}
