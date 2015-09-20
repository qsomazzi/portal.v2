import Reflux            from 'reflux';
import CategoriesActions from './../action/CategoriesActions';

let data = {
    categories: [],
    flatCategories: []
};
let current = {
    category: null,
    child: null
};


const CategoriesStore = Reflux.createStore({
    listenables: CategoriesActions,

    //——————————————————————————————————————————————————————————————————————————
    // Actions handlers
    //——————————————————————————————————————————————————————————————————————————
    init(categories) {
        if (categories !== undefined) {
            categories.map((category, key) => {
                data.flatCategories.push(category);
                if (category.children !== undefined) {
                    category.children.map((child, key) => {
                        data.flatCategories.push(child);
                    });
                }
            });
            this.trigger();

            current.category = categories[0].id;
            data.categories  = categories;

            this.trigger();
        }
    },

    load(category, isParent) {
        current.category = isParent ? category.id : category.parent;
        current.child = isParent ? null : category.id;

        this.trigger();
    },

    //——————————————————————————————————————————————————————————————————————————
    // Accessors
    //——————————————————————————————————————————————————————————————————————————
    currentCategory() {
        return current.category;
    },
    currentChild() {
        return current.child;
    },
    getTreeCategories(categories) {
        return data.categories;
    },
    getFlatCategories() {
        return data.flatCategories;
    }
});


export default CategoriesStore;
