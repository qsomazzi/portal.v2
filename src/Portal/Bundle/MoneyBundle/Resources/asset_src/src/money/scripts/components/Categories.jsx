import React, { Component, PropTypes } from 'react';
import CategoriesTabs                  from './CategoriesTabs';
import CategoriesContent               from './CategoriesContent';
import CategoriesStore                 from './../store/CategoriesStore';


class Categories extends Component {
    constructor(props) {
        super(props);
        CategoriesStore.init(this.props.categories);
    }

    render() {
        return (
            <div className="categories clearfix row">
                <div className="col-md-2">
                    <CategoriesTabs categories={CategoriesStore.getTreeCategories()} />
                </div>
                <div className="col-md-10">
                    <CategoriesContent categories={CategoriesStore.getFlatCategories()} />
                </div>
            </div>
        );
    }
}

Categories.propTypes = {
    categories: PropTypes.arrayOf(PropTypes.object)
};


export default Categories;
