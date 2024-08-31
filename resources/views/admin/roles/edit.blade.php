@extends('admin.layouts.app')
@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , ' تعديــل صلاحية')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                            <div class="float-end">
                                <a class="btn btn-primary mt-2" href="{{ route('admin.roles.index') }}"> Back</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('success') }}
                        </div>
                    @endif
                    <section>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.roles.update', $role->id) }}" method="PATCH">
                        @csrf
                                <div class="form-group">
                                    <strong>{{ trans('form.name') }}</strong>
                                    <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <strong>{{ trans('sidebar.roles') }} : </strong>
                                    <br />
                                    @foreach ($permission as $value)
                                        <label>
                                            <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                                value="{{ $value->id }}" class="name">
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                                <div class="flex items-center gap-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </div>
                    </form>

                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection