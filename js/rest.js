/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

var rest;
(function (rest) {
  var modules = require('./modules.json');
  for (var ns in  modules) {
    if (!modules.hasOwnProperty(ns)) {
      continue;
    }
    var lib = require('./lib/' + modules[ns]);
    for (var libAttr in lib) {
      if (!lib.hasOwnProperty(libAttr)) {
        continue;
      }
      rest[libAttr] = lib[libAttr];
    }
  }
})(rest = exports.rest || (exports.rest = {}));

module.exports = rest;
