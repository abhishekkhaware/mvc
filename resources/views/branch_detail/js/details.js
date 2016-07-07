/**
 * Created by abhishek on 6/2/14.
 */
function BranchDetailController($scope,$http){
    $http.get('http://bank.com/branchdetail/showBranchIssuesInJson',{params :{b_id: $('#branchid').val()}}).success(function(details){
        $scope.details=details;
//        console.log($scope.details);
    });
}
