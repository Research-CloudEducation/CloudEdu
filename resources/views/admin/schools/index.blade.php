@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'قسـم المـدارس')
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
                        <h3 class="card-title">DataTable with default features</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>{{ trans('table.name') }}</th>
                            <th>{{ trans('table.description') }}</th>
                            <th>{{ trans('table.address') }}</th>
                            <th>{{ trans('form.control') }}</th>
                            {{-- <th>CSS grade</th> --}}
                          </tr>
                          </thead>
                          <tbody>

                              @foreach ($schools as $school)
                                <tr>
                                      <td> {{ $school->name }} </td>
                                      <td> {{ $school->description }}  </td>
                                      <td> {{ $school->address }} </td>
                                      <td>
                                        <a class="btn btn-info" href="{{ route('admin.schools.edit' , $school->id) }}">
                                          <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger" href="{{ route('admin.schools.destroy' , $school->id) }}">
                                          <i class="fa fa-trash"></i>
                                        </a>
                                      
                                      </td>
                                </tr>
                              @endforeach
                      
                              
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
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