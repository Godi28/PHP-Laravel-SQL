<?php

// facades for the program
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/** get route for home page that uses a function which selects 5 data entries from the Articles Table
 *  in the database ordered by the creation date and then plucks the article content, titles and 
 *  creation dates. All the paragraphs and grouped titles are then sent through the view to the home
 *  blade.
 *
 *  @access private
 *  @author Ogodiseng Sehoole
 */
Route::get('/', function () {
    
    // selected data entries from the Articles Table
    $articles = DB::table('Articles')->orderBy('creation_date', 'DESC')->paginate(5);
    // all selected article content
    $all_content = $articles->pluck('content');
    // all selected article titles
    $titles = $articles->pluck('titles');
    // all selected article creation dates
    $dates = $articles->pluck('creation_date');
    
    /** Nested function which selects only the first paragraph of the plucked article content.
     *
     *  @access private
     *  @author Ogodiseng Sehoole
     *  @param $content string selected article content
     **/
    function get_first_paragraph($content) {
        
        // changing article content to include html tags
        $to_html=nl2br($content);
        // position in string where there is a line break
        $break_position = strpos($to_html,"<br>");
        // selecting first paragraph
        $first_paragraph = substr($content,0,$break_position);
        
        // returing first paragraph
        return $first_paragraph;
    }
    
    /* indexing content array that has all article content to get each of the 5 latest and calling
     * get first paragraph function for each to get their respective first paragraphs
     **/   
    $content1= $all_content[0];
    $paragraph1 = get_first_paragraph($content1);
    $content2= $all_content[1];
    $paragraph2 = get_first_paragraph($content2);
    $content3= $all_content[2];
    $paragraph3 = get_first_paragraph($content3);
    $content4= $all_content[3];
    $paragraph4 = get_first_paragraph($content4);
    $content5= $all_content[4];
    $paragraph5 = get_first_paragraph($content5);
    
    /* returning view and passing titles and dates array and each article's first paragraph to the
     * home blade**/
    return view('home',compact('titles','paragraph1','paragraph2','paragraph3','paragraph4',
        'paragraph5','dates'));    
});

    /* get route with a title variable that has a function that uses title as a paramter to get
     * linked data entries from Articles, Tags and Categories Tables 
     * 
     * @access private
     * @author Ogodiseng Sehoole 
     * @param $title string the article title 
     **/
Route::get('full-article/{titles}', function ($title) {
    
    // linked entries from Articles and Categories Tables selected based on the title
    $article_category_linked_data = DB::table('Articles')->where('titles',$title)
    ->join('Categories', 'articles_id', '=', 'categories_id')
    ->get();
    // linked entries from Articles and Tags Tables selected based on the title
    $article_tag_linked_data = DB::table('Articles')->where('titles',$title)
    ->join('Tags', 'articles_id', '=', 'tags_id')
    ->get();
    
    /* returning view and passing linked entries from Articles, Tags and Categories Tables to
     *  article view page blade
     **/
    return view('article',compact('article_category_linked_data','article_tag_linked_data'));

});

/* get route with id variable that has a function that uses id as a paramter to get linked 
 * data entries from Articles, Tags and Categories Tables 
 * 
 * @access private
 * @author Ogodiseng Sehoole 
 * @param $id int the article id
 **/
Route::get('/article/{id}', function ($id) {
    
    /* control structure with condition that the id has no match in the table that throws an
     *  HTTPException
     **/
    if($id == null){
        abort(404);
    }
    
    // linked entries from Articles and Categories Tables selected based on the id   
    $article_category_linked_data = DB::table('Articles')->where('articles_id',$id)
    ->join('Categories', 'articles_id', '=', 'categories_id')
    ->get();
    // linked entries from Articles and Tags Tables selected based on the id 
     $article_tag_linked_data = DB::table('Articles')->where('articles_id',$id)
    ->join('Tags', 'articles_id', '=', 'tags_id')
    ->get();
     
    /* control structure with condition that no data was returned from the Category Table that
     * throws an HTTPException
     **/
    if($article_category_linked_data->isEmpty()){
        abort(404);
    }
    
   /* returning view and passing linked entries from Articles, Tags and Categories Tables to
    *  article view page blade
    **/
    return view('article',compact('article_category_linked_data','article_tag_linked_data'));

});

/* get route with a slug variable and a function that uses it as a paramater to get linked
 * entries from Articles and Categories Tables
 **/
Route::get('/category/{slug}', function ($slug) {
    
    /* control structure with condition that the slug has no match in the table that throws an
     * HTTPException
     **/
    if($slug == null){
        abort(404);
    }
    
    // removing hyphen from slug string
    $category= str_replace('-', ' ', $slug);
    // linked entries from Articles and Categories Tables selected based on the slug
    $category_article = DB::table('Articles')
    ->join('Categories', 'articles_id', '=', 'categories_id')
    ->where('categories',$category)
    ->get();
    
    // plucked titles array seperated by breaklines
    $title = $category_article->pluck('titles')->implode('<br>');
    // plucked category
    $category = $category_article->pluck('categories');
    
   /* control structure with condition that no data was returned from the databse that throws
    * an HTTPException
    **/
    if($category_article->isEmpty()){
        abort(404);
    }
    
    /* returning view and passing linked entries from Article,and Categories Tables to
     *  category blade
     **/
     return view('category',compact('title','category'));

});

