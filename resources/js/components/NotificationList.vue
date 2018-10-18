<template>
    <div class="container">
        <div class="row">
            <h5>Messages</h5>
            <div class="col-md-8" style="height: 200px; overflow-y: scroll;">
                <div v-for="(message, index) in messages" :key="index" class="col-md-12">
                    <p><i>{{ message.time }}</i>: {{ message.content }}</p>
                </div>
            </div>
        </div>
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
                        let time = new Date();
                        $self.messages.push({
                            time: time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds(),
                            content: e.message
                        });
                    });
            }
        },

        mounted() {
            this.listenMessages();
        }
    }
</script>
