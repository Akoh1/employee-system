/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('chat-component', require('./components/chats/ChatComponent.vue').default);
// Vue.component('user-component', require('./components/UserComponent.vue').default);
// Vue.component('chat-messages-component', require('./components/chats/ChatMessagesComponent.vue').default);
// Vue.component('chat-form-component', require('./components/chats/ChatFormComponent.vue').default);
// Vue.component('message-component', require('./components/chats/MessageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });

import VueResource from "vue-resource";
import Echo from "laravel-echo";
import Pusher from "pusher-js";
Vue.use(VueResource);
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "e9bda62e0338823385d8" //Add your pusher key here
});
const app = new Vue({
    el: '#app',
    data: {
        chatMessage: [],
        userId: null,
        chats: [],
        chatWindows: [],
        chatStatus: 0,
        chatWindowStatus: [],
        chatCount: []
    },
    created() {
        window.Echo.channel('chat-message' + window.userid)
            .listen('ChatMessage', (e) => {
                console.log(e.user);
                this.userId = e.user.sourceuserid;
                if (this.chats[this.userId]) {
                    this.show = 1;
                    this.$set(app.chats[this.userId], this.chatCount[this.userId], e.user);
                    this.chatCount[this.userId]++;
                    console.log("pusher");
                    console.log(this.chats[this.userId]);
                } else {
                    this.createChatWindow(e.user.sourceuserid, e.user.name)
                    this.$set(app.chats[this.userId], this.chatCount[this.userId], e.user);
                    this.chatCount[this.userId]++;
                }
            });
    },
    http: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    methods: {
        sendMessage(event) {
            this.userId = event.target.id;
            var message = this.chatMessage[this.userId];

            this.$http.post('chat', {
                'userid': this.userId,
                'message': message
            }).then(response => {
                this.chatMessage[this.userId] = '';
                this.$set(app.chats[this.userId], this.chatCount[this.userId], {
                    "message": message,
                    "name": window.username
                });
                this.chatCount[this.userId]++;
                console.log("send");
            }, response => {
                this.error = 1;
                console.log("error");
                console.log(response);
            });
        },
        getUserId(event) {
            this.userId = event.target.id;
            this.createChatWindow(this.userId, event.target.innerHTML);
            console.log(this.userId);
        },
        createChatWindow(userid, username) {
            if (!this.chatWindowStatus[userid]) {
                this.chatWindowStatus[userid] = 1;
                this.chatMessage[userid] = '';
                this.$set(app.chats, userid, {});
                this.$set(app.chatCount, userid, 0);
                this.chatWindows.push({
                    "senderid": userid,
                    "name": username
                });
            }
        }
    }
});
