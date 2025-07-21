import { defineStore } from "pinia";
 
export const useMessageStore = defineStore('messages', {
  state:()=>({
    msgs: [],
    chatId: 0,
    chatName: ''
  }),
  actions: {
    setMessages(values, chatId, chatName){
      this.msgs = values;
      this.chatId = chatId;
      this.chatName = chatName;
    },
    addMessages(values){
      this.msgs = this.msgs.concat(values);
    }
  }
})