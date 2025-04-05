<?php
class ReviewAdminController {
    private $dashboardUser;

    public function __construct() {
        $this->dashboardUser = new DashboardUser();
    }

    public function listReviews() {
        $dashboardUser = new DashboardUser();
    
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $reviews = $dashboardUser->getReviewsByProduct($product_id);
        } else {
            $reviews = $dashboardUser->getAllReviews();
        }
    
        include 'app/Views/Admin/ReviewList.php';
    }
    
    public function deleteReview() {
        if (isset($_GET['review_id'])) {
            $review_id = $_GET['review_id'];
            $dashboardUser = new DashboardUser();
            $dashboardUser->deleteReview($review_id);
            header("Location: ?role=admin&act=list-reviews");
            exit;
        }
    }
}