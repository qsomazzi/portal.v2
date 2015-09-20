import React, { Component, PropTypes } from 'react';
import { ListenerMixin }               from 'reflux';
import CategoriesStore                 from './../store/CategoriesStore';
import reactMixin                      from 'react-mixin';


class CategoriesContent extends Component {
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

    renderContent(category, key) {
        let currentCategory = this.state.child !== null ? this.state.child : this.state.category;
        let active          = currentCategory === category.id ? 'active ' : '';

        return (
            <div role="tabpanel" key={key} className={active + 'tab-pane'}>
                {category.name}
            </div>
        );
    }

    render() {
        let { categories } = this.props;

        return (
            <div className="box box-primary">
                <div className="box-header with-border">
                    <h3 className="box-title">Liste des transactions bancaires</h3>
                </div>
                <div className="box-body no-padding tab-content">
                    {categories.map((category, key) => {
                        return this.renderContent(category, key);
                    })}
                </div>
            </div>
        );
    }
}

CategoriesContent.propTypes = {
    categories: PropTypes.arrayOf(PropTypes.object)
};

reactMixin(CategoriesContent.prototype, ListenerMixin);

export default CategoriesContent;
