module.exports = {
    data() {
        return {
            areaOptions: []
        }
    },

    created() {
        this.fetchAreaOptions();
    },

    methods: {
        fetchAreaOptions() {
            axios.get('/api/options/area')
                .then(response => {
                    this.areaOptions = response.data.data;

                    this.areaOptionFetched();
                })
        },

        areaOptionFetched() {

        }
    }
}
