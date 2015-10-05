import React, { Component, PropTypes } from 'react';
import CategoriesListParent            from './CategoriesListParent';


class CategoriesList extends Component {
    render() {
        let { categories, currentCategory } = this.props;

        let categoriesList = categories.map((parent, key) => {
            return <CategoriesListParent key={key} parent={parent} currentCategory={currentCategory} />;
        });

        return (
            <div>
                {categoriesList}
            </div>
        );
    }
}

CategoriesList.propTypes = {
    currentCategory: PropTypes.object.isRequired,
    categories: PropTypes.array.isRequired
}


export default CategoriesList;
