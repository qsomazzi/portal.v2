import HttpService from './../helper/HttpService';
import ApiConstant from './../constant/ApiConstant';
import promiseQ    from 'q';


var PortalApi = {
    getCategories() {
        var deferred = promiseQ.defer();

        HttpService.get(ApiConstant.url.baseUrl + ApiConstant.url.categoriesUrl).then((response) => {
            deferred.resolve({
                categories: response.data
            });
        }).catch((error)=> {
            deferred.resolve({
                categories: []
            });
        });

        return deferred.promise;
    },
    getTransactions(categoryId) {
        var deferred = promiseQ.defer();

        HttpService.get(ApiConstant.url.baseUrl + ApiConstant.url.transactionsUrl + categoryId).then((response) => {
            deferred.resolve({
                transactions: response.data
            });
        }).catch((error)=> {
            deferred.resolve({
                transactions: []
            });
        });

        return deferred.promise;
    }
}


export default PortalApi;
