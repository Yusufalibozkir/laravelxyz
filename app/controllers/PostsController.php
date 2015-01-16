<?php
class PostsController extends BaseController{

    public function singlePost(Posts $post)
    {
        $comments = Comments::where('post_id','=',$post['id'])->where('validated', '=', '1')->get();

        return View::make('singlePost')->with('thePost', $post)->with('theComments', $comments);
    }

    public function listPosts(){
        return View::make('posts',['thePosts'=> Posts::paginate(5)]);
    }

    public function recordComment($post_id){

        // You better check here again..
        $data = Posts::findOrFail($post_id);

        if(strlen(Input::get('yorum'))<10){
            return Redirect::back()->with('commentSentMessage', 'Bir yorum en az 10 harften oluşmalı. Lütfen tekrar bir yorum giriniz.');
        }

        $comment = new Comments;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;
        $comment->content = Input::get('yorum');
        $comment->validated = 0;
        if ($comment->save()) {
            return Redirect::back()->with('commentSentMessage', 'Teşekkürler! Yorumunuz onaylandıktan sonra gösterilecektir.');
        }
    }

}