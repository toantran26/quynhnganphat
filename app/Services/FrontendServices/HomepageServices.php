<?php


namespace App\Services\FrontendServices;

use App\Repository\Frontend\Contracts\HomepageRepositoryInterface as Homepage;

class HomepageServices
{
    protected $_homepage;

    public function __construct(Homepage $homepage)
    {
        $this->_homepage = $homepage;
    }

    public function getListBanner()
    {
        return $this->_homepage->getListBanner();
    }

    public function getListPartner()
    {
        return $this->_homepage->getListPartner();
    }

    public function getPostHomePages()
    {
        return $this->_homepage->getPostNews();
    }

    public function getTopNews()
    {
        return $this->_homepage->getTopNews();
    }

    public function getScientificPost()
    {
        return $this->_homepage->getScientificPost();
    }

    public function getCourseHome()
    {
        return $this->_homepage->getCourseHome();
    }
    public function search($request) {

        return $this->_homepage->search($request);
    }
    public function countSeach($request) {
        return $this->_homepage->countSeach($request);
    }

    public function getListPage() {
        return $this->_homepage->getPageHomepage();
    }

}
