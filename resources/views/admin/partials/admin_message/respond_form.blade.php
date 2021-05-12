@extends('admin.master')
@section('adminContent')



<div class="box">

    <div class="container-fluid">
        <form action="{{ route('adminMessageRespond') }}" id="response" method="POST">
            {{ csrf_field() }}

            <h4> @lang('Enter response to') {{ $admin_message->name }}@lang(', through this form:')</h4>
            <!--<h1> @lang('Enter response to :name, through this form:', ['name' => $admin_message->name])</h1>-->
            <textarea rows="4" cols="50" name="text" form="usrform">@lang('Enter text here...')</textarea>
            <div ><input type="submit"></div>
            

        </form>
    </div>

</div>



<!-- /.row -->

@endsection