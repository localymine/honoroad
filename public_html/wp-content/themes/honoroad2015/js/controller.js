var myapp = angular.module('myapp', []);

myapp.controller('ProductListCtrl', function ($scope) {
    $scope.products = angular.fromJson(vars.product_list);
    //
    $scope.orderProp = 'id';
});