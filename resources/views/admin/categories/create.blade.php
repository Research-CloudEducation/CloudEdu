@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'إدخال مادة    ')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div>
                            <x-input-label for="name_ar" :value=" trans('form.name_ar') " />
                            <x-text-input id="name" name="name_ar" type="text" class="mt-1 block w-full" :value="old('ar_name' )"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                        </div>
                
                        <div>
                            <x-input-label for="en_name" :value="trans('form.name_en') " />
                            <x-text-input id="name" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en')"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                        </div>
                        <div>
                            <x-input-label for="description_ar" :value="trans('form.desc_ar') " />
                            <x-text-input id="text" name="description_ar" type="text" class="mt-1 block w-full" :value="old('dessription_ar')"  autocomplete="description_ar" />
                            <x-input-error class="mt-2" :messages="$errors->get('description_ar')" />
                        </div>
                        <div>
                            <x-input-label for="description_en" :value="trans('form.desc_en') " />
                            <x-text-input id="text" name="description_en" type="text" class="mt-1 block w-full" :value="old('dessription_en')" autocomplete="description_en" />
                            <x-input-error class="mt-2" :messages="$errors->get('description_en')" />
                        </div>
                        <div>
                            <x-input-label for="file" :value="trans('form.file') " />
                            <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" :value="old('file')"  autocomplete="file" />
                            <x-input-error class="mt-2" :messages="$errors->get('file')" />
                        </div>
                        <div>
                            <x-input-label for="class_id" :value="trans('form.classLevel') " />
                            <select name="class_id" id="" class="custom-select custom-select-lg mb-3">
                                <option selected></option>
                                @foreach ($classLevels as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('class_id')" />
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ trans('form.create') }}</x-primary-button>
                
                        
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
 </div>
     
@endsection