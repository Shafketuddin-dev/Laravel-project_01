@extends('backend.master')
@section('title')
CMS :: Faq
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_title_button') }}">Title & Button Text</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_slider') }}">Slider</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_about') }}">About Us</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_counter') }}">Counter</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_service') }}">Our Services</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_client') }}">Our Clients</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_choose_us') }}">Why Choose Us</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_faq') }}">Faq</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_testimonial') }}">Testimonial</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Faq</strong></h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <a href="{{ route('admin.manage_faq') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Faq
                </a>
                <form action="{{ route('admin.save_faq') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_question_one') ? 'has-error' : '' }}">
                                <label for="en_question_one" class="control-label">{{ 'EN Question 01' }}</label>
                                <input class="form-control" name="en_question_one" type="text" id="en_question_one">
                                {!! $errors->first('en_question_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_question_one') ? 'has-error' : '' }}">
                                <label for="bn_question_one" class="control-label">{{ 'BN Question 01' }}</label>
                                <input class="form-control" name="bn_question_one" type="text" id="bn_question_one">
                                {!! $errors->first('bn_question_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_answer_one') ? 'has-error' : '' }}">
                                <label for="en_answer_one" class="control-label">{{ 'EN Answer 01' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_answer_one" id="en_answer_one" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_answer_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_answer_one') ? 'has-error' : '' }}">
                                <label for="bn_answer_one" class="control-label">{{ 'BN Answer 01' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_answer_one" id="bn_answer_one" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_answer_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_question_two') ? 'has-error' : '' }}">
                                <label for="en_question_two" class="control-label">{{ 'EN Question 02' }}</label>
                                <input class="form-control" name="en_question_two" type="text" id="en_question_two">
                                {!! $errors->first('en_question_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_question_two') ? 'has-error' : '' }}">
                                <label for="bn_question_two" class="control-label">{{ 'BN Question 02' }}</label>
                                <input class="form-control" name="bn_question_two" type="text" id="bn_question_two">
                                {!! $errors->first('bn_question_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_answer_two') ? 'has-error' : '' }}">
                                <label for="en_answer_two" class="control-label">{{ 'EN Answer 02' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_answer_two" id="en_answer_two" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_answer_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_answer_two') ? 'has-error' : '' }}">
                                <label for="bn_answer_two" class="control-label">{{ 'BN Answer 02' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_answer_two" id="bn_answer_two" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_answer_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_question_three') ? 'has-error' : '' }}">
                                <label for="en_question_three" class="control-label">{{ 'EN Question 03' }}</label>
                                <input class="form-control" name="en_question_three" type="text" id="en_question_three">
                                {!! $errors->first('en_question_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_question_three') ? 'has-error' : '' }}">
                                <label for="bn_question_three" class="control-label">{{ 'BN Question 03' }}</label>
                                <input class="form-control" name="bn_question_three" type="text" id="bn_question_three">
                                {!! $errors->first('bn_question_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_answer_three') ? 'has-error' : '' }}">
                                <label for="en_answer_three" class="control-label">{{ 'EN Answer 03' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_answer_three" id="en_answer_three" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_answer_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_answer_three') ? 'has-error' : '' }}">
                                <label for="bn_answer_three" class="control-label">{{ 'BN Answer 03' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_answer_three" id="bn_answer_three" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_answer_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>


                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_question_four') ? 'has-error' : '' }}">
                                <label for="en_question_four" class="control-label">{{ 'EN Question 04' }}</label>
                                <input class="form-control" name="en_question_four" type="text" id="en_question_four">
                                {!! $errors->first('en_question_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_question_four') ? 'has-error' : '' }}">
                                <label for="bn_question_four" class="control-label">{{ 'BN Question 04' }}</label>
                                <input class="form-control" name="bn_question_four" type="text" id="bn_question_four">
                                {!! $errors->first('bn_question_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_answer_four') ? 'has-error' : '' }}">
                                <label for="en_answer_four" class="control-label">{{ 'EN Answer 04' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_answer_four" id="en_answer_four" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_answer_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_answer_four') ? 'has-error' : '' }}">
                                <label for="bn_answer_four" class="control-label">{{ 'BN Answer 04' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_answer_four" id="bn_answer_four" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_answer_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_question_five') ? 'has-error' : '' }}">
                                <label for="en_question_five" class="control-label">{{ 'EN Question 05' }}</label>
                                <input class="form-control" name="en_question_five" type="text" id="en_question_five">
                                {!! $errors->first('en_question_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_question_five') ? 'has-error' : '' }}">
                                <label for="bn_question_five" class="control-label">{{ 'BN Question 05' }}</label>
                                <input class="form-control" name="bn_question_five" type="text" id="bn_question_five">
                                {!! $errors->first('bn_question_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_answer_five') ? 'has-error' : '' }}">
                                <label for="en_answer_five" class="control-label">{{ 'EN Answer 05' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_answer_five" id="en_answer_five" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_answer_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_answer_five') ? 'has-error' : '' }}">
                                <label for="bn_answer_five" class="control-label">{{ 'BN Answer 05' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_answer_five" id="bn_answer_five" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_answer_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Faq Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="publish" class="with-gap" checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" value="0">
                                    <label for="unpublish">Unpublish</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection