@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'قســم الطــلاب')
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
                      <div class="card-header">
                        <h3 class="card-title "> {{ trans('sidebar.teacherM') }} </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>{{ trans('table.name') }}</th>
                            <th>{{ trans('table.email') }}</th>
                            <th>{{ trans('table.phone') }}</th>
                            <th>{{ trans('table.school') }}</th>
                            <th>{{ trans('table.classLevel') }}</th>
                            <th>{{ trans('table.address') }}</th>
                            <th>{{ trans('form.control') }}</th>
                            {{-- <th>CSS grade</th> --}}
                          </tr>
                          </thead>
                          <tbody>

                              @foreach ($students as $student)
                                <tr>
                                      <td> {{ $student->name }} </td>
                                      <td> {{ $student->email }}  </td>
                                      <td> {{ $student->phone }}  </td>
                                      <td> {{ $student->school->name }}  </td>
                                      <td> {{ $student->classLevel->name }}  </td>
                                      <td> {{ $student->address }} </td>
                                      <td>
                                        <a class="btn btn-info" href="{{ route('admin.students.edit' , $student->id) }}">
                                          <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger" href="{{ route('admin.students.destroy' , $student->id) }}">
                                          <i class="fa fa-trash"></i>
                                        </a>
                                        @if ($student->approve == 0)
                                        <a class="btn btn-info" href="{{ route('admin.students.approve' , $student->id) }}">
                                          <i class="fa fa-check"></i>
                                        </a>
                                        @endif
                                      </td>
                                </tr>
                              @endforeach
                      
                              
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
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