<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Main;
	
	class MainController extends Controller
	{ 

               private $_total = 0;
 
		public function index() {
			$this->title = 'Список задач';
			
                        $main = new Main; 

                        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
                        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

                        $this->_total = $main->getCountRow()->num_rows;

                    $SortName = '' . htmlentities(file_get_contents("SortName.txt"));
                    $StatusSort = '' . htmlentities(file_get_contents("StatusSort.txt"));
                        $data["SortName"] = $SortName;
                        $data["StatusSort"] = $StatusSort;
                        $data["task"] = $this->getData($main, 3, $page, $links, $SortName, $StatusSort)->data;
                        $data["pagination"] = $this->createLinks(3, $page, $links, 'pagination pagination-lg');

			return $this->render('main/index', $data);
		}

                public function getData($main, $limit = 3, $page = 1, $links, $SortName, $StatusSort) {
                    
                    if ( $limit == 'all' ) {
                         $results = $main->getAll($SortName, $StatusSort);
                    } else {
                         $results = $main->getLimitAll($page, $limit, $SortName, $StatusSort);
                    }


 
                    $result         = new \stdClass();
                    $result->page   = $page;
                    $result->limit  = $limit;
                    $result->total  = $this->_total;
                    $result->data   = $results;
                    //$result->data['links'] = $this->createLinks($limit, $page, $links, 'pagination pagination-lg' ); 

                    return $result;
                }


                public function createLinks($limit = 3, $page, $links, $list_class ) {
                    if ( $limit == 'all' ) {
                        return '';
                    }
                
                    $last       = ceil($this->_total / $limit);
                
                    $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
                    $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
                
                    $html       = '<ul class="' . $list_class . '">';
                
                    $class      = ( $page == 1 ) ? "disabled" : "";
                    $html       .= '<li class="page-item ' . $class . '"><a class="page-link" href="?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
                
                    if ( $start > 1 ) {
                        $html   .= '<li class="page-item"><a href="?page=1">1</a></li>';
                        $html   .= '<li class="page-item disabled"><span>...</span></li>';
                    }
                
                    for ( $i = $start ; $i <= $end; $i++ ) {
                        $class  = ( $page == $i ) ? "active" : "";
                        $html   .= '<li class="page-item ' . $class . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                
                    if ( $end < $last ) {
                        $html   .= '<li class="page-item disabled"><span>...</span></li>';
                        $html   .= '<li><a class="page-link" href="?page=' . $last . '">' . $last . '</a></li>';
                    }
                
                    $class      = ( $page == $last ) ? "disabled" : "";
                    $html       .= '<li class="page-item ' . $class . '"><a class="page-link" href="?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
                
                    $html       .= '</ul>';
                
                    return $html;
                }

	}	