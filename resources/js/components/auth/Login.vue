<template>
    <div class="container">
        <validation-errors :errors="validationErrors" />
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" v-model="user.email" class="form-control" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" v-model="user.password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" @click="login()">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            processing: false,
            validationErrors: [],
        }
    },

    mounted() {
        setTimeout(() => {
            if (this.isLoggedIn) {
                window.location = '/dashboard';
            }
        }, 500)
    },

    methods: {
        login() {
            axios.post('/api/login', this.user).then(({data})=>{
                localStorage.setItem('token', data);

                window.location = '/dashboard';
            }).catch(({response:{data}})=>{
                this.validationErrors = data;
            }).finally(()=>{
                this.processing = false
            })
        },
    },

    computed: {
        ...mapGetters({
            'isLoggedIn': 'auth/authenticated'
        })
    }
}
</script>

<style scoped>

</style>
