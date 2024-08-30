@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'قسـم المحتـــوي ')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')
    <section>

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                      {{ session('success') }}
                  </div>
                @endif
                  <div class="card">
                      <div class="header">
                        <h3 class=" m-3 text-bold " dir=""> {{ __(' المحتوى  لكل فصل دراسي ') }} </h3>
                        <form action="{{ route('admin.contents.index' ) }}" method="get">
                          <select name="class_id" id=""  class="custom-select custom-select-lg mb-3">
                            <option selected></option>
                          @foreach ($classLevels as $class)
                              <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                          </select>
                          <input class="btn btn-info btn-md d-block w-20" type="submit" value="{{ __('بحث') }}">
                        </form>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>{{ trans('form.title') }}</th>
                            <th>{{ trans('form.content') }}</th>
                            <th>{{ trans('form.file') }}</th>
                            <th>{{ trans('table.category-name') }}</th>
                            <th>{{ trans('table.classLevel') }}</th>
                            <th>{{ trans('table.upload-by') }}</th>
                            <th>{{ trans('table.control') }}</th>
                            {{-- <th>CSS grade</th> --}}
                          </tr>
                          </thead>
                          <tbody>
                            @if (!is_null($contentBy))
                                
                              @foreach ($contentBy as $content)
                              <tr>
                                    <td> {{ $content->title }} </td>
                                    <td> {{ Str::limit($content->content, 50 ) }}  </td>
                                    <td> <a target="_blank"  href="{{ asset('upload/content/' . $content->image) }}"> <i class="fa fa-2x fa-book-open"></i> </a></td>
                                    <td> {{ $content->category->name }}  </td>
                                    <td> {{ $content->classLevel->name }} </td>
                                    <td> {{ $content->teacher->name }} </td>
                                    <td>
                                      <a class="btn btn-info" href="{{ route('admin.contents.edit' , $content->id) }}">
                                        <i class="fa fa-edit"></i>
                                      </a>
                                      <a class="btn btn-danger" href="{{ route('admin.contents.destroy' , $content->id) }}">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    
                                    </td>
                              </tr>
                            @endforeach
                            @elseif($contents)

                            @foreach ($contents as $content)
                            <tr>
                                  <td> {{ $content->title }} </td>
                                  <td> {{ Str::limit($content->content, 50 ) }}  </td>
                                  <td> {{ $content->image, }}  </td>
                                  <td> {{ $content->category->name }}  </td>
                                  <td> {{ $content->classLevel->name }} </td>
                                  <td> {{ $content->teacher->name }} </td>
                                  <td>
                                    <a class="btn btn-info" href="{{ route('admin.contents.edit' , $content->id) }}">
                                      <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="{{ route('admin.contents.destroy' , $content->id) }}">
                                      <i class="fa fa-trash"></i>
                                    </a>
                                  
                                  </td>
                            </tr>
                          @endforeach
                            @endif
                      
                              
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Platform(s)</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            {{-- <th>CSS grade</th> --}}
                          </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                      </div>
                  </div>
        </div>
    </section>
     
@endsection

@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection