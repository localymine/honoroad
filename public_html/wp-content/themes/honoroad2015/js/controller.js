var myapp = angular.module('myapp', []);

myapp.controller('ProductListCtrl', function ($scope) {
    $scope.products = angular.fromJson(vars.product_list);
    //
    $scope.rows = [{}];
    $scope.add_row = function (row) {
        $scope.rows.push({});
    };
    $scope.sub_row = function (row) {
        $scope.rows.splice($scope.rows.indexOf(row), 1);
    };
    //
    $scope.get_product_details = function (row) {
        angular.forEach($scope.products, function (p) {
            if (p.id == row.id) {
                row.image = p.image;
                row.title = p.title;
            }
        });
    };
    //
    $scope.total_products = function(){
        return $scope.rows.length;
    };
});