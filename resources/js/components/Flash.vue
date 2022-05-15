<template>
    <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert" v-if="showFlash">
        <div>
            {{ message }}
        </div>

        <div style="cursor:pointer;" @click="flash()">
            <button class="btn-close"></button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showFlash: false,
            }
        },

        mounted() {
            Bus.$on('flash', (message) => this.flash(message));
        },

        methods: {
            flash(message = '') {
                if (message.length) {
                    this.message = message;
                    this.showFlash = true;
                } else {
                    this.message = '';
                    this.showFlash = false;
                }
            },
        }
    }
</script>
