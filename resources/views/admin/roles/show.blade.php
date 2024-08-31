@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , ' عــرض صلاحية')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection
@section('content')
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="row">
                <div class="col-lg-12 margin-tb mb-3">
                    <div class="pull-left">
                            <div class="float-end">
                                <a class="btn btn-primary mt-2" href="{{ route('admin.roles.index') }}"> Back</a>
                            </div>
                        </h2>
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

                    <div class>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>{{ trans('form.name') }} : </strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong class=" d-block "> {{ trans('sidebar.roles') }} : </strong>
                                @if (!empty($rolePermissions))
                                    @foreach ($rolePermissions as $v)
                                        <label class="label label-secondary text-dark text-bold btn-default d-block "> <i class="fa fa-check-square "></i> {{ $v->name }}</label>
                                        <i class=" line-highlight "></i>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection