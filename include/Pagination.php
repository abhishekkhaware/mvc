<?php /**
* 
*/
class Pagination
{
	public $current_page;
	public $per_page;
	public $total_page;
	function __construct($page=1,$per_page=5,$total_page=0) {
		$this->current_page = (int)$page;
		$this->per_page = (int)$per_page;
		$this->total_page = (int)$total_page;
	}
	public function offset()
	{
		return ($this->current_page - 1) * $this->per_page;
	}
	public function totalPages()
	{
		return ceil($this->total_page/$this->per_page);
	}
	public function prevPage()
	{
		return $this->current_page -1;
	}
	public function nextPage()
	{
		return $this->current_page +1;
	}
	public function hasNextPage()
	{
		return $this->nextPage() <= $this->totalPages() ? TRUE : FALSE;
	}
	public function hasPrevPage()
	{
		return $this->prevPage() >=1 ? TRUE :FALSE;
	}
    public function createPaginationArea(Pagination $pagination,$page)
    {
        $area="<ul class='pagination' >";
        if ($pagination->totalPages() > 1) {
            if ($pagination->hasPrevPage()) {

                $area.="<li>".link_to(URL.$_GET['url']," &laquo;",array('page'=>$pagination->prevPage()))."</li>";
            }
            for ($i=1; $i <= $pagination->totalPages(); $i++) {
                if ($i==$page) {
                    $area.="<li><a>{$i}</a> </li>";
                }else{

                    $area.="<li>".link_to(URL.$_GET['url'],$i,array('page'=>$i))."</li>";
                }
//                $area.="<li>".link_to(URL.$_GET['url'],$i,array('page'=>$i))."</li>";
            }

            if ($pagination->hasNextPage()) {

                $area.="<li>".link_to(URL.$_GET['url'],"&raquo;",array('page'=>$pagination->nextPage()))."</li>";
            }
        }
        $area.="</ul>";
        return $area;
    }

}