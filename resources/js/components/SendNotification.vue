<template>
    <div class="container">
        Message
        <input name="message" v-model="message" type="text" @keyup.enter="sendMessage">
        <button class="btn btn-success" @click="sendMessage">Send Message</button>
    </div>
</template>

<script>
    export default {
        data: () => ({
            message: ''
        }),

        methods: {
            sendMessage() {
                let $self = this ;
                axios.post('/message', {
                    message: this.message
                }).then(function(response) {
                    $self.message = '';
                }).catch(function(error) {
                    console.log(error);
                })
            }
        },

        mounted() {
            //
        }
    }
</script>
