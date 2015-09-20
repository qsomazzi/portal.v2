import React, { Component, PropTypes } from 'react';
import Categories from './Categories';


class Money extends Component {
    render() {
        let { categories } = this.props;

        return <Categories categories={categories} />
    }
}

Money.propTypes = {
    categories: PropTypes.arrayOf(PropTypes.object)
};


export default Money;
