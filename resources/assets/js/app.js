
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueResource from "vue-resource"
Vue.use(VueResource);

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const app = new Vue({
    el: '#app',
    data: {
        chatMessage : [],
        userId : null,
        chats : [],
        chatWindows : [],
        chatStatus : 0,
        chatWindowStatus : [],
        chatCount : [],
        messages: []
    },
    created(){
      // axios.get('/messages').then(response => {
      //     this.chatMessage = response.data;
      //     console.log("chatmessage:"+this.chatMessage);
        console.log("user id:"+this.userId);
        Echo.channel('chat-message'+window.userid)
        .listen('ChatMessage', (e) => {
            // console.log("e.user"+e.user);
            // console.log("app:"+app.chats[this.userId]);
            // console.log("chatCount:"+this.chatCount[this.userId]);

            this.userId = e.user.sourceuserid;
            if(this.chats[this.userId]){
                this.show = 1;
                this.$set(app.chats[this.userId], this.chatCount[this.userId] ,e.user);
                this.chatCount[this.userId]++;
                console.log("pusher");
                console.log(this.chats[this.userId]);
            }else{
                this.createChatWindow(e.user.sourceuserid,e.user.name)
                console.log("pusher");
                axios.post('/messages',{
                  'id' : this.userId,
                } ).then(response => {
                          this.messages = response.data;
                          console.log(this.messages);
                          for (var i = 0; i < this.messages.length; i++) {
                            this.$set(app.chats[this.userId], this.chatCount[this.userId] , {
                                "message": this.messages[i].message,
                                "name" : this.messages[i].name,
                              });
                            this.chatCount[this.userId]++;
                          }
                      });
                // this.$set(app.chats[this.userId], this.chatCount[this.userId] ,e.user);
                // this.chatCount[this.userId]++;
            }

    });
},

    methods: {
      sendMessage(event){
                this.userId = event.target.id;
                var message = this.chatMessage[this.userId];
                console.log("userid"+ this.userId);
                console.log(message);
                // this.chatMessage.push(message);
                axios.post('/chat',{
                  'id' : this.userId,
                  'message' : message
                } ).then(response => {
                      this.chatMessage[this.userId] = '';
                      this.$set(app.chats[this.userId], this.chatCount[this.userId] , {
                          "message": message,
                          "name" : window.username
                  });
                  this.chatCount[this.userId]++;
                      console.log("send");
                      this.scrollToEnd();
                  }, response => {
                      this.error = 1;
                      console.log("error");
                      console.log(response);
                  });

              },
    scrollToEnd() {
        var container = this.$el.querySelectorAll("#chatbody");
        for(var i=0;i<container.length;i++)
        {
          container[i].scrollTop = container[i].scrollHeight;
        }
        console.log(container);

    },
    getUserId(event){
        this.userId = event.target.id;
        this.createChatWindow(this.userId,event.target.innerHTML);
        console.log(this.userId);
        axios.post('/messages',{
          'id' : this.userId,
        } ).then(response => {
                  this.messages = response.data;
                  for (var i = 0; i < this.messages.length; i++) {
                    if(this.messages[i].id == this.userId)
                    {
                      this.$set(app.chats[this.userId], this.chatCount[this.userId] , {
                          "message": this.messages[i].message,
                          "name" : this.messages[i].name,
                        });
                      this.chatCount[this.userId]++;
                    }
                    else {
                      this.$set(app.chats[this.userId], this.chatCount[this.userId] , {
                          "message": this.messages[i].message,
                          "name" : this.messages[i].name,
                        });
                      this.chatCount[this.userId]++;
                    }

                  }
              });
    },

    createChatWindow(userid,username){
        if(!this.chatWindowStatus[userid]){

            this.chatWindowStatus[userid] = 1;
            this.chatMessage[userid] = '';
            this.$set(app.chats, userid , {});
            this.$set(app.chatCount, userid , 0);
            this.chatWindows.push({"senderid" : userid , "name" : username});
        }

    }
}});
