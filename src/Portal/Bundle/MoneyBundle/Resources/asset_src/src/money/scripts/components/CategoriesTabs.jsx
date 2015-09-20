import React, { Component, PropTypes } from 'react';
import { ListenerMixin }               from 'reflux';
import classNames                      from 'classnames';
import CategoriesActions               from './../action/CategoriesActions';
import CategoriesStore                 from './../store/CategoriesStore';
import reactMixin                      from 'react-mixin';


class CategoriesTabs extends Component {
    componentDidMount() {
        this.listenTo(CategoriesStore, this.onCategoriesUpdate);
    }

    componentWillMount() {
        this.onCategoriesUpdate();
    }

    onCategoriesUpdate() {
        this.setState({
            category: CategoriesStore.currentCategory(),
            child: CategoriesStore.currentChild()
        });
    }

    openCategory(category, parent, e) {
        e.preventDefault();
        CategoriesActions.load(category, parent);
    }

    renderTabChildren(category) {
        let children = category.children.map((child, key) => {
            let active = this.state.child === child.id ? 'active ' : '';

            return (
                <li key={key} className={active} onClick={this.openCategory.bind(this, child, false)}>
                    <a href="">{child.name}</a>
                </li>
            );
        });

        return (
            <ul className="children nav nav-pills nav-stacked">
                {children}
            </ul>
        );
    }

    renderTab(category, key) {
        let active          = this.state.category === category.id ? 'active ' : '';
        let hasChildren     = category.children !== undefined;
        let childrenDisplay = hasChildren ? <div className="box-tools"><button className="btn btn-box-tool" data-widget="collapse"><i className="fa fa-minus"></i></button></div> : null;
        let childrenTabs    = hasChildren ? <div className="box-body no-padding">{this.renderTabChildren(category)}</div> : null;

        return (
            <div key={key} className={active + 'box box-solid'}>
                <div className="box-header with-border">
                    <h3 className="box-title" onClick={this.openCategory.bind(this, category, true)}>{category.name}</h3>
                    {childrenDisplay}
                </div>
                {childrenTabs}
            </div>
        );
    }

    render() {
        let { categories } = this.props;

        return (
            <nav role="tablist" className="collapse">
                <a href="" className="btn btn-primary btn-block margin-bottom add-entry"><i className="fa fa-plus-circle"></i> Add</a>
                {categories.map((category, key) => {
                    return this.renderTab(category, key);
                })}
            </nav>
        );
    }
}

CategoriesTabs.propTypes = {
    categories: PropTypes.arrayOf(PropTypes.object)
};

reactMixin(CategoriesTabs.prototype, ListenerMixin);


export default CategoriesTabs;
