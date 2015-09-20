import path from 'path';


var basePaths = {
  root: path.resolve(process.cwd())
};

basePaths.src = path.resolve(basePaths.root + '/src');
basePaths.dest = path.resolve(basePaths.root + '/../public');
basePaths.reports = path.resolve(basePaths.root + '/reports');


export default basePaths;
