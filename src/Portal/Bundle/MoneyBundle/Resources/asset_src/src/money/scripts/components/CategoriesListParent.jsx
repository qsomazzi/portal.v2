import React, { Component, PropTypes } from 'react';
import CategoriesActions               from './../action/CategoriesActions';
import CategoriesListChild             from './CategoriesListChild';
import classNames                      from 'classnames';


class CategoriesListParent extends Component {
    openCategory(category, e) {
        e.preventDefault();
        CategoriesActions.load(category);
    }

    render() {
        let { parent, currentCategory } = this.props;

        let classes       = classNames('box box-solid', {'active': parent.id === currentCategory.id || parent.id === currentCategory.parent});
        let actionClasses = classNames('btn btn-box-tool', {'hide': parent.children.length == 0});
        let bodyClasses   = classNames('box-body no-padding', {'hide': parent.children.length == 0});

        let children = parent.children.map((child, key) => {
            return <CategoriesListChild key={key} currentCategory={currentCategory} child={child} />;
        });

        return (
            <div className={classes}>
                <div className="box-header with-border">
                    <h3 className="box-title" onClick={this.openCategory.bind(this, parent)}>{parent.name}</h3>
                    <div className="box-tools">
                        <button className={actionClasses} data-widget="collapse">
                            <i className="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div className={bodyClasses}>
                    <ul className="children nav nav-pills nav-stacked">
                        {children}
                    </ul>
                </div>
            </div>
        );
    }
}

CategoriesListParent.propTypes = {
    parent: PropTypes.object.isRequired,
    currentCategory: PropTypes.object.isRequired
}


export default CategoriesListParent;
