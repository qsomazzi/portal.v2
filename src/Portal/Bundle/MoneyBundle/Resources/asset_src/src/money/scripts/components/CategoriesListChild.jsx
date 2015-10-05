import React, { Component, PropTypes } from 'react';
import CategoriesActions               from './../action/CategoriesActions';
import classNames                      from 'classnames';


class CategoriesListChild extends Component {
    openCategory(category, e) {
        e.preventDefault();
        CategoriesActions.load(category);
    }

    render() {
        let { child, currentCategory } = this.props;
        let classes = classNames('child', {'active': child.id === currentCategory.id});

        return (
            <li className={classes} onClick={this.openCategory.bind(this, child)}>
                <a href="">{child.name}</a>
            </li>
        );
    }
}

CategoriesListChild.propTypes = {
    child: PropTypes.object.isRequired,
    currentCategory: PropTypes.object.isRequired
}


export default CategoriesListChild;
