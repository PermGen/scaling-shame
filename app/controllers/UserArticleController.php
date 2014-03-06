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
			$messages=Message::where('from','=',Sentry::getUser()->id)
			->where('is_seen','=','0')
			->orderBy('is_seen')
			->get();		
			return View::make('frontend.userprofile.post', compact('categories'))->
			with('messages',$messages);
	
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

		public function showConfirmDelete($id){
         $category = $this->category->find($id);
         
		return View::make('frontend.userprofile.deleteArticle',compact('category'));
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

		public function editArticle($id) {

        $article = $this->article->find($id);
        $tags = null;

        foreach ($article->tags as $tag) {
            $tags .= ',' . $tag->name;
        }

        $tags = substr($tags, 1);
        $categories = $this->category->lists();
        return View::make('frontend.userprofile.articleEdit', compact('article', 'tags', 'categories'));
        }

        public function updateArticle($id) {

        try {
            $this->article->update($id, Input::all());
            Notification::success('Article was successfully updated');
            return Redirect::to('articleList');
        } catch (ValidationException $e) {

            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

        public function deleteArticle($id){
         $this->article->destroy($id);
        Notification::success('Article was successfully deleted');
        return Redirect::to('/');
        }

        public function showArticle($id){

        $article = $this->article->find($id);
        return View::make('frontend.userprofile.myarticle', compact('article'));
        }
    


	}


 ?>