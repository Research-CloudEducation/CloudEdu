@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'إدارة المستخدمين')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection
@section('content')

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="row">
      <div class="col-lg-12 margin-tb mb-2">
          <div class="pull-left">
          <div class="float-end">
              <a class="btn btn-success mt-2" href="{{ route('admin.users.create') }}"> {{ trans('home.new-user') }}</a>
          </div>
          </div>
      </div>
  </div>
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <div class="max-w-7xl">
              @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                      {{ session('success') }}
                  </div>
              @endif
              <section>
      
                <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>{{ trans('table.name') }}</th>
                  <th>{{ trans('table.email') }}</th>
                  <th>{{ trans('sidebar.roles') }}</th>
                  <th width="280px">{{ trans('table.control') }}</th>
                </tr>
                @foreach ($data as $key => $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                          <label class="badge badge-secondary text-dark">{{ $v }}</label>
                        @endforeach
                      @endif
                    </td>
                    <td>
                      {{-- <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a> --}}
                      <a class="btn btn-info" href="{{ route('admin.users.edit',$user->id) }}"><i class="fa fa-edit"> Edit</i></a>
                      @foreach ($user->roles as $role)
                      <a class="btn btn-success btn-danger {{ Auth::user()->hasRole('Admin') && $role->id == 1 ? 'd-none': '' }}" href="{{ route('admin.users.destroy',$user->id) }}"> <i class="fa fa-trash"></i> Delete </a>
                      @endforeach
                    </td>
                  </tr>
                @endforeach
                </table>
              </section>
          </div>
      </div>
  </div>
</div>
@endsection