import { defineStore } from "pinia";

export const useModalStore = defineStore('useModalStore', {
    state: () => ({ 
        resource: '' , 
        url: '',
     }),
    getters: {
    },
    actions: {
        setResource(resource, url){
            this.resource = resource;
            this.url = url;
        },
    },
  })