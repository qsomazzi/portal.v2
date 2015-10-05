import React, { Component, PropTypes } from 'react';


class CategoryContent extends Component {
    render() {
        let { transactions } = this.props;

        console.log(transactions);

        let transactionsList = transactions.map((transaction, key) => {
            return (
                <tr key={key}>
                    <td>{transaction.id}</td>
                    <td>{transaction.date}</td>
                    <td>{transaction.intitule}</td>
                    <td>{transaction.description}</td>
                    <td>{transaction.note}</td>
                    <td>{transaction.price}</td>
                </tr>
            );
        });

        return (
            <table className="table table-hover table-striped">
                <tbody>
                    {transactionsList}
                </tbody>
            </table>
        );
    }
}

CategoryContent.propTypes = {
    transactions: PropTypes.array.isRequired
}


export default CategoryContent;
