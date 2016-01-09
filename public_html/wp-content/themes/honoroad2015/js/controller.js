var myapp = angular.module('myapp', []);

myapp.controller('ProductListCtrl', function ($scope) {
    $scope.products = angular.fromJson(vars.product_list);
    //
    $scope.rows = [{}];
    $scope.add_row = function () {
        $scope.rows.push({});
        $scope.count = $scope.count + 1;
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
    $scope.total_products = function () {
        return $scope.rows.length;
    };
    //
    $scope.save_order = function (po) {
        $scope.lastAction = 'save_order';
        console.log($scope.rows)
        console.log(po)
    }
});