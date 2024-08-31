@extends('admin.layouts.app')
@section('page_sub_title' , ' إنشاء مستخدم جديد')
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
                                <a class="btn btn-primary mt-2" href="{{ route('admin.users.index') }}"> Back</a>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-1xl">
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

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div >
                                    <x-input-label for="name_ar" :value=" trans('form.name_ar') " />
                                    <x-text-input id="name" name="name_ar" type="text" class="mt-1 block w-full" :value="old('name_ar' )"  autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                                </div>
                            </div>
                            
                            <div class="col">
                                <div>
                                    <x-input-label for="name_en" :value="trans('form.name_en')  "  /> 
                                    <x-text-input id="name" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en')"  autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                                </div>
                            </div>
                                
                          </div>
  
                        <div>
                            <x-input-label for="email" :value="trans('form.email') " />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"  autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="trans('form.password') " />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" autocomplete="new-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="trans('form.confirmpassword') " />
                            <x-text-input id="password" name="password_confirmation" type="password" class="mt-1 block w-full" :value="old('password')" autocomplete="new-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div>
                            <x-input-label for="description_en" :value="trans('form.FromSchool') " />
                            <select name="school_id" id="" class="custom-select custom-select-lg mb-3">
                                <option selected></option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('school_id')" />
                        </div>
                        <div>
                            <x-input-label for="roles" :value="trans('form.roles') " />
                            <select  class="custom-select custom-select-lg mb-3" multiple name="roles[]">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('roles')" />
                        </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit" class="btn btn-primary">{{ trans('form.create') }}</button>
                            </div>
                        
                    </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection