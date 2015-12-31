$(function () {
    console.log('111111111111111111111111');

    console.log(vars);
    console.log(vars.product_list);
});

var product_list = vars.product_list;

var myapp = angular.module('myapp', []);

myapp.controller('ProductListCtrl', function ($scope) {
    $scope.products = [{"title":"Yummy Yummy Oil","image":"http:\/\/honoroad.localhost\/wp-content\/uploads\/2015\/11\/SP-Yummy-Full-150x150.png"},{"title":"Sizzle","image":"http:\/\/honoroad.localhost\/wp-content\/uploads\/2015\/11\/SP-Sizzle-1-150x150.png"},{"title":"Yummy","image":"http:\/\/honoroad.localhost\/wp-content\/uploads\/2015\/11\/SP-Yummy-150x150.png"},{"title":"Yummy","image":"http:\/\/honoroad.localhost\/wp-content\/uploads\/2015\/11\/SP-Yummy-150x150.png"},{"title":"Golden Seal","image":"http:\/\/honoroad.localhost\/wp-content\/uploads\/2015\/11\/SP-Golden-Seal-1-150x150.png"}];
});