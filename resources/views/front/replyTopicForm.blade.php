<div class="post">
    {!!Form::open(['route'=>'message.store', 'method'=>'POST', 'id' => 'formNewMessage','class' => 'form newtopic'])!!}
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    {{ Html::image('/uploads/avatars/'.$topic->user->avatar, 'a picture', array('style'=> 'width:37px')) }}
                    @if($activities->contains('user_id',$topic->user->id))
                    <div class="status green">&nbsp;</div>
                    @else
                    <div class="status red">&nbsp;</div>
                    @endif
                </div>
            </div>
            <div class="posttext pull-left">
                <div class="textwraper">
                    <div class="postreply">Post a Reply</div>
                     {{ Form::textarea('body', null, ['id' => 'textAreaMessage' ,'class' => 'form-control', 'placeholder' => 'Type your message here', 'required']) }}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="postinfobot">
            <div class="pull-right postreply">
                <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    {{ Form::hidden('user_id', Auth::user()->id) }}
    {{ Form::hidden('ownerTopic_id', $topic->user->id) }}
    {{ Form::hidden('topico_id', $topic->id) }}

    {!!Form::close()!!}

</div>


<script>

    

    $('.quote').click(function(event){
        var topicid = $(this).attr("data-targetId");
        var value = $( "div.posttext[data-messageid" + "='" + topicid + "']" ).html();
        aux = value.replace('<p>','');
        value = aux.replace("</p>",'');
        aux = value.replace('<span class="original">',"[b]");
        value = aux.replace("</span>","[/b]");
        if(topicid.includes("<blockquote>")){
            var aux = value.replace("<blockquote>","[quote]");
            value = aux.replace("</blockquote>","[/quote]");
        }else{
            var str = '[quote]'+value+'[/quote]';
        }

        $('#textAreaMessage').text(str);
        $('html, body').animate({
                scrollTop: $("#formNewMessage").offset().top
            }, 1000);
    });
</script>