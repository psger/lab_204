@foreach($replays as $repaly)
<li>
    <!-- begin media -->
    <div class="media" style="margin-left: 40px">
        <img src="{{url($repaly->user->avatar)}}" alt="" />
        @if($repaly->user->id == 0)
        <span class="label label-inverse">普通用户</span>
            @else
            <span class="label label-inverse">管理员</span>
            @endif
    </div>
    <!-- end media -->

    <!-- begin info-container -->
    <div class="info-container" style="margin-left: 120px;padding-bottom: 20px;">
        <div class="post-user"><a href="{{route('user.page',$repaly->user->id)}}">{{$repaly->user->name}}</a> <small>SAYS</small></div>
        <div class="post-content">
            {{ $repaly->content }}
        </div>
        <div class="post-time">{{ $repaly->created_at }}</div>

        <span class="operate fa-pull-right" >
        <a class="comment-vote" data-ajax="post" id="reply-up-vote-17240" href="javascript:void(0);" data-url="https://laravel-china.org/replies/17240/vote" title="点赞">
            <i class="fa fa-thumbs-o-up" style="font-size:14px;"></i> <span class="vote-count">10</span>
        </a>
        <span>·</span>
        <a class="fa fa-reply" href="javascript:void(0)" onclick="replyOne('{{$repaly->user->name}}');" title="回复{{$repaly->user->name}}"></a>
        </span>
    </div>
    <!-- end info-container -->
</li>
    @endforeach

