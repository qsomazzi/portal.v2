'use strict';

var Request = require('superagent');
var promiseQ = require('q');

/**
 * Wrapper for harmonise Xhr request on all modules. Use superagent and promise Q.
 * @type {{get: Function, post: Function, put: Function, del: Function}}
 */
var HttpService = {
    /**
     * Wrapper for Xhr GET request
     *
     * @param {string} url Path for request
     * @param {object} data Object param sent to request
     *
     * @returns {Promise} es6 promise
     */
    get(url, data) {
        return this._call('get', url, data);
    },
    /**
     * Wrapper for Xhr GET request
     *
     * @param {string} url Path for request
     * @param {object} headers
     * @param {object} data Object param sent to request
     *
     * @returns {Promise} es6 promise
     */
    getWithHeaders(url, headers, data) {
        return this._callWithHeaders('get', url, headers, data);
    },
    /**
     * Wrapper for Xhr POST request
     *
     * @param {string} url Path for request
     * @param {object} data Object param sent to request
     *
     * @returns {Promise} es6 promise
     */
    post(url, data) {
        return this._call('post', url, data);
    },
    /**
     * Wrapper for Xhr POST request
     *
     * @param {string} url Path for request
     * @param {object} data that contains headers
     * @param {object} data Object param sent to request
     *
     * @returns {Promise} es6 promise
     */
    postWithHeaders(url, headers, data) {
        return this._callWithHeaders('post', url, headers, data);
    },
    /**
     * Wrapper for Xhr PUT request
     *
     * @param {string} url Path for request
     * @param {object} data param sent to request
     *
     * @returns {Promise} es6 promise
     */
    put(url, data) {
        return this._call('put', url, data);
    },
    /**
     * Wrapper for Xhr DELETE request
     *
     * @param {string} url Path for request
     * @param {object} data Params sent to request
     *
     * @returns {Promise} es6 promise
     */
    del(url, data) {
        return this._call('del', url, data);
    },
    _call(method, url, data) {
        var deferred = promiseQ.defer();

        Request[method](url, data)
          .end((error, response) => {
              if (error) {
                  deferred.reject({
                      status: error.status,
                      header: response.header
                  });
              } else {
                  deferred.resolve({
                      status: response.status,
                      header: response.header,
                      data:   response.body
                  });
              }
          });

        return deferred.promise;
    },
    _callWithHeaders(method, url, headers, data) {
        var deferred = promiseQ.defer();

        Request[method](url, data)
            .set(headers)
            .end((error, response) => {
                if (error) {
                    deferred.reject({
                        status: error.status,
                        header: response.header
                    });
                } else {
                    deferred.resolve({
                        status: response.status,
                        header: response.header,
                        data:   response.body
                    });
                }
            });

        return deferred.promise;
    }
};

module.exports = HttpService;
