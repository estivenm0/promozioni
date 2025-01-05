import { defineStore } from "pinia";

export const useModalStore = defineStore('useModalStore', {
    state: () => ({ 
        resource: '' , 
        url: '' }),
    getters: {
    },
    actions: {
        setResource(value){
            this.resource = value;
        },
        setUrl(value){
            this.url = value;
        }
    },
  })