import React             from 'react';
import Reflux            from 'reflux';
import CategoriesActions from './../action/CategoriesActions';
import PortalApi         from './../constant/PortalApi';


let current = {
    category: {
        name: 'Loading ...'
    },
    transactions: [],
    categories: []
};

const CategoriesStore = Reflux.createStore({
    listenables: CategoriesActions,

    init() {
        PortalApi.getCategories().then((response) => {
            current.categories   = response.categories;
            current.category     = current.categories[0];

            PortalApi.getTransactions(current.category.id).then((response) => {
                current.transactions = response.transactions;

                this.trigger();
            });
        });
    },

    //——————————————————————————————————————————————————————————————————————————
    // Actions handlers
    //——————————————————————————————————————————————————————————————————————————
    load(category) {
        current.category = category;

        PortalApi.getTransactions(category.id).then((response) => {
            current.transactions = response.transactions;

            this.trigger();
        });
    },

    //——————————————————————————————————————————————————————————————————————————
    // Accessors
    //——————————————————————————————————————————————————————————————————————————
    currentCategory() {
        return current.category;
    },
    getCategories() {
        return current.categories;
    },
    getTransactions() {
        return current.transactions;
    }
});


export default CategoriesStore;
