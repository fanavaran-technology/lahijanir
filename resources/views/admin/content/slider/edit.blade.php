@extends('admin.layouts.app' , ['title' => ' ویرایش اسلایدر'])

@section('head-tag')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/tagify/tagify.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/jalalidatepicker/persian-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">

<!-- tinymce -->
<script src="{{ asset('assets/admin/plugins/tinymce/js/tinymce/tinymce.min.js') }}"  referrerpolicy="origin"></script>

@endsection

@section('content')
<div class="d-flex justify-content-between">
  <div class="col mb-2">
      <h2 class="h3 mb-0 page-title">ویرایش اسلایدر</h2>
  </div>
  <div class="col-auto mb-3">
      <a href="{{ route('admin.content.sliders.index') }}" type="button" class="btn btn-success px-4">بازگشت</a>
  </div>
  </div>
  <form action="{{ route('admin.content.sliders.update' , $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('put') }}
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-body">
                <form class="needs-validation" novalidate="">
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom3">alt تصویر</label>
                      <input type="text" name="alt"  placeholder="alt را اینجا وارد کنید"  class="form-control" id="validationCustom3" value="{{ old('alt' , $slider->alt) }}">
                      @error('alt')
                         <div class="mt-2">
                          <strong class="text-danger mt-2">
                            {{ $message }}
                        </strong>
                         </div>
                  @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom3">URL</label>
                      <input type="text" name="url"  value="https://lahijan.ir"  class="form-control direction-ltr" id="validationCustom3" value="{{ old('url') }}" >
                      @error('url')
                      <div class="mt-2">
                       <strong class="text-danger mt-2">
                         {{ $message }}
                     </strong>
                      </div>
               @enderror
                    </div>                  
                  </div> <!-- /.form-row -->
                <!-- /.form-row -->
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationSelect2">وضعیت</label>
                      <select class="form-control select2 select2-hidden-accessible" name="status" id="validationSelect2"  data-select2-id="validationSelect2" tabindex="-1" aria-hidden="true">
                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                        </optgroup>
                        @error('status')
                         <div class="mt-2">
                          <strong class="text-danger mt-2">
                            {{ $message }}
                        </strong>
                         </div>
                  @enderror
                      </select>
                      <div class="form-group mt-3">
                        <label for="customFile">تصویر شاخص را انتخاب کنید</label>
                        <div class="custom-file">
                          <input type="file" name="image"  class="custom-file-label form-control custom-focus" id="customFile">
                           <label class="custom-file-label" for="customFile"></label>
                        </div>
                        @error('image')
                         <div class="mt-2">
                          <strong class="text-danger mt-2">
                            {{ $message }}
                        </strong>
                         </div>
                  @enderror
                  <img src="{{ asset($slider->image['indexArray']['small']) }}" class="mt-2" alt="">
                      </div>
                    </div>
                      <div class="col-md-6 mb-3">
                        <label for="date-input1">تاریخ انتشار</label>
                        <div class="input-group">
                          <input type="hidden" name="published_at" id="published_at" value="{{ $slider->published_at }}">
                          <input id="published_at_view" class="form-control custom-focus" value="{{ $slider->published_at }}">
                          <div class="input-group-append">
                            <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                          </div>
                        </div>
                        @error('published_at')
                        <div class="mt-2">
                         <strong class="text-danger mt-2">
                           {{ $message }}
                       </strong>
                        </div>
                 @enderror
                      </div>
                  </div>
                  <button class="btn btn-primary" type="submit">ثبت کنید</button>
                </form>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>
        </div> <!-- /. end-section -->
      </div>
    </div> <!-- .row -->
  </form>
@endsection

@section('script')

<script src="{{ asset('assets/admin/js/custom.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/tagify/tagify.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jalalidatepicker/persian-datepicker.min.js') }}"></script>

<script>
renderEditor('#editor')


let input = document.querySelector('input[name=tags]')
// init Tagify script on the above inputs
new Tagify(input, {
  dropdown: {
    position: "input",
    enabled: 0 // always opens dropdown when input gets focus
  }
})

$(document).ready(function () {
                $('#published_at_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#published_at'
                })
            });
</script>
@endsection