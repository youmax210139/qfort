@php
$edit = !is_null($dataTypeContent->getKey());
$add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .input-group-btn .btn {
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }
</style>
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
<h1 class="page-title">
    <i class="{{ $dataType->icon }}"></i>
    {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-bordered">
                <!-- form start -->
                <form role="form" class="form-edit-add"
                    action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                    method="POST" enctype="multipart/form-data">
                    <!-- PUT Method if we are editing -->
                    @if($edit)
                    {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                    {{ csrf_field() }}

                    <div class="panel-body">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Adding / Editing -->
                        @php
                        $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                        @endphp

                        @foreach($dataTypeRows as $row)
                        <!-- GET THE DISPLAY OPTIONS -->
                        @php
                        $display_options = $row->details->display ?? NULL;
                        if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                        }
                        @endphp
                        @if (isset($row->details->legend) && isset($row->details->legend->text))
                        <legend class="text-{{ $row->details->legend->align ?? 'center' }}"
                            style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">
                            {{ $row->details->legend->text }}</legend>
                        @endif

                        <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}"
                            @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                            {{ $row->slugify }}
                            <label class="control-label" for="name">{{ $row->display_name }}</label>
                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                            @if (isset($row->details->view))
                            @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' =>
                            $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit'
                            : 'add')])
                            @elseif ($row->type == 'relationship')
                            @include('voyager::formfields.relationship', ['options' => $row->details])
                            @else
                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                            @endif

                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                            @endforeach
                            @if ($errors->has($row->field))
                            @foreach ($errors->get($row->field) as $error)
                            <span class="help-block">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                        @endforeach
                        @if($edit)
                        <div class="entry-container form-group col-md-12">
                            <div class=row>
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <label class="control-label" for="name">videos</label>
                                        <span class="input-group-addon btn btn-success btn-add">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @foreach($videos as $k=>$video)
                            <div class="row entry" data-id="{{$video->id}}">
                                <input class="form-control" name="videos[{{$k}}][id]" type="hidden"
                                    value="{{ $video->id}}" required />
                                <div class="col-md-5">
                                    <input class="form-control" name="videos[{{$k}}][title]" type="text"
                                    placeholder="Type title" value="{{ $video->title}}" required />
                                </div>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input class="form-control" name="videos[{{$k}}][link]" type="text"
                                        placeholder="Type url" value="{{ $video->link}}" required />
                                        <div class="input-group-btn">
                                            <button class="btn-danger btn btn-remove">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                            <button class="btn-default btn btn-move-up">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                            </button>
                                            <button class="btn-default btn btn-move-down">
                                                <span class="glyphicon glyphicon-chevron-down"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div><!-- panel-body -->

                    <div class="panel-footer">
                        @section('submit-buttons')
                        <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        @stop
                        @yield('submit-buttons')
                    </div>
                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                    enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger"
                    id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();

            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();
                if(confirm("Are you sure to add an new video?")){
                    $.ajax(
                    {
                        url: "{{route('voyager.peoples.videos.store')}}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "title":"",
                            "link":"",
                            "people_id":"{{ $dataTypeContent->id }}"
                        },
                        success: function (data){
                            console.dir(data);
                            var controlForm = $('.entry-container'),
                                currentEntry = controlForm.find('.entry:first'),
                                entryCount = $('.row.entry').length,
                                newEntry = $(`
                                <div class="row entry" data-id="${data.id}">
                                    <input class="form-control" name="videos[${entryCount}][id]" type="hidden"
                                        value="${data.id}" required />
                                    <div class="col-md-5">
                                        <input class="form-control" name="videos[${entryCount}][title]" type="text"
                                            placeholder="Type title" required />
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <input class="form-control" name="videos[${entryCount}][link]" type="text"
                                                placeholder="Type url" required />
                                            <div class="input-group-btn">
                                                <button class="btn-danger btn btn-remove">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                                <button class="btn-default btn btn-move-up">
                                                    <span class="glyphicon glyphicon-chevron-up"></span>
                                                </button>
                                                <button class="btn-default btn btn-move-down">
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `).appendTo(controlForm);
                            toastr.success("{{ __('voyager::generic.successfully_added_new') . ' Videos' }}");
                        }
                    }
                    );
                }
            }).on('click', '.btn-remove', function(e)
            {
                e.preventDefault();
                var entry = $(this).parents('.entry:first');
                var id  = entry.find('input[type="hidden"]').val();
                if(id){
                    if(confirm("Are you sure to delete it?")){
                        $.ajax(
                        {
                            url: "{{route('voyager.peoples.videos.destroy','')}}/"+id,
                            type: 'DELETE',
                            data: {
                                "_method": "DELETE",
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (data){
                                entry.remove();
                                toastr.success(data.message);
                            }
                        }
                        );
                    }
                    return;
                }
                entry.remove();
                return false;
            }).on('click', '.btn-move-up,.btn-move-down', function(e)
            {
                e.preventDefault();
                var ids = [];
                var entry = $(this).parents('.entry:first');
                var current_id = entry.attr('data-id');
                var row_no = null;
                $('.entry-container .entry').each(function(key, value ){
                    var _id = $(this).attr('data-id');
                    if(_id == current_id){
                        row_no = key;
                    }
                    ids.push( {id:_id});
                });
                // console.log(JSON.stringify(ids));
                if(row_no == null){
                    toastr.error("row number error");
                    return;
                }
                if($(this).hasClass('btn-move-down')){
                    var row_swap = ((row_no +1)>=ids.length)?row_no:row_no+1;
                }
                else if($(this).hasClass('btn-move-up')){
                    var row_swap = ((row_no-1)<0)?row_no:row_no-1;
                }
                else{
                    return;
                }
                var temp = ids[row_swap];
                ids[row_swap] = ids[row_no];
                ids[row_no] = temp;
                // console.log(JSON.stringify(ids));
                /**
                * Reorder items
                */

                $.post('{{ route("voyager.peoples.videos.order") }}', {
                    order: JSON.stringify(ids),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    location.reload();
                    // toastr.success("{{ __('voyager::bread.updated_order') }}");
                });
            });
        });
</script>
@stop
