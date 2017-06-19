@extends('layouts.app')

@section('content')
@include('vendor.ueditor.assets')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">发布问题</div>

                <div class="panel-body">
                	<form action="/questions" method="post">
                		{!! csrf_field() !!}
                		<div class="form-group">
                			<label for="title">标题:</label>
                			<input type="text" name="title" class="form-control" placeholder="标题">
                		</div>

                        <div class="form-group">
                            <label for="topic">话题:</label>
                            <select name="topics[]"  id="js-example-basic-multiple" multiple="multiple" class="form-control">
                                @foreach($topics as $key => $topic)
                                    <option value="{{ $key }}">{{ $topic }}</option>
                                @endforeach
                            </select>
                            <select name="" id="" class="js-data-example-ajax form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="body">描述:</label>
                            <script id="container" name="body" style="height: 250px" type="text/plain"></script>
                        </div>
                		<center><button class="btn btn-success " type="submit">发布问题</button></center>
                	</form>
					
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 实例化编辑器 -->

<script type="text/javascript">
    var ue = UE.getEditor('container',{
    toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'attachment', 'insertimage','fullscreen']
        ],
    elementPathEnabled: false,
    enableContextMenu: false,
    autoClearEmptyNode:true,
    wordCount:false,
    imagePopup:false,
    autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>

$(document).ready(function(){
    $("#js-example-basic-multiple").select2({});  
    function formatTopic (topic) {

        return '<div class="select2-result-repository clearfix">' +
        '<div class="select2-result-repository_meta">' +
        '<div class="select2-result-repository_title">' +
        topic.name ? topic.name : "Laravel" +
        '</div></div></div>';
    }

    function formatTopicSelection (topic) {
        return topic.name || topic.text;
    }

    $(".js-data-example-ajax").select2({
        tags:true,
        placeholder:'选择相关话题',
        minimumInputLength: 1,
        ajax: {
            url: "／api/topics",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                };
            },
            processResults: function (data, params) {
            // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        templateResult: formatTopic, // omitted for brevity, see the source of this page
        templateSelection: formatTopicSelection // omitted for brevity, see the source of this page  

    });
  });       
</script>


@endsection
