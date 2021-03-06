<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Page</title>
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.4.0/marked.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    </head>
    <body>
        <div id="app">
            <nav>
                <div class="main-nav">
                    <div class="home">blog</div>
                    <a href="/yourblog/editor" class="myaccount">記事を書く</a>
                    <a href="/yourblog/articles" class="myaccount">記事一覧</a>
                    <a href="/yourblog/lists" class="myaccount">リスト一覧</a>
                    <div class="search">
                        <form action="/yourblog/articles" method="get">
                            @csrf
                            <input type="text" name="keyword" class="searchForm" placeholder="記事を検索" required>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="main">
                <div class="accountInfo">
                    <div class="profile-topic">
                        <div class="profile">
                            <p class="trim-image-to-circle">

                            </p>
                            <div class="username">
                                {{$items['username']}}
                            </div>
                            <div class="articleInfo">
                                投稿：{{$items['articleNum']}}件
                            </div>
                        </div>
                        <div class="topic">
                            <div class="description">関連する話題:</div>
                            @foreach ($items['tagArray'] as $tag)
                            <div class="tag" v-on:click="searchWithTag('{{ $tag }}');">
                                {{ $tag }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="articles">
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                    </div>
                    <div class="articles">
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                    </div>
                    <div class="articles">
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                        <div class="article"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        new Vue({
            el:'#app',
            methods:{
                searchWithTag: function(id){
                    var link = "/yourblog/articles?tag=" + id;
                    location.href=link;
                }
            }
        })
    </script>
</html>
