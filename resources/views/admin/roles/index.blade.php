@extends('admin.layouts.app')
@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'إدارة الصلاحيات ')
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
                                @can('role-create')
                                    <a class="btn btn-success mt-2" href="{{ route('admin.roles.create') }}"> {{ trans('home.new-role') }}</a>
                                @endcan
                            </div>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('success') }}
                        </div>
                    @endif
                    <section>
                    {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif --}}

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>{{ trans('table.name') }}</th>
                            <th width="280px">{{ trans('table.control') }}</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('admin.roles.show', $role->id) }}">Show</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                                        @endcan


                                        @csrf
                                        @method('DELETE')
                                        @can('role-delete')
                                            <button type="submit" class="btn btn-danger {{ Auth::user()->hasRole('Admin') && $role->id == 1? 'd-none': '' }}" >Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
    {!! $roles->render() !!}

@endsection