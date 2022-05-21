<template>

</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        data() {
            return {

            }
        },

        mounted() {
            this.getUser();

            setTimeout(() => {
                if (!this.isLoggedIn && !_.includes(window.location.pathname, 'login')) {
                    window.location = '/login';
                }
            }, 500)
        },

        methods: {
            ...mapActions({
                'getUser': 'auth/user',
                'clearState': 'auth/logout'
            }),

            logout() {
                axios.post('api/logout').then(response => {
                    this.clearState();
                })
            },

            redirectToHome() {
                window.location = (this.isLoggedIn)
                    ? '/dashboard'
                    : '/login';
            }
        },

        computed: {
            ...mapGetters({
                'user': 'auth/user',
                'isLoggedIn': 'auth/authenticated',
            }),

            userName() {
                return _.get(this.user, 'name', '');
            }
        }
    }
</script>
