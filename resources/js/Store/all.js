import { defineStore } from "pinia";

export const useAppStore = defineStore('useAppStore', {
    state: () => ({ 
        business: null , 
     }),
    getters: {
    },
    actions: {
        setBusiness(business){
            this.business = business;
        },
    },
  })