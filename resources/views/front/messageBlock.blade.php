@inject('appfunction', 'App\AppFunction')

<div class="row">
    <div class="col-md-8">
        <div style="text-align: center;">
            {{ $messages->links() }}
        </div>
    </div>
    <div class="col-md-4">
    @if($showSelectMessageByPage)
    <div class="col-lg-12 col-md-12" id="selecMessagePerPage" style="padding-right: 0px;">
        <form action="{{ url('topic/'.$topic->id) }}" class="form newtopic">
            <label for="">Topics per page</label>
            <select name="selectMessageByPage" class="form-control" onchange="this.form.submit();">
                <option value="" disabled="" selected="">Messages per page</option>
                <option value="10">10 Messages</option>
                <option value="20">20 Messages</option>
                <option value="50">50 Messages</option>
                <option value="100">100 Messages</option>
                <option value="00">All Messages</option>
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    @endif
</div>
</div>


@foreach($messages as $message)

    <div class="post">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    {{ Html::image('/uploads/avatars/'.$message->user->avatar, 'a picture', array('style'=> 'width:37px')) }}
                    @if($activities->contains('user_id',$message->user->id))
                        <div class="status green">&nbsp;</div>
                    @else
                        <div class="status red">&nbsp;</div>
                    @endif
                </div>
            </div>
            <div class="posttext pull-left" data-messageId="{{$message->id}}" id="{{$message->id}}">
                <span class="original">{{ $message->user->name }}</span>
                <p><?php echo $message->body; ?></p>
            </div>
            <div class="clearfix"></div>
        </div>                              
        <div class="postinfobot">

            <div class="likeblock pull-left">
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>55</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
            </div>

            

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on :  {{ $appfunction->dateToString($message->created_at) }}</div>

            <div class="next pull-right">
                <button class="quote btn btn-primary" data-targetId="{{$message->id}}">Quote</button>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    

@endforeach

<div class="row">
    <div class="col-md-12">
        <div style="text-align: center;">
            {{ $messages->links() }}
        </div>
    </div>
</div>

