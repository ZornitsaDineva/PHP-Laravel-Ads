@extends('site.master')
@section('siteContent')
<!-- ad post form -->
<section id="main" class="clearfix ad-details-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.html">@lang('Home')</a></li>
                <li>@lang('Ad Post')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('Post Your Ad')</h2>
        </div><!-- banner -->

        <div class="adpost-details">
            <div class="row">	
                <div class="col-md-8">
                    <!--{!! Form::open(['class' => 'new-post-form', 'url' => 'post-ad/submit','method' => 'post']) !!}-->
                    <fieldset>
                        <div class="section postdetails">
                            <h4>@lang('Sell an item or service') <span class="pull-right">* @lang('Mandatory Fields')</span></h4>
                            <div class="form-group selected-product">                                
                                {!! Form::hidden('subcategory_id', null, ['id' => 'category-selector-value']) !!}
                                <ul class="select-category list-inline">
                                    <li>
                                        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#">
                                            <span class="select" >
                                                <img id="category-selector-image" src='{{asset("images/category/gift_item.png")}}' alt="Images" class="img-responsive">
                                            </span>
                                            <span id="category-selector-parent">@lang('Please Select')</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#" id="category-selector-text"> @lang('Please Select Category') </a>
                                    </li>
                                </ul>
                                <a class="edit" data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#" id="category-selector-text"><i class="fa fa-pencil"></i>@lang('Edit')</a>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3">@lang('Type of ad')<span class="required">*</span></label>
                                <div class="col-sm-9 user-type">
                                    <input type="radio" name="ad_type" value="newsell" id="newsell"> <label for="newsell">@lang('I want to sell')</label>
                                    <input type="radio" name="ad_type" value="newbuy" id="newbuy"> <label for="newbuy">@lang('I want to buy')</label>	
                                </div>
                            </div>
                            <div class="row form-group add-title">
                                <label class="col-sm-3 label-title">@lang('Title for your Ad')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::text('ad_title', null , ['class' => 'form-control', 'autofocus' => 'true' ,  "placeholder" => "ex: Sony Xperia dual sim 100% brand new" ]) !!}
                                </div>
                            </div>
                            <div class="row form-group add-image">
                                <label class="col-sm-3 label-title">@lang('Photos for your ad') <span>(@lang('This will be your cover photo'))</span> </label>
                                <div class="col-sm-9">
                                    <form id="upload" method="post" action="{{url('upload.php')}}" enctype="multipart/form-data">
                                        <div id="drop">
                                            Drop Here

                                            <a>Browse</a>
                                            <input type="file" name="upl" multiple />
                                        </div>

                                        <ul>
                                            <!-- The file uploads will be shown here -->
                                        </ul>

                                    </form>                                 
                                </div>
                                @push('styles')

                                <!-- The main CSS file -->
                                <link href="{{asset('site-assets/plugins/miniupload/assets/css/style.css')}}" rel="stylesheet" />

                                @endpush
                                @push('scripts')

                                <!-- JavaScript Includes -->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                                <script src="{{asset('site-assets/plugins/miniupload/assets/js/jquery.knob.js')}}"></script>

                                <!-- jQuery File Upload Dependencies -->
                                <script src="{{asset('site-assets/plugins/miniupload/assets/js/jquery.ui.widget.js')}}"></script>
                                <script src="{{asset('site-assets/plugins/miniupload/assets/js/jquery.iframe-transport.js')}}"></script>
                                <script src="{{asset('site-assets/plugins/miniupload/assets/js/jquery.fileupload.js')}}"></script>

                                <!-- Our main JS file -->
                                <script src="{{asset('site-assets/plugins/miniupload/assets/js/script.js')}}"></script>


                                @endpush
                            </div>
                            <div class="row form-group select-condition">
                                <label class="col-sm-3">@lang('Condition')<span class="required">*</span></label>
                                <div class="col-sm-9">                                    
                                    <input type="radio" name="item_condition" value="new" id="new"> 
                                    <label for="new">@lang('New')</label>
                                    <input type="radio" name="item_condition" value="used" id="used"> 
                                    <label for="used">@lang('Used')</label>
                                </div>
                            </div>
                            <div class="row form-group select-price">
                                <label class="col-sm-3 label-title">@lang('Price')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <label>@lang('BDT')</label>
                                    {!! Form::text('item_price', null , ['class' => 'form-control' ]) !!}
                                    <div class="checkbox">
                                        <label for="negotiable"><input type="checkbox" name="negotiable" value="negotiable" id="negotiable"> @lang('Negotiable')</label>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group brand-name">
                                <label class="col-sm-3 label-title">@lang('Brand Name')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::text('item_price', null , ['class' => 'form-control' ]) !!}
                                    <input type="text" class="form-control" placeholder="ex, Sony Xperia">
                                </div>
                            </div>

                            <div class="row form-group model-name">
                                <label class="col-sm-3 label-title">@lang('Model')</label>
                                <div class="col-sm-9">
                                    {!! Form::text('model', null , ['class' => 'form-control' ]) !!}
                                </div>
                            </div>

                            <div class="row form-group item-description">
                                <label class="col-sm-3 label-title">@lang('Short Description')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('short_description', null , ['class' => 'form-control',"id"=>"short_description", "rows"=>"3" ]) !!}                                    
                                </div>
                            </div>

                            <div class="row form-group item-description">
                                <label class="col-sm-3 label-title">@lang('Description')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('long_description', null , ['class' => 'form-control', "id"=>"long_description", "rows"=>"8" ]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <p><span id="desc_char_left">5000</span>@lang(' characters left')</p>
                                </div>
                            </div>								
                        </div><!-- section -->                        

                        <!--include inline register-->

                        <!--include make your ad premium-->

                        <div class="checkbox section agreement">
                            <label for="confirm">
                                <input type="checkbox" name="send" id="confirm">
                                @lang('By clicking "Post", you agree to our ')<a href="#">Terms of Use</a> @lang('and') <a href="#">Privacy Policy</a> @lang('and acknowledge that you are the rightful owner of this item and using iBikri to find a genuine buyer.')
                                <span id="confirm-err" class="text-danger"></span>
                            </label>
                            <button type="submit" onclick="return verifyTick()" class="btn btn-primary">@lang('Post Your Ad')</button>
                        </div><!-- section -->

                    </fieldset>
                    <!--{!! Form::close() !!}-->
                </div>


                <!-- quick-rules -->	
                <div class="col-md-4">
                    <div class="section quick-rules">
                        <h4>@lang('Quick rules')</h4>
                        <p class="lead">@lang('Posting an ad on ')<a href="#">iBikri.com</a>@lang(' is free! However, all ads must follow our rules'):</p>

                        <ul>
                            <li>@lang('Make sure you post in the correct category.')</li>
                            <li>@lang('Do not post the same ad more than once or repost an ad within 48 hours.')</li>
                            <li>@lang('Do not upload pictures with watermarks.')</li>
                            <li>@lang('Do not post ads containing multiple items unless it is a package deal.')</li>
                            <li>@lang('iBikri.com has the right to un unpulish your ad anytime')</li>
                            <li>@lang('Do not post images/text with profanity or hurtful content, doing so will result in account ban')</li>
                        </ul>
                    </div>
                </div><!-- quick-rules -->	
            </div><!-- photos-ad -->				
        </div>	
    </div><!-- container -->
</section><!-- main -->

@include('site.common.categorymodal')
@endsection