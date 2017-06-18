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
                			<label for="title">标题</label>
                			<input type="text" name="title" class="form-control" placeholder="标题">
                		</div>
                        <div class="form-group">
                            <label for="title">描述</label>
                		      <script id="container" name="body" style="height: 250px" type="text/plain"></script>
                		</div>
                        <select class="js-example-basic-multiple" multiple="multiple">
                             <option value="AL">Alabama</option>
                             <option value="WY">Wyoming</option>
                        </select>
                		<center><button class="btn btn-success " type="submit">发布问题</button></center>
                	</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
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

    $(document).ready(function(){
        $(".js-example-basic-multiple").select2();
    });
    
</script>
 @endsection

@endsection
