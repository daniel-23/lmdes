@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Utilidades') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Forums') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('View') }}</span>
</li>
@endsection

@section('content')
    <!-- Start Welcome area -->
    
    <div class="basic-form-area mg-b-50">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-details-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="latest-blog-single blog-single-full-view">
                                
                                <div class="blog-details blog-sig-details">
                                    
                                    <h1><a class="blog-ht" href="#">{{ $forum->Title }}</a></h1>
                                    {!! $forum->Description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="comment-head">
                                <h3>{{ __('Answer') }}</h3>
                            </div>
                        </div>
                    </div>
                    @foreach($forum->replies as $reply)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="user-comment admin-comment">
                                    <img src="{{ is_null($reply->user->add_info) || is_null($student->add_info->Photo) ? asset('storage/images/student/1.jpg') : asset('storage/'.$student->add_info->Photo) }}" alt="" width="76" height="76" />
                                    <div class="comment-details">
                                        <h4>{{ $reply->user->Name }} {{ explode(' ', $reply->created_at )[0]}}</h4>
                                        <h5>{{ $reply->Title }}</h5>
                                        <p>{{ $reply->Description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    

                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="lead-head">
                                <h3>{{ __('Leave your answers') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="coment-area">
                            <form id="comment" action="{{ route('foros.agregar.comentario',$forum->IdForum) }}" class="comment" method="POST">
                                @csrf
                                <div class="col-xs-12 blog-res-mg-bt">
                                    <div class="form-group-inner @error('description') input-with-error @enderror">
                                        <input name="title" class="responsive-mg-b-10" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" />
                                        @error('title')
                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group-inner @error('description') input-with-error @enderror">
                                        <textarea name="description" cols="30" rows="10" placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="payment-adress comment-stn">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection