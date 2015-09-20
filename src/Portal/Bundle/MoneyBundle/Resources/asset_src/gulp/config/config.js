import path      from 'path';
import basePaths from './basePaths';


var config = {

    modules: {
        "money": {
            root: basePaths.src + '/money',
            dest: basePaths.dest,
            scripts: {
                index: basePaths.src + '/money/scripts/app.jsx',
                src: basePaths.src + '/money/scripts/**/*.{js,jsx}',
                dest: basePaths.dest + '/money/js'
            },
            styles: {
                index: basePaths.src + '/money/styles/main.scss',
                src: basePaths.src + '/money/styles/**/*.scss',
                dest: basePaths.dest + '/money/css'
            }
        }
    },

    dependencies: {
        list: ['react', 'react-router', 'reflux', 'q', 'react-bootstrap'],
        dest: basePaths.dest + '/vendor'
    }
};


export default config;
