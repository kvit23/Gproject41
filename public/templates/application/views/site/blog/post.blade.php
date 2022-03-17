@extends($templateLayout)

@section('page-title',$blogPost->title)

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4  border-bottom">
                @lang('site.blog')
            </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-0">
                        <li class="breadcrumb-item"><a href="#">@lang('site.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog') }}">@lang('site.blog')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blogPost->title }}</li>
                    </ol>
                </nav>


                 <div class="blog-post">
                    <h2 class="blog-post-title">{{ $blogPost->title }}</h2>
                    <p class="blog-post-meta">{{  \Carbon\Carbon::parse($blogPost->publish_date)->format('d M, Y') }}
                        @if($blogPost->user()->exists())
                            @lang('site.by') <a href="#">{{ $blogPost->user->name }}</a>
                        @endif
                    </p>

                    @if(!empty($blogPost->cover_photo))
                        <img src="{{ asset($blogPost->cover_photo) }}" class="img-fluid img-thumbnail" >
                    @endif

                    <p class="int_hpw">
                        {!! clean( $blogPost->content ) !!}
                    </p>


                     @if(!empty(setting('general_disqus_shortcode')))
                         <div class="comments-area">
                             <script  type="text/javascript">
"use strict";
                                 /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                 var disqus_shortname = '{{ setting('general_disqus_shortcode') }}'; // required: replace example with your forum shortname

                                 /* * * DON'T EDIT BELOW THIS LINE * * */
                                 (function () {
                                     var s = document.createElement('script'); s.async = true;
                                     s.type = 'text/javascript';
                                     s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                                     (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                                 }());
                             </script>
                         </div>
                     @endif



                </div><!-- /.blog-post -->

        </div>
        <div class="col-md-4">
            <div class="p-4 mb-3 bg-light rounded">
                <form method="get" action="{{ route('blog') }}">
                    <input class="form-control rounded" type="text" name="q" placeholder="@lang('site.search')"/>
                </form>
            </div>

            <div class="p-4">
                <h4>@lang('site.categories')</h4>
                <ol class="list-unstyled mb-0">
                    @foreach($categories as $category)
                        <li><a href="{{ route('blog') }}?category={{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach

                </ol>
            </div>

        </div>
    </div>


@endsection
