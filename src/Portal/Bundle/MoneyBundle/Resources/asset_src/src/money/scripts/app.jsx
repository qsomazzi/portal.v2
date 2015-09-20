import React from 'react';
import Money from './components/Money'; // eslint-disable-line no-unused-vars

const container  = document.getElementById('money-app');
const categories = JSON.parse(container.getAttribute('data-categories'));

React.render(
    <Money
      categories={categories} />, // eslint-disable-line no-undef
    container
);
