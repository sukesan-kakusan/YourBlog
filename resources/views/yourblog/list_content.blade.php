<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Markdown Editor</title>
        <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.4.0/marked.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    </head>
    <body>
        <div id="app">
            <nav>
                <div class="main-nav">
                    <a href="/yourblog/" class="home">YourBlog</a>
                    <div class="search">
                        <form action="/yourblog/articles" method="get">
                            @csrf
                            <input type="text" name="keyword" class="searchForm" placeholder="記事を検索" required>
                        </form>
                    </div>
                    <a href="/yourblog/sortList?id={{$list_id}}" class="myaccount">リストを編集</a>
                </div>
            </nav>
            <div class="main">
                <div class="titleAndSeries">
                    <div class="titleOfSeries">リスト：{{$list_name}}</div>
                    <div class="showArticles">
                        <form action="/yourblog/list_content" method="post" name="deleteform" onsubmit="return disp()">
                            @csrf
                            <input type="hidden" name="list_id" value="{{$list_id}}">
                            @foreach ($articles as $item)
                                <div class ="articleWithButton">
                                    <div class="article" v-on:click="jumpArticle({{$item->article_id }})">
                                        <div class="articleTitle">{{ $item->title }}</div>
                                    </div>
                                    @if(Auth::check())
                                        <!-- input type="hidden" name="article_id" value="{{$item->article_id}}" /-->
                                        <button type="submit" class="deleteButton" name="article_id" value="{{$item->article_id}}">削除</button>
                                    @endif
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        new Vue({
            el:'#app',
            methods:{
                jumpArticle: function(id){
                    var link = "/yourblog/article/" + id;
                    location.href=link;
                }
            }
        })

        function disp(){
            if(window.confirm('この記事をリストから削除しますか?')){
                return true;
            } else{
                window.alert('キャンセルされました');
                return false;
            }
        }

    </script>
</html>
