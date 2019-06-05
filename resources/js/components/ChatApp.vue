<template>
  <div class="chat-app">
    <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
    <ContactsList :contacts="contacts" @selected="startConversationWith"/>
  </div>
</template>

<script>
import ContactsList from "./ContactsList";
import Conversation from "./Conversation";
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      selectedContact: null,
      messages: [],
      contacts: []
    };
  },
  mounted() {
    Echo.private(`messages.${this.user.id}`).listen("NewMessage", e => {
      console.log(e.message);

      this.handleIncoming(e.message);
    });

    axios.get("/contacts").then(response => {
      console.log(response.data);
      this.contacts = response.data;
    });
  },
  methods: {
    startConversationWith(contact) {
      axios.get(`/conversation/${contact.id}`).then(response => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    },
    saveNewMessage(data) {
      this.messages.push(data);
    },
    handleIncoming(message) {
      if (this.selectedContact && message.from == this.selectedContact.id) {
        this.saveNewMessage(message);
        return;
      }
      alert(message.text);
    }
  },
  components: { ContactsList, Conversation }
};
</script>


<style lang="scss" scoped>
.chat-app {
  display: flex;
}
</style>

