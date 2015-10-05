import React, { Component, PropTypes } from 'react';
import { ListenerMixin }               from 'reflux';
import reactMixin                      from 'react-mixin';
import CategoriesActions               from './../action/CategoriesActions';
import CategoriesStore                 from './../store/CategoriesStore';
import CategoriesList                  from './CategoriesList';
import CategoryContent                 from './CategoryContent';



class Money extends Component {
    componentDidMount() {
        this.listenTo(CategoriesStore, this.onCategoriesUpdate);
    }

    componentWillMount() {
        this.onCategoriesUpdate();
    }

    onCategoriesUpdate() {
        this.setState({
            currentCategory: CategoriesStore.currentCategory(),
            transactions: CategoriesStore.getTransactions(),
            categories: CategoriesStore.getCategories()
        });
    }

    render() {
        let { categories, currentCategory, transactions } = this.state;

        return (
            <div className="categories clearfix row">
                <nav className="collapse">
                    <a href="" className="btn btn-primary btn-block margin-bottom add-entry"><i className="fa fa-plus-circle"></i> Add</a>
                    <CategoriesList currentCategory={currentCategory} categories={categories} />
                </nav>
                <div className="box box-primary category-content">
                    <div className="box-header with-border">
                        <h3 className="box-title">{currentCategory.name}</h3>
                    </div>
                    <div className="box-body no-padding">
                        <CategoryContent transactions={transactions} />
                    </div>
                </div>
            </div>
        );
    }
}

reactMixin(Money.prototype, ListenerMixin);


export default Money;
