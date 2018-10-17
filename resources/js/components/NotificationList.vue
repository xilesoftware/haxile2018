<template>
    <div class="container">
        Notification list
        <ul>
            <li v-for="(message, index) in messages" :key="index">{{ message }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data: () => ({
            messages: []
        }),

        methods: {
            listenMessages() {
                let $self = this;
                console.log('listenMessages');
                Echo.channel('messages')
                    .listen('.message.sent', (e) => {
                        console.log(e.message);
                        $self.messages.push(e.message);
                    });
            }
        },

        mounted() {
            this.listenMessages();
        }
    }
</script>
