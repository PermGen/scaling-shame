<?php 
	/**
	* 
	*/

	use Sefa\Repositories\Article\ArticleRepository as Article;
	use Sefa\Repositories\Category\CategoryRepository as Category;
	use Sefa\Exceptions\Validation\ValidationException;

	class UserArticleController extends BaseController
	{

    protected $article;
    protected $category;

	    public function __construct(Article $article, Category $category) {

	        View::share('active', 'blog');
	        $this->article = $article;
	        $this->category = $category;
	    }

		
		public function showindex(){
			$categories=$this->category->listsperUser();		
			return View::make('frontend.userprofile.post', compact('categories'));
	
		}

		public function showArticlelist(){
			 $articles = $this->article->paginate();
			return View::make('frontend.userprofile.articlelist',compact('articles'));
	
		}

		public function showCategoryList(){
		$categories = $this->category->paginate();
        return View::make('frontend.userprofile.category', compact('categories'));
		}

		public function showCreateCategory(){
		return View::make('frontend.userprofile.createcategory');
		}
	
		

		public function postArticle(){
			try {
	            $this->article->create(Input::all());
	            Notification::success('Article was successfully added');
	            return Redirect::back();
	        }catch (ValidationException $e) {
	            return Redirect::back()->withInput()->withErrors($e->getErrors());
	        }
		}

		public function postStoreCategory(){
			 try {
            $this->category->create(Input::all());
            Notification::success('Category was successfully added');
            return Redirect::back();
       		 } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
       		 }
		}

	}


 ?>