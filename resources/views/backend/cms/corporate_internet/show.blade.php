@extends('backend.master')
@section('title')
CMS :: Corporate Internet
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Corporate</strong> Internet</h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <form action="{{ route('admin.save_corporate_internet') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Hero Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_head_para_one') ? 'has-error' : '' }}">
                                <label for="en_head_para_one" class="control-label">{{ 'EN Head Paragraph One' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_head_para_one" id="en_head_para_one" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_head_para_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_head_para_one') ? 'has-error' : '' }}">
                                <label for="bn_head_para_one" class="control-label">{{ 'BN Head Paragraph One' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_head_para_one" id="bn_head_para_one" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_head_para_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="header">
                                    <h2>Item Image 01</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="item_image_one" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('en_item_title_one') ? 'has-error' : '' }}">
                                <label for="en_item_title_one" class="control-label">{{ 'EN Item Title One' }}</label>
                                <input class="form-control" name="en_item_title_one" type="text" id="en_item_title_one">
                                {!! $errors->first('en_item_title_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_title_one') ? 'has-error' : '' }}">
                                <label for="bn_item_title_one" class="control-label">{{ 'BN Item Title One' }}</label>
                                <input class="form-control" name="bn_item_title_one" type="text" id="bn_item_title_one">
                                {!! $errors->first('bn_item_title_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_item_description_one') ? 'has-error' : '' }}">
                                <label for="en_item_description_one" class="control-label">{{ 'EN Item Description One' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_item_description_one" id="en_item_description_one" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_item_description_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_description_one') ? 'has-error' : '' }}">
                                <label for="bn_item_description_one" class="control-label">{{ 'BN Item Description One' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_item_description_one" id="bn_item_description_one" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_item_description_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="header">
                                    <h2>Item Image 02</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="item_image_two" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('en_item_title_two') ? 'has-error' : '' }}">
                                <label for="en_item_title_two" class="control-label">{{ 'EN Item Title Two' }}</label>
                                <input class="form-control" name="en_item_title_two" type="text" id="en_item_title_two">
                                {!! $errors->first('en_item_title_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_title_two') ? 'has-error' : '' }}">
                                <label for="bn_item_title_two" class="control-label">{{ 'BN Item Title Two' }}</label>
                                <input class="form-control" name="bn_item_title_two" type="text" id="bn_item_title_two">
                                {!! $errors->first('bn_item_title_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_item_description_two') ? 'has-error' : '' }}">
                                <label for="en_item_description_two" class="control-label">{{ 'EN Item Description Two' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_item_description_two" id="en_item_description_two" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_item_description_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_description_two') ? 'has-error' : '' }}">
                                <label for="bn_item_description_two" class="control-label">{{ 'BN Item Description Two' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_item_description_two" id="bn_item_description_two" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_item_description_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="header">
                                    <h2>Item Image 03</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="item_image_three" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('en_item_title_three') ? 'has-error' : '' }}">
                                <label for="en_item_title_three" class="control-label">{{ 'EN Item Title Three' }}</label>
                                <input class="form-control" name="en_item_title_three" type="text" id="en_item_title_three">
                                {!! $errors->first('en_item_title_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_title_three') ? 'has-error' : '' }}">
                                <label for="bn_item_title_three" class="control-label">{{ 'BN Item Title Three' }}</label>
                                <input class="form-control" name="bn_item_title_three" type="text" id="bn_item_title_three">
                                {!! $errors->first('bn_item_title_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_item_description_three') ? 'has-error' : '' }}">
                                <label for="en_item_description_three" class="control-label">{{ 'EN Item Description Three' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_item_description_three" id="en_item_description_three" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_item_description_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_description_three') ? 'has-error' : '' }}">
                                <label for="bn_item_description_three" class="control-label">{{ 'BN Item Description Three' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_item_description_three" id="bn_item_description_three" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_item_description_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="header">
                                    <h2>Item Image 04</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="item_image_four" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('en_item_title_four') ? 'has-error' : '' }}">
                                <label for="en_item_title_four" class="control-label">{{ 'EN Item Title Four' }}</label>
                                <input class="form-control" name="en_item_title_four" type="text" id="en_item_title_four">
                                {!! $errors->first('en_item_title_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_title_four') ? 'has-error' : '' }}">
                                <label for="bn_item_title_four" class="control-label">{{ 'BN Item Title Four' }}</label>
                                <input class="form-control" name="bn_item_title_four" type="text" id="bn_item_title_four">
                                {!! $errors->first('bn_item_title_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_item_description_four') ? 'has-error' : '' }}">
                                <label for="en_item_description_four" class="control-label">{{ 'EN Item Description Four' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_item_description_four" id="en_item_description_four" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_item_description_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_description_four') ? 'has-error' : '' }}">
                                <label for="bn_item_description_four" class="control-label">{{ 'BN Item Description Four' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_item_description_four" id="bn_item_description_four" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_item_description_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="header">
                                    <h2>Item Image 05</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="item_image_five" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('en_item_title_five') ? 'has-error' : '' }}">
                                <label for="en_item_title_five" class="control-label">{{ 'EN Item Title Five' }}</label>
                                <input class="form-control" name="en_item_title_five" type="text" id="en_item_title_five">
                                {!! $errors->first('en_item_title_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_title_five') ? 'has-error' : '' }}">
                                <label for="bn_item_title_five" class="control-label">{{ 'BN Item Title Five' }}</label>
                                <input class="form-control" name="bn_item_title_five" type="text" id="bn_item_title_five">
                                {!! $errors->first('bn_item_title_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_item_description_five') ? 'has-error' : '' }}">
                                <label for="en_item_description_five" class="control-label">{{ 'EN Item Description Five' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_item_description_five" id="en_item_description_five" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_item_description_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_description_five') ? 'has-error' : '' }}">
                                <label for="bn_item_description_five" class="control-label">{{ 'BN Item Description Five' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_item_description_five" id="bn_item_description_five" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_item_description_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="header">
                                    <h2>Item Image 06</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="item_image_six" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('en_item_title_six') ? 'has-error' : '' }}">
                                <label for="en_item_title_six" class="control-label">{{ 'EN Item Title Six' }}</label>
                                <input class="form-control" name="en_item_title_six" type="text" id="en_item_title_six">
                                {!! $errors->first('en_item_title_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_title_six') ? 'has-error' : '' }}">
                                <label for="bn_item_title_six" class="control-label">{{ 'BN Item Title Six' }}</label>
                                <input class="form-control" name="bn_item_title_six" type="text" id="bn_item_title_six">
                                {!! $errors->first('bn_item_title_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_item_description_six') ? 'has-error' : '' }}">
                                <label for="en_item_description_six" class="control-label">{{ 'EN Item Description Six' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_item_description_six" id="en_item_description_six" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_item_description_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_item_description_six') ? 'has-error' : '' }}">
                                <label for="bn_item_description_six" class="control-label">{{ 'BN Item Description Six' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_item_description_six" id="bn_item_description_six" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_item_description_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_description') ? 'has-error' : '' }}">
                                <label for="en_footer_description" class="control-label">{{ 'EN Footer Description' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_footer_description" id="en_footer_description" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_footer_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_description') ? 'has-error' : '' }}">
                                <label for="bn_footer_description" class="control-label">{{ 'BN Footer Description' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_footer_description" id="bn_footer_description" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_footer_description', '<p class="help-block">:message</p>') !!}
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