/* get route with a slug variable and a function that uses it as a paramater to get linked
 * entries from Articles and Tags Tables
 **/
Route::get('/tag/{slug}', function ($slug) {
    
    /* control structure with condition that the slug has no match in the table that throws an
     * HTTPException
     **/
    if($slug == null){
        abort(404);
    }
    
    // removing hyphen from slug string
    $tag= str_replace('-', ' ', $slug);
    // linked entries from Articles and Tags Tables selected based on the slug
    $tag_article_linked_data = DB::table('Articles')
    ->join('Tags', 'articles_id', '=', 'tags_id')
    ->where('tags',$tag)
    ->get();
    
     // plucked titles array seperated by breaklines
      $title = $tag_article_linked_data->pluck('titles')->implode('<br>');
     // plucked tags
     $tag = $tag_article_linked_data->pluck('tags');
     
     /* control structure with condition that no data was returned from the databse that throws
      * an HTTPException
      **/
      if($tag_article_linked_data->isEmpty()){
        abort(404);
      }
      
    /* returning view and passing linked entries from Article,and Tags Tables to
     *  tag blade
     **/
     return view('tag',compact('title','tag'));

});

/* get route with a subsection variable that has a function that uses it as a paramater
 * to show the right legal page
 *
 * @access private
 * @author Ogodiseng Sehoole
 * @param $subsection string privacy or terms of use sections
 **/
Route::get('/legal/{subsection}', function($subsection){
    
    // returning view and passing chosen subsection to legal blade
    return view('legal', ['subsection'=>$subsection]);
// condition to ensure only privacy and terms of use options can be chosen    
})->where('subsection', '(tou|privacy)');

 // get route for search that routes to search blade
 Route::get('/search', function () {
     
    return view('search');
 });
 
/* get route with a function that uses get request data from the search page to retrieve
 * relevant table entries and pass those entries to respective view pages 
 * 
 * @access private
 * @author Ogodiseng Sehoole
 **/
Route::get('/redirect', function () {
    
   /* control structures to check if id,tag or category is set that redirects to article,
    * tag or category pages**/
    if (isset($_GET['id_search']) ){ 
        
        // user entered id for search
        $id = $_GET['id_search'];        
        // linked entries from Articles and Categories Tables selected based on the id
        $article_category_linked_data = DB::table('Articles')->where('articles_id',$id)
        ->join('Categories', 'articles_id', '=', 'categories_id')
        ->get();
        // linked entries from Articles and Tags Tables selected based on the id
        $article_tag_linked_data = DB::table('Articles')->where('articles_id',$id)
        ->join('Tags', 'articles_id', '=', 'tags_id')
        ->get();
        
        /* returning view and passing linked entries from Articles, Tags and Categories Tables to
         *  article view page blade
         **/
        return view('article',compact('article_category_linked_data','article_tag_linked_data'));
        
    }elseif(isset($_GET['tag_search']) ){
        
        // user entered tag for search
        $tag = $_GET['tag_search'];
        
        // linked entries from Articles and Tags Tables selected based on entered tag
        $tag_article_linked_data = DB::table('Articles')
        ->join('Tags', 'articles_id', '=', 'tags_id')
        ->where('tags',$tag)
        ->get();
        
        // plucked titles array seperated by breaklines
        $title = $tag_article_linked_data->pluck('titles')->implode('<br>');
        // plucked tags
        $tag = $tag_article_linked_data->pluck('tags');
        
        /* returning view and passing linked entries from Article,and Tags Tables to
         *  tag blade
         **/
        return view('tag',compact('title','tag'));
        
    }elseif (isset($_GET['category_search'])){
        
        // user entered category for search
        $category = $_GET['category_search'];
        // linked entries from Articles and Categories Tables selected based on the entered catogory
        $category_article = DB::table('Articles')
        ->join('Categories', 'articles_id', '=', 'categories_id')
        ->where('categories',$category)
        ->get();
        
        // plucked titles array seperated by breaklines
        $title = $category_article->pluck('titles')->implode('<br>');
        // plucked category
        $category = $category_article->pluck('categories');
        
        /* returning view and passing linked entries from Article,and Categories Tables to
         *  category blade
         **/
        return view('category',compact('title','category'));
    }
});

/* get route with a function that links to the about blade 
 *
 * @access private
 * @author Ogodiseng Sehoole
 **/
Route::get('/about', function () {

    return view('about');
});

//EOF
